<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<!-- Content -->
	<div class="one-thirds column">
		<div id="right" id="right">
			<div class="two-thirds column">
				<h3>OO PHP Class Tests</h3>
				<p>Skeleton is built on three core principles:</p>
				<ul class="square">
					<h4>Prepared Statements and Stored Procedures</h4>
					<?php 
			
							/* check connection */ 

							  if(mysqli_connect_errno()){

							  die('Connect Error (' . mysqli_connect_errno() . ') '

							  . mysqli_connect_error());

							  }

							  $sql = "SELECT * FROM boxing";

							  /*** prepare statement ***/

							  $stmt = $connection->prepare($sql);

							  /*** execute our SQL query ***/

							  $stmt->execute();

							  /*** bind the results ***/

							  $stmt->bind_result($country, $name, $weight);

							  /*** loop over the result set ***/

							 print "<div class=table-responsive>";
							  print "<table border = 1 >"; 

							  while ($stmt->fetch()){ 

							  print "  <tr>"; 

							  print "    <td>" . $country . "</td>"; 

							  print "    <td>" . $name . "</td>"; 

							  print "    <td>" . $weight . "</td>"; 

							  print "  </tr>"; 

							  } 

							  print "</table>"; 
							 print "</div>"; 

							  /*** close connection ***/

							  $connection->close();


							?>

							<br>
							<h4>PHP Data Objects (PDO) </h4>
							<?php 
								

								  try {

								  $dbh = new PDO("mysql:host=$hostname;dbname=$databaseName", $username, $password);

								  /*** echo a message saying we have connected ***/

								  echo 'Connected to database<br />';


								 /*** The SQL SELECT statement ***/

								  $sql = "SELECT * FROM boxing";

								  foreach ($dbh->query($sql) as $row) {

								  print $row['country'] .' - '. $row['name'] . '<br />';

								  }

								  /*** close the database connection ***/

								  $dbh = null;

								  }

								  catch(PDOException $e){

								  echo $e->getMessage();

								  }

								?>

							<br>
							<h4>Basic Class, Objects and Test Class </h4>

					<?php 
						require_once('includes/classes/boxing.php'); 

						  //Instantiatefirst boxer - oass name to constructor 

						  $boxing = new Boxing("Floyd Mayweather"); 

						  $boxing->setAge(36); 

						  $boxing->setWeight(250); 


						$boxer = new Boxing("World Champion"); 


						print "The Money Team  <br />";

						  print $boxing->getName();

						  print ". Age = ".$boxing->getAge();

						  print ". Weight = ".$boxing->getWeight();

						  print "<br />";

						  $boxing->run(); 

						  $boxing->kill(); 

						  $boxer->eat(); 
						?>
				</ul>
			</div>
		</div>
	 </div>
	 
<?php require 'includes/footer.php'; ?>
