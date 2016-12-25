<?php
 error_reporting(E_ALL);
Final class Options {
    
    private $db_handler = NULL; // database controller

    public function __construct() {

        session_start();
        include 'data/config.php';
        include 'data/DBController.php';
        $this->db_handler = new DBController();
        
    }


/**
* TASK:     Prepare tags for selecting.  
* @return a string of an html element or void havent decided
*/
    public function get_tags() {

        $q = "SELECT * FROM tags";
        $this->db_handler->query($q);
        $this->db_handler->resultset();

        $option_element_collection = ""; // gather all option elements

        foreach($this->db_handler->resultset() as $tag)
            $option_element_collection .= ' <option value='.$tag['id'].'">'.$tag['tag'].'</option> ';

        return $option_element_collection;
    }

}

?>