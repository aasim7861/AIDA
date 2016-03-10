<?php
	$hostname = "mohammedaasim.co.uk.mysql"; 

	$username = "mohammedaasim_co_uk"; 

	$password = "eyps6wZC"; 

	$databaseName = "mohammedaasim_co_uk"; 

	$connection = mysqli_connect($hostname, $username, $password, $databaseName) or exit("Unable to connect to database!");

$config['base_url']='http://mohammedaasim.co.uk/webapp/';
//Database
$db['hostname'] = 'google.co.uk.mysql';
$db['username'] = 'google_c';
$db['password'] = 'eyps6wZC';
$db['database'] = 'google_c';
$db['dbdriver'] = 'mysql';
