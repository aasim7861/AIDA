<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<!-- Content -->
	<div class="one-thirds column">
		<div id="right" id="right">
			<div class="two-thirds column">
				<h3>Updated User Inforamtion</h3>
				<p>You have successfully updated user information</p>
				<ul class="square">
						<?php 
						//Get the key field to be amended
						$UserID = $_GET['UserID'] ;  
						 // Initialise a string to report back any errors
						$errorString = "";
						//See if any info was submitted
						$Surname = $_GET['Surname']; 
						//Clean data - trim space
						$Surname = trim ( $Surname); 
						//Check its ok - if not then add an error message to the error string
						if (empty($Surname)) 
							$errorString = $errorString."<br>Please supply a Surname.";       
						$Username = $_GET['Username'];   
						//Clean data - trim space
						$Username = trim ( $Username);
						//Check its ok - if not then add an error message to the error string
						if (empty($Username)) 
							  $errorString = $errorString."<br>Please supply a Username name."; 
						$Email = $_GET['Email']; 
						//Clean data - trim space
						$Email = trim ( $Email); 
						//Check its ok - if not then add an error message to the error string
						if (empty($Email)) 
							$errorString = $errorString."<br>Please supply a Email.";	  
						if (!empty($errorString))
						{
						 print "<b>There were errors</b.<br>".$errorString;
						 exit;
						}
						else  //No errors. Insert the data
						{
						  include "includes/connection.php";
						 //Create the update query
						  $query = "UPDATE Users SET Surname = '$Surname', Username = '$Username', Email = '$Email' WHERE UserID = '$UserID'";
						// execute query 
						 $result = mysqli_query($connection, $query) ;
						 //if there was a problem - get the error message and go back 
						 if (!$result)
						  {
							 echo "There were errors :<br>". mysql_error();
						  } 
						  else //OK, then the insertion was successful
						  {
							echo "User  with UserID = $UserID was successfully changed <br /> <br />";
							//Create a new query to display the new row in a table
							$query = "Select * from Users where UserID = '$UserID'";
							$result = mysqli_query($connection, $query) or die ("Error in query: $query. ".mysqli_error()); 
							echo "<div class=table-responsive>";
							echo "<table cellpadding=10 border=1>";  
							while($row = mysqli_fetch_assoc($result)) { 
							 echo "<tr>";
							 echo "<td>".$row['UserID']."</td>"; 
							 echo "<td>".$row['Surname']."</td>"; 
							 echo "<td>".$row['Username']."</td>";
							 echo "<td>".$row['Email']."</td>";
							echo "</tr>";
							} //End while
							echo "</table>"; 
							echo "</div>";
						   } //End Else insertion successful
						}//End else successful Amendment     

						?>
						<br></br> 
						
						<p> If you wish to go back to admin <a href ='loginadmin.php'/> please click here </p> 
					
					
					
					
					
				</ul>
			</div>
		</div>
	 </div>
<?php require 'includes/footer.php'; ?>



