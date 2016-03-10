<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<!-- Content -->
	<div class="one-thirds column">
		<div id="right" id="right">
			<div class="two-thirds column">
<!-- Display the Table and the Form --> 
	<h3>Login Page</h3>
		<p>Please Login with your Credentials</p>
		<ul class="square">
			<form action="loginaction.php">
				<p>Username: <input type="text" id="user" name="user" required="required"> </p>
				<p>Password: <input type="password" id="password" name="password" required="required"></p>
				<input type="submit" id ="submit" value="Login">
				<input type="button" value="Register" onClick="parent.location='register.php'">
			</form>	
		</ul>		
	</div>
	</div>
</div>	
<?php require 'includes/footer.php'; ?>