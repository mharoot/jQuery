<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
require_once("../data/config.php");
require_once("../data/DBController.php");
$db_handler = new DBController();
$tag = $_POST["tag"];

if(isset($tag))
{
        $db_handler->query("INSERT INTO tags (tag) VALUES ( :tag )");
        $db_handler->bind(':tag', $tag, PDO::PARAM_STR);
        $db_handler->execute();
} 