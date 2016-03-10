<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<div class="two-thirds column">
<div class="one-thirds column">
			<div id="right" id="right">
			
			

<?php
	$connection = mysql_connect("localhost", "mohammedaasim_co_uk", "eyps6wZC") or die(mysql_error());
  	mysql_select_db("mohammedaasim_co_uk", $connection) or die(mysql_error());

session_start();

// Check if we have an authenticated user
if (!isset($_SESSION["authenticatedUser"]))
//if not re-direct to login page
{
$_SESSION["message"] = "Welcome";

}
else
{ 
//If authenticated then display page contents
?>

     <h2><font color=red> Logged in as <?php echo $_SESSION["authenticatedUser"] ?> </font></h2>

<?php  
} 
?>		
		
				<?php include_once('includes/classes/NewsClass.php');
				if ($_POST){
				$obj = new NewsClass();
				$obj->writeNews($_POST);
				}

				$obj = new NewsClass();
				echo $obj->display_newsadmin();
				?>
			

	</div>
	</div>
<?php require 'includes/footer.php'; ?> 