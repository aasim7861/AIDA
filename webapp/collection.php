<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>

<?php $connection = mysql_connect("localhost", "mohammedaasim_co_uk", "eyps6wZC") or die(mysql_error());
	mysql_select_db("mohammedaasim_co_uk", $connection) or die(mysql_error());

session_start();
?>

<!-- Content -->
	<div class="one-thirds column">
		<div id="right" id="right">
			<div class="two-thirds column">
				 <h1> Welcome to the RSS Mobile and Laptop News! </h1>
					<?php
					 	include_once('includes/classes/NewsClass.php');
	 					$obj = new NewsClass();
	 					echo $obj->displaynewsfeed();
	 				?>
			</div>
		</div>
	 </div>
<?php require 'includes/footer.php'; ?>
