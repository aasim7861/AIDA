<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<!-- Content -->

	<div class="one-thirds column">
		<div id="right" id="right">
			<div class="two-thirds column">
			<h3>About Us</h3>
			<p>Hello World! Click on the headers to expand the content which is separated in logical sections.</p>
		
					<div id="accordion1">
					<h3>Session Storage</h3>
					<div>
					  <p>
					   <div id="content1"></div>
   					 	<p id="logg" style="color: gray"></p>
					    <script>
					      if (!sessionStorage['counter']) {
					        sessionStorage['counter'] = 0;
					      } else {
					        sessionStorage['counter']++;
					      }
					      
					      document.querySelector('#content1').innerHTML = 
					          '<p>Website has been viewed <b> ' + sessionStorage.getItem('counter') + ' </b> times</p>' +
					          '<p>(The value will be available until we close the tab)</p>';
					    </script>
					    </p>
					    
					</div>
						  <h3>JS Local Storage</h3>
						  <div>
						   <div id="content"></div>
								<p id="log"></p>
							    <script>
							      // Generate the little markup from javascript
							      document.querySelector('#content').innerHTML = 
							          '<p><em>Save text locally (it will still be available after restarting your browser)</em></p>';
							      var area = document.createElement('textarea');
							      area.style.width = '300px'; 
							      area.style.height = '150px';
							      document.querySelector('#content').appendChild(area);
							      
							      // place content from previous edit
							      if (!area.value) {
							        area.value = window.localStorage.getItem('value');
							      }
							       
							      // your content will be saved locally
							      area.addEventListener('keyup', function () {
							        window.localStorage.setItem('value', area.value);
							        window.localStorage.setItem('timestamp', (new Date()).getTime());
							      }, false);
							      
							      updateLog();
							      setInterval(updateLog, 5000); // show time every 5 seconds
							      
							      function updateLog() {
							        var delta = 0;
							        if (window.localStorage.getItem('value')) {
							          delta = ((new Date()).getTime() - (new Date()).setTime(window.localStorage.getItem('timestamp'))) / 1000;
							          document.querySelector("#log").innerHTML = 'last saved: ' + delta + 's ago';
							        } 
							        else {
							          area.value = 'Type your text here...';
							        }
							      }
							    </script>
					</div>

						<h3>Google Search API</h3>
						  <div>
						   		<script>
								  (function() {
								    var cx = '004387882137772545161:gohlrivnlsm';
								    var gcse = document.createElement('script');
								    gcse.type = 'text/javascript';
								    gcse.async = true;
								    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
								        '//www.google.com/cse/cse.js?cx=' + cx;
								    var s = document.getElementsByTagName('script')[0];
								    s.parentNode.insertBefore(gcse, s);
								  })();
								</script>
								<gcse:search></gcse:search>
						  </div>
			 		
					<h3>Get Your Location</h3>
						<div>
						    <iframe width="600" height="450" frameborder="0" style="border:0" 
						    src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJryWK2gJceUgRcpA5ehRyAAc&key=AIzaSyAznaiJ5udrMubvn0soccEyh0abZdgTAEQ" allowfullscreen></iframe>
				            </div>
						  <h3>Video</h3>
						  <div>
						   	<iframe width="400" height="400" src="https://www.youtube.com/embed/M7FIvfx5J10" frameborder="0" allowfullscreen></iframe>
						</div>

						 <h3>Audio</h3>
						 <div>
						  <audio controls>
  							<source src="vincent.mp3" type="audio/mpeg"/>
  							<source src="vincent.ogg" type="audio/ogg"/>
  							<object type="application/x-shockwave-flash" data="media/OriginalMusicPlayer.swf" width="225" height="86"> 
   							<param name="movie" value="media/OriginalMusicPlayer.swf"/>
   							<param name="FlashVars" value="mediaPath=vincent.mp3" /> 
  						</object> 
						</audio>
						<audio id="player" src="vincent.mp3"></audio>
							<div> 
  								<button onclick="document.getElementById('player').play()">Play</button> 
  								<button onclick="document.getElementById('player').pause()">Pause</button> 
  								<button onclick="document.getElementById('player').volume += 0.1">Vol+ </button> 
  								<button onclick="document.getElementById('player').volume -= 0.1">Vol- </button> 
							</div>
						</div>

					<h2>Navigating XML Feeds</h2>
					<div>							
								<div id="tabs">
									  <ul>
										<li><a href="#tabs-1">About XML </a></li>
										<li><a href="#tabs-2">Static XML</a></li>
										<li><a href="#tabs-3">Dynamic XML(From Database)</a></li>
									  </ul>
									<div id="tabs-1">
										<h6>Information retrieved below is through XML feeds!</h6>
										<p> Please click on the link(s) below to view list (Generated by XML) of upcoming programmes with the TV listings. </p>

									</div>

									  <div id="tabs-2">
										<p> 	<?php

												$xml = simplexml_load_file('includes/boxer.xml');

												foreach ($xml->name as $name) {
													echo $name->year.' ('.$name->model.')<br>';
													foreach($name->details as $details){
														echo $details->boxername.'  released on '.$details->finishdate.'<br>';  
													}
												}

												?> 	</p>

												<div id="dialog" title="Basic dialog">
												  		<?php require 'includes/boxer.xml'; ?>
												</div>
												 
												<button id="opener">Access XML</button>
												<a href="includes/boxer.xml">Click here to access XML</a>
									  </div>
									  		  
									  <div id="tabs-3">
											<?php require 'includes/xml.php'; ?>
											<a href="includes/xml.php">Click here to access XML</a>
												</div>
													  
												</div>
												
		
												 </div>
												 </div>
				
		</div>	
		</div>
	 </div>
</body>
</html>
<?php require 'includes/footer.php'; ?>




