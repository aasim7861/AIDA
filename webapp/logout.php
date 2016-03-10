<?php
session_start();
session_destroy(); //Start a new session so a message can be created
$_SESSION["message"] =  "User with $appUsername has logged out"; 
header("Location: index.php");   // Relocate back to the login page 
?> 
