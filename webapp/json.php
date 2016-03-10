	<?php

	$hostname = "mohammedaasim.co.uk.mysql"; 

	$username = "mohammedaasim_co_uk"; 

	$password = "eyps6wZC"; 

	$databaseName = "mohammedaasim_co_uk"; 

	$connection = mysqli_connect($hostname, $username, $password, $databaseName) or exit("Unable to connect to database!");
	?>
	
<?php

 $sql = "select * from boxing"; //replace with your table name 

$result = mysqli_query($connection,$sql);
 $jsondata = array();
  while($row=mysqli_fetch_row($result)){
  $jsondata['country'][]=$row;
  }
  echo json_encode($jsondata);


?>