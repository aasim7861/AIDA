<?php 
session_start();

require_once 'config.php';
require_once "includes/functions/datetime.php";
require_once "includes/functions/sanitise.php";
//NOTE THE USE OF THE mysqli OO INTERFACE/METHODS
	$connection = mysqli_connect($hostname, $username, $password, $databaseName) or exit("Unable to connect to database!");

function __autoload($class_name) {
  require_once 'includes/classes/'.$class_name . '.php';
}

?>



