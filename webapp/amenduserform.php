<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<!-- Content -->

	<div class="one-thirds column">
		<div id="right" id="right">
			<div class="two-thirds column">	
		<h2>Amend User Page : Main Content</h2>
				<h3>Updating User Information</h3>
				<p>On this page here you could amend user details which will auto update the Users database. Remember the new credentials when you next login in order to avoid dissappointment.</p>
				<ul class="square">
					<?php 
				include "includes/connection.php";
				
				// Query to get records 
				$UserID = $_GET['UserID'] ; 
				// Create query to delete record 
				$query = "SELECT * FROM Users WHERE UserID = '$UserID' ";  
				//Run the query
				$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error()); 
				//see if any rows were returned 
				if (mysqli_num_rows($result) > 0) {  // YES - Display Form
				  $row = mysqli_fetch_assoc($result); //Fetch the row
				  //Display the form with original values 
				?>        
				  <form action = 'amenduseraction.php' method="GET">
				  <p>ID: <input  readonly="yes" name="UserID" type="text" value=<?php print $row["UserID"] ?> size="3" >
				  	This has been made 'readonly' as cannot amend key field </p>
				   <p>Surname: <input type="text" name="Surname" value=<?php print $row["Surame"] ?> ></p>
				   <p>Username: <input type="text" name="Username" value=<?php print $row["Userame"] ?> ></p>
				   <p>Email: <input type="text" name="Email" value=<?php print $row["Email"] ?> ></p>
					<p><input type="submit" value="Update User" name="Update" > </p>
				  </form>        
				<?php         
				 } //End if rows returned
				   //No rows returned
				   else  print "No records were found";
				?> 
				</ul>
		</div>
	 </div>
	 </div>
<?php require 'includes/footer.php'; ?>