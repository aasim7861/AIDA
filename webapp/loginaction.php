<?php
// (1) Use include to database connection and select database
  $hostname = "mohammedaasim.co.uk.mysql"; 

  $username = "mohammedaasim_co_uk";

  $password = "eyps6wZC"; 

  $databaseName = "mohammedaasim_co_uk"; 

  session_start();

  // (1) Open the database connection  - exit with error message otherwise 

  $connection = mysqli_connect($hostname, $username, $password, $databaseName) or exit("Unable to connect to database!");
//
// (2) Collect data from form and save in variables

$Username = $_GET['user'];
$Password = $_GET['password'];

  if (empty($Username) or empty($Password)) {

  $_SESSION["message"] = "Must enter Username and Password ";

  header("Location: login.php");  //Redirection information

  exit ;//Ends the script

  }
 $Username = strip_tags($Username);

 $Password = strip_tags($Password);

// (3) Create query of the form below to search the user table
$query =  "SELECT * FROM Users WHERE Username='$Username' AND  Password='$Password'";

// (3) Run query through connection

//$result_db = mysqli_query($connection, $query);
$result_db = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error());
$row = mysqli_fetch_array($result_db);
//print "<h3>User_Type</h3>" . $User_Type;

$_SESSION["is_Admin"] = false;

 if (mysqli_num_rows($result_db) > 0) { 
  $_SESSION["authenticatedUser"] = $Username;
  // (4) Check result of query using code below
  // if rows found set authenticated user to the user name entered
  if ($row['User_Type'] == 'Admin')
  {
    $_SESSION["is_Admin"] = true;
  //print "i am in login action,  row['User_Type'] " . $row['User_Type'];
    header("Location: loginadmin.php");
  }
  else if ($row['User_Type'] == '')
  // login failed redirect back to login page with error message
  {
    header("Location: confirmation.php");
  }
} 
  else
  // login failed redirect back to login page with error message
  {
    $_SESSION["message"] = "Could not connect as $Username " ;
    header("Location: login.php");
  }
?>
