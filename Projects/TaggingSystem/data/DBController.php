<?php
 ini_set('display_errors',1);
 error_reporting(E_ALL);
class DBController {
	private $host       = DB_HOST;
	private $user       = DB_USER;
	private $password   = DB_PASS;
	private $database   = DB_NAME;

	private $connection = null;
	private $error = null;
	
	private $stmt = null;

	function __construct() {
		$conn = $this->connectDB();
		$this->connection = $conn;
	}
	

	private function connectDB() {
		if($this->connection!=null)
		{
			return $this->connection;
		}

		 //Set DSN
		 $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database. ';charset=utf8';
		 // Set options
		$options = array(
		PDO::ATTR_PERSISTENT => false, 
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

        // Create a new PDO instanace
        try{
            $this->connection = new PDO($dsn, $this->user, $this->password, $options);
        }
        // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }

		return $this->connection;
	}

	public function query($query){
		if($this->connection!=null)
    	$this->stmt = $this->connection->prepare($query);
		else
		 return;
	}

	public function bind($param, $value, $type = null)
	{
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
				$type = PDO::PARAM_INT;
				break;
				case is_bool($value):
				$type = PDO::PARAM_BOOL;
				break;
				case is_null($value):
				$type = PDO::PARAM_NULL;
				break;
				default:
				$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
		if($this->stmt!=null)
		return $this->stmt->execute();
		else
		 return;
	}


	public function resultset(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function fetchObj(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}
	
	public function rowCount(){
		return $this->stmt->rowCount();
	}

	public function lastInsertId(){
		return $this->connection->lastInsertId();
	}

}
?>