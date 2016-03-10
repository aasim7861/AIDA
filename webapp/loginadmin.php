<?php 
	session_start();
	// Check if we have established an authenticated
	if (!isset($_SESSION["authenticatedUser"]) && !isset($_SESSION ["is_Admin"])){ 
	$_SESSION["message"] = "You must be logged in to see Admin page. Please Login";
		header("Location: login.php");
	//Go back and login
	}
?>
<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>

<!-- Content -->
	<div class="one-thirds column">
		<div id="right" id="right">
			<div class="two-thirds column">
		<h4>Welcome to Admin Page</h4>
				
			<?php 

			echo " <h3><font color=gold> Welcome Admin ". $_SESSION['authenticatedUser']."</font></h3>"; //Output any the error message -

			?>
				<p>All users Registered to the website are listed below</p>
				
			
									<h3>Search Users (by Username)</h3>
    <form name="form1" method="GET" action="loginadmin.php#sorting">    
          <input name="searchUsername" type="text" id="searchUsername" size="15">
      </form>
						<h3 id="sorting" >Sort Users</h3>
		<p> If you wish to sort customers seperately then click on the column heading (for example to sort User ID click the User ID heading). </p>
		<p>View<a href="loginadmin.php#sorting"> <strong>All</strong> </a>Users or User Customers (Surname) by Initial Letter</p>
	<a href="loginadmin.php?letter=A#sorting">A</a> <a href="loginadmin.php?letter=B#sorting">B</a> <a href="loginadmin.php?letter=C#sorting">C</a>
	<a href="loginadmin.php?letter=D#sorting">D</a> <a href="loginadmin.php?letter=E#sorting">E</a> <a href="loginadmin.php?letter=F#sorting">F</a>
	<a href="loginadmin.php?letter=G#sorting">G</a> <a href="loginadmin.php?letter=H#sorting">H</a> <a href="loginadmin.php?letter=I#sorting">I</a>
	<a href="loginadmin.php?letter=J#sorting">J</a> <a href="loginadmin.php?letter=K#sorting">K</a> <a href="loginadmin.php?letter=L#sorting">L</a>
	<a href="loginadmin.php?letter=M#sorting">M</a> <a href="loginadmin.php?letter=N#sorting">N</a> <a href="loginadmin.php?letter=O#sorting">O</a>
	<a href="loginadmin.php?letter=P#sorting">P</a> <a href="loginadmin.php?letter=Q#sorting">Q</a> <a href="loginadmin.php?letter=U#sorting">U</a>
	<a href="loginadmin.php?letter=R#sorting">R</a> <a href="loginadmin.php?letter=S#sorting">S</a> <a href="loginadmin.php?letter=T#sorting">T</a>
	<a href="loginadmin.php?letter=U#sorting">U</a> <a href="loginadmin.php?letter=V#sorting">V</a> <a href="loginadmin.php?letter=W#sorting">W</a>
	<a href="loginadmin.php?letter=X#sorting">X</a> <a href="loginadmin.php?letter=Y#sorting">Y</a> <a href="loginadmin.php?letter=Z#sorting">Z</a></br></br>
						<?php 
							//Set up the database access credentials

							  // (1) Open the database connection  - exit with error message otherwise 


							  // (2) Create a query to select ALL animals

							  $initialLetter = $_GET["letter"];
							  $order = $_GET["order"];

							  $query = "SELECT * FROM Users"; 

							  if (!$initialLetter=="")
								{ 
								  $query = $query." Where Surname like  '$initialLetter%' ";
								}
								//Use the ordering if an order has been passed
								if (!$order=="")
								{ 
								  $query = $query." order by $order ";
								}
								
								$searchUsername = $_GET["searchUsername"];
								if (!empty($searchUsername))  //Show just filme searched for 
								{
								 print "Looking for a Username containing $Username <br>";
								// create query  - This query combines data from the film table and the director table
								$query = $query." where Username like '%$searchUsername%'";
								}

							  // (3) Run the query on the table through the connection and get a set of results - otherwise exit with an error

							  $result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error()); 

							 // (4) While there are still rows in the result set, fetch the current row - as an associative array 

							    { 
							   echo "<div class=table-responsive>";
							   echo "<table class=table cellpadding=10 border=1>"; 
							    //The href now includes the sort order AND the initial letter
							    echo "<tr>
										 <td><a href='loginadmin.php?order=UserID&letter=$initialLetter'>User ID</a></td>".
							             "<td><a href='loginadmin.php?order=Firstname&letter=$initialLetter'>First Names</a></td>".
										 "<td><a href='loginadmin.php?order=Surname&letter=$initialLetter'>Surname</a></td>".
										 "<td><a href='loginadmin.php?order=Username&letter=$initialLetter'>Username</a></td>".
										 "<td><a href='loginadmin.php?order=Email&letter=$initialLetter'>Email</a></td>".
										 "<td>Delete Function</td>".
							             "<td>Edit Function</td>
									</tr>";

							  while ($row = mysqli_fetch_assoc($result)){ 

							  // (5) Print out each element in $row, that is, print the values of 

							 
							  	echo "<tr>";
								 echo "<td>".$row['UserID']."</td>"; 
								 echo "<td>".$row['Firstname']."</td>";
								 echo "<td>".$row['Surname']."</td>"; 
								 echo "<td>".$row['Username']."</td>"; 
								 echo "<td>".$row['Email']."</td>";	 	 
								 echo "<td><a href=userDeleteAction.php?UserID=".$row["UserID"].">Delete</a></td>"; 
							    //Dynamically created link to amend users
							    echo "<td><a href=amenduserform.php?UserID=".$row["UserID"].">Amend</a></td>"; 
							    echo "</tr>"; }

							    echo "</table>";
							    echo "</div>";
							}

							  ?>
							  <p> If you wish to add User <a href ='register.php'/><strong>Please Click Here</strong></p>
							  <h3> <a href ='generate-pdf.php' target="_blank" /> Please click here to view in PDF Format! </h3> 

		</div>
		</div>
	 </div>
<?php require 'includes/footer.php'; ?>



