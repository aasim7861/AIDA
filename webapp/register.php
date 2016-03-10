<?php include ("includes/header.php");?>
<?php require 'includes/leftnav.php'; ?>
<!-- Content -->
   <div class="one-thirds column">
    <div id="right" id="right">
      <div class="two-thirds column">
            <h2 align="center"> Registration Details </h2>
                <p>Please fill in the form below to Register</p>
                <ul class="square">

                <form name="form1" method="post" action="register_action.php">    
                  <p>Please fill in the fields below: </p>
                  <p>Firstname
                  <input name="Firstname" type="text" id="Firstname" placeholder="Paul" required="required" onkeyup="this.value = this.value.replace(/[^\a-\z\A-\Z]+/g, '');"/>
                  </p>
                  <p>Surname 
                  <input name="Surname" type="text" id="Surname" placeholder="Doney" required="required" onkeyup="this.value = this.value.replace(/[^\a-\z\A-\Z]+/g, '');"/>
                  </p>
                   </p> <p> Only allowed <strong>10 characters</strong> for Username</p>
                  <p>Username 
                  <input name="Username" type="text" id="Username" maxlength="10" placeholder="Doney123" required="required"/> <div id="feedback"></div>
                  <p>Email 
                  <input name="Email" type="email" id="Email" placeholder="Enter a Valid Email Address" required="required"/> 
                  </p>
                  <p>Password 
                  <input name="Password" type="password" id="Password" maxlength="25" placeholder="Password" onkeyup="passwordStrength(this.value)" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" />
                  
                  <label for="pass2">Confirm Password:</label>
                   <input type="password" name="Confirm" id="Confirm" placeholder="Confirm Password" onkeyup="checkPass(); return false;" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" >
                   <span id="confirmMessage" class="confirmMessage"></span>
                    <div id="passwordDescription">Password not entered</div>
                    <div id="passwordStrength" class="strength0"></div>
                    </br> <p> <strong><font color="gold"> Password MUST contain at least 6 characters, including a UPPER/lowercase and numbers.</strong></font></p>           
                  <p>
                  <input type="submit" name="Submit" value="Register"/>
                  </p>
                </form>

            </div>
        </div>
        </div>
<?php 
include ("includes/footer.php"); 
?>  