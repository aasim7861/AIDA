<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
<!-- Content -->
	<div class="one-thirds column">
		<div id="right" id="right">
			<div class="two-thirds column">
		<h2>Conact Us</h2>
				<h3> Your Feedback Counts</h3>
				<p>If you prefer, there are also a number of other ways to get in touch.  We’re always pleased to hear what our customers think of our stores and services, so please feel free to contact us!</p>
				<ul class="square">
					<div id="footer_form">
						<div class="label">
							<img src="assets/images/form_icon.png" alt="" />
							<h4>Send Us An Email</h4>
						</div>
						<form id="contact_form" method="post" action="contact_script.php" onsubmit="return checkForm(this);">	
										  		
							<fieldset>
							    <input class="round" type="text" id="datepicker" placeholder="Date" tebindex="1" required="required"/>
								<input class="round" type="text" name="name" id="name" placeholder="Name" tabindex="1" required="required" />
								<input class="round" type="email" name="email" id="email" placeholder="Enter a Valid Email Address"  tabindex="2" required="required" />
									<input class="round" type="text" name="subject" id="subject" placeholder="Subject" tabindex="1" required="required" />
							</fieldset>
							<fieldset>
								<textarea name="message" id="message" placeholder="Type In Your Message"rows="" cols="" tabindex="3"></textarea>
							</fieldset>

							<br>

							<p><img id="captcha" src="captcha.php" width="160" height="45" border="1" alt="CAPTCHA">
								<small><a href="#" onclick="
								  document.getElementById('captcha').src = 'captcha.php?' + Math.random();
								  document.getElementById('captcha_code').value = '';
								  return false;
								">Refresh</a></small></p>
								<p><input id="captcha_code" type="text" name="captcha" size="6" maxlength="5" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');"> 
								<small>Copy the digits from the image into this box</small></p>

								<input class="button" name="submit" type="submit" id="submit" tabindex="4" value="Submit" />
							</div>
						</form>
					</ul>
				</div>				
		</div>			
		</div>
<?php require 'includes/footer.php'; ?>
	
