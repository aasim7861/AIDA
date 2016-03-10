<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<!-- Content -->
	<div class="one-thirds column">
		<div id="right" id="right">
			<div class="two-thirds column">
				<h2>Database CRUD</h2>
 	<?php

 			if ($connection -> query($tableCreate) === TRUE) {
			print " Table  'Members' successfully created.";
		}
		$query_str = "INSERT INTO `Members` VALUES (1, 'paul@leedsmet.ac.uk','john') ";
		$connection -> query($query_str);
		$query_str = "INSERT INTO `Members` VALUES (2, 'asif@leedsmet.ac.uk','wenger') ";
		$connection -> query($query_str);
		$query_str = "INSERT INTO `Members` VALUES (3, 'aasim@leedsmet.ac.uk','mick')";
		$connection -> query($query_str);

		/* 3. GET RESULTS FROM QUERY AND DISPLAY DATA */	
		$result = $connection->query("SELECT * FROM Members");
        print " <p>Query returned ". $result->num_rows . " rows </p>";; 
        //The function to display data is below
        

        displayData($result);
         
        /* 4. UPDATE DATA (set all passwords to secret) AND DISPLAY */		
	    $connection->query("UPDATE Members SET password='secret'");
	    
  	    print "<p>Changing Password to 'Secret'; - Affected rows (UPDATE): = ";
  		print $connection->affected_rows;
  		$result = $connection->query("SELECT * FROM Members");
  		displayData($result);
  		print "</p>";

  		/* 5. DELETE  DATA (delete green) AND DISPLAY */	
		$connection->query("DELETE FROM Members WHERE email = 'asif@leedsmet.ac.uk'");
		print "<p>Deleting row with email = asif@leedsmet.ac.uk</p>";
   		$result = $connection->query("SELECT * FROM Members");
  		displayData($result); 
	
  	//The function to display the data	
	  function displayData($result){

	  	print "<div class=table-responsive>";
	  		print "<table class=table border = 1 >"; 
  			while ($row = $result->fetch_assoc()){ 
  				print "  <tr>"; 
				print "    <td>" . $row["id"] . "</td>"; 
  				print "    <td>" . $row["email"] . "</td>"; 
  				print "    <td>" . $row["password"] . "</td>"; 
  				print "  </tr>"; 
  			} 
  		print "</table>"; 
  		print "</div>"; 
       }//end of display function

		?>

		<!--<?php require_once 'includes/classes/boxing.php'; ?>-->
		</div>
		</div>
	 </div>
<?php require 'includes/footer.php'; ?>
