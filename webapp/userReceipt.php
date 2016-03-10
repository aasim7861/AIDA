<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<!-- Content -->
 	<div class="one-thirds column">
		<div id="right" id="right">
			<div class="two-thirds column">
		<h2>Registration Successful!</h2>
				<h3>Welcome New Member</h3>
				<p>You have successfully registered, Thank you for signing up to our webiste.</p>
				<ul class="square">

						<?php
							// (2)gather details of CustomerID sent 
							$UserID = $_GET['UserID'] ;
							   
							// (3)create query 
							$query = "SELECT * FROM Users WHERE UserID = $UserID";
								
							// (4) Run the query on the customer table through the connection
							//$result = mysql_query ($query);
							$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error());
							
							// (5) print message with ID of inserted record   							
							if ($row = mysqli_fetch_array($result)) 
							{ 
							print "The following Customer was added"; 
							print "<br>User ID: " . $row["UserID"]; 
							print "<br>First Name: " . $row["Firstname"]; 
							print "<br>Surname: " . $row["Surname"]; 
							print "<br>User Name: " . $row["Username"]; 
							print "<br>Email: " . $row["Email"]; 
							print "<br>Password: " . $row["Password"]; 
							}	
						?>
						<p>You can now go back <a href="login.php"><strong>To Login</strong></a></p>
					</div>
				</div>
				</div>
<?php 
include ("includes/footer.php"); 
?>
