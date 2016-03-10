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
		<h2>Members Page Only</h2>
				<h3>Thanks for loggining in but only members have access to this page!</h3>
					<?php 
					echo " <h3><font color=gold> Thanks for logging in ". $_SESSION['authenticatedUser']."</font></h3>"; //Output any the error message -
					?>
		</div>
	 </div>
	 </div>
<?php require 'includes/footer.php'; ?>
