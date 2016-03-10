<?php
// (1) Database connection
	$hostname = "mohammedaasim.co.uk.mysql"; 

	$username = "mohammedaasim_co_uk";

	$password = "eyps6wZC"; 

	$databaseName = "mohammedaasim_co_uk"; 

// (2) Open the database connection  - exit with error message otherwise 

	$connection = mysqli_connect($hostname, $username, $password, $databaseName) or exit ("Unable to connect to database!");

   	$Firstname = $_POST['Firstname'];
	$Surname = $_POST['Surname'];
	$Username = $_POST['Username'];
	$Email = $_POST['Email'];	
	$Password = $_POST['Password'];
   
// (3) Create an INSERT query of the form 
	$query = "INSERT INTO Users (Firstname, Surname, Username, Email, Password) VALUES ('$Firstname', '$Surname', '$Username', '$Email', '$Password')"; 

// (4) Run query through connection
//$result = mysql_query($query);
	$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error());

// (5) print message with ID of inserted record    
	header("Location: userReceipt.php?"."UserID=". mysqli_insert_id($connection));   
// (7) close connection 
 	mysqli_close($connection);     
 ?> 