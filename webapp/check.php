<?php

 include "includes/connection.php";


$Username = mysqli_real_escape_string($connection, trim($_POST['Username']));

$check = mysqli_query($connection, "SELECT Username FROM Users WHERE Username='$Username'");
$check_num_rows = mysqli_num_rows($check);

if ($Username==NULL)
	echo "Choose a Username";
else if (strlen($Username)<=3) 
	echo "Too Short";
else
	{
		if ($check_num_rows==0)
			echo "Available!";
		else if ($check_num_rows==1)
			echo "Not Available!";
	}

?>