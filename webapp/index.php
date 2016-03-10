<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<!-- Content -->
	<div class="one-thirds column">
		<div id="right" id="right">
			<div class="two-thirds column">
			<h2>Welcome To Our Home Page</h2>
			<div id="accordion1">
					  <h3>CSS Animation</h3>
						  <div>
						  <p>
						  <p> CSS3 animations replaces Flash animations, animated images, and JavaScripts in existing web pages.</p>
						  <div id="ani"> </div>
					  	  </p>
					      </div>
					  
					  <h3>About Skeleton</h3>
					  <div>
					  <p>
					 	<p>Skeleton is built on three core principles:</p>
							<ul class="square">					    
								<li><strong>A Responsive Grid Down To Mobile</strong>: Skeleton has a familiar, lightweight 960 grid as its base, but elegantly scales down to downsized browser windows, tablets, mobile phones (in landscape and portrait).</li>
								<li><strong>Fast to Start</strong>: Skeleton is a tool for rapid development. Get started fast with CSS best practices, a well-structured grid that makes mobile consideration easy, an organized file structure and super basic UI elements like lightly styled forms, buttons, tabs and more.</li>
								<li><strong>Style Agnostic</strong>: Skeleton is not a UI framework. It's a development kit that provides the most basic styles as a foundation, but is ready to adopt whatever your design or style is.</li>
							</ul>
						</p>
					  </div>
					 <h3>Poll</h3>
						  <div>
						   		<?php include 'includes/poll.php'; ?> 
						  </div>
					<h3>Weather to be shown in JSON</h3>
						  <div>
						    	<p>JSON Being Progressed To Show Weather in Leeds </p>
								<p><?php require 'includes/weatherjson.php'; ?></p>
						  </div>
						  </div>

			</div>	
		</div>
	 </div>
<?php require 'includes/footer.php'; ?>
