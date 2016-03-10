<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
	
<link rel="stylesheet" href="assets/css/magnific-popup.css"> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<script src="assets/js/jquery.magnific-popup.js"></script> 

<!-- Content -->
	<div class="one-thirds column">
		<div id="right" id="right">
			<div class="two-thirds column">
				<h3>Data Transfer Page</h3>
				<p>Skeleton is built on three core principles:</p>

				<?php
					ini_set('display_errors', 1);
					require_once('TwitterAPIExchange.php');
					/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
					$settings = array(
					    'oauth_access_token' => "2904419789-zRqEJqFsCmEC5UxiIQmvsHn9SHd4JdSgn6k5Bd7",
					    'oauth_access_token_secret' => "WzNQ7uiGOXnEcUfXvjsisnXLQXIwf2hvKngey3a973OJ0",
					    'consumer_key' => "UQ8xrgy11QSScJxxw1S8DdTyW",
					    'consumer_secret' => "UgZxnDzulU3ORbBlmMEDycMh4GfcLYZOlKuF4bXDe7VZqA8Qyl"
					);
					/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
					$url = 'https://api.twitter.com/1.1/';
					$requestMethod = 'POST';
					/** POST fields required by the URL above. See relevant docs as above **/
					$postfields = array(
					    'screen_name' => 'usernameToBlock', 
					    'skip_status' => '1'
					);
					/** Perform a POST request and echo the response **/
					$twitter = new TwitterAPIExchange($settings);
					echo $twitter->buildOauth($url, $requestMethod)
					             ->setPostfields($postfields)
					             ->performRequest();
					/** Perform a GET request and echo the response **/
					/** Note: Set the GET field BEFORE calling buildOauth(); **/
					$url = 'https://api.twitter.com/1.1/statuses/home_timeline.json';
					$getfield = '?screen_name=aasim_7861';
					$requestMethod = 'GET';
					$twitter = new TwitterAPIExchange($settings);
					echo $twitter->setGetfield($getfield)
					             ->buildOauth($url, $requestMethod)
					             ->performRequest();
				?>

		</div>
		</div>
	 </div>
<?php require 'includes/footer.php'; ?>