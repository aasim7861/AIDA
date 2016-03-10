<?php require_once 'config/init.php';?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Aasim Amin</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!--Jquery Specfic -->
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/le-frog/jquery-ui.css">
  	 <!--<link rel="stylesheet" href="/resources/demos/style.css"> -->
	
  		<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/skeleton.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	
  	<!--Javascript Specfic -->
	
	<script src="assets/js/modernizr.js"></script>
	<script src="assets/js/customscript.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9JzIVpwWtIa9ICDXeT9DMUBmYz9aQnYA"></script>	

	<!-- getting script -->
	<!--<script src="assets/js/common.js"></script>-->
	<!--<script src="assets/js/clienthint.js"></script> -->
 
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="assets/images/favicon.jpg">
	<link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="assets/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="assets/images/apple-touch-icon-114x114.png">

	<style type="text/css">
		#upload_progress {display:none;}

		#feedback {
			line-height: 0px;
			color: red;
			
		}
				#passwordStrength
		{
			height:10px;
			display:block;
			float:left;
		}

		.strength0
		{
			width:250px;
			background:#cccccc;
		}

		.strength1
		{
			width:50px;
			background:#ff0000;
		}

		.strength2
		{
			width:100px;	
			background:#ff5f5f;
		}

		.strength3
		{
			width:150px;
			background:#56e500;
		}

		.strength4
		{
			background:#4dcd00;
			width:200px;
		}

		.strength5
		{
			background:#399800;
			width:250px;
		}

	</style>

</head>
<body>	
	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
		<div class="nine columns">
			<h1 class="remove-bottom" style="margin-top: 30px">Aasim's Final Year Internet Development </h1>
			<h5>Aasim Amin Version 1.5</h5>
			
		</div>
		<div class="five columns">
		<div id="menu">
			
			<form action="register.php" method="get">
							<input type="button" value="Register" onClick="parent.location='register.php'">
							<input type="button" value="Login" onClick="parent.location='login.php'">
							<input type="button" value="Logout" onClick="parent.location='logout.php'">
			</form>
		</div>
			
		</div>
		<hr />



