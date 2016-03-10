  // Datapick Script
  $(function() {
      $( "#datepicker" ).datepicker();
    });

  //accordion
  $(function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  });
  $(function() {
    $( "#accordion" ).accordion({
      heightStyle: "content"
    });
  });

  //tabs
    $(function() {
    $( "#tabs" ).tabs();
  });

  //dialog
  $(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
    $( "#opener" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });
  });

  //about accordion
  $(function() {
    $( "#accordion1" ).accordion({
      heightStyle: "content",
      collapsible: true,
      autoHeight: false,
      active: false,
      fillSpace: true
    });
  });

  //Captch 
      function checkForm(form)
      {

        if(!form.captcha.value.match(/^\d{5}$/)) {
          alert('Please enter the CAPTCHA digits in the box provided');
          form.captcha.focus();
          return false;
        }

        return true;
      }

  // search on admin 

  $(function() {
    var availableTags = [
      "Mohammed", "Aasim", "The", "Rock",  "Steven", "Gerrad", "Luis", "Suarez",
      "Mario", "Ballotelli","Lionel","Messi","Frank","Lampard","Sergio","Aguero",
      "John","Terry","Alex","Xavi","Fernando","Torres", "Andres", "Iniesta",
      "Zlatan", "Ibrahimovic","Radamel", "Falcao"
    ];
    $( "#searchUsername" ).autocomplete({
      source: availableTags
    });
  });

  //password Script

function passwordStrength(password)
{
  var desc = new Array();
  desc[0] = "Very Weak";
  desc[1] = "Weak";
  desc[2] = "Better";
  desc[3] = "Medium";
  desc[4] = "Strong";
  desc[5] = "Strongest";

  var score   = 0;

  //if password bigger than 6 give 1 point
  if (password.length > 6) score++;

  //if password has both lower and uppercase characters give 1 point  
  if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

  //if password has at least one number give 1 point
  if (password.match(/\d+/)) score++;

  //if password has at least one special caracther give 1 point
  if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) score++;

  //if password bigger than 12 give another 1 point
  if (password.length > 12) score++;

   document.getElementById("passwordDescription").innerHTML = desc[score];
   document.getElementById("passwordStrength").className = "strength" + score;
}

// check if passwords match 
function checkPass()
{
    //Store the password field objects into variables ...
    var Password = document.getElementById('Password');
    var Confirm = document.getElementById('Confirm');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(Password.value == Confirm.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        Confirm.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!";
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        Confirm.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!";
    }
} 

//check if username already exist using ajax

$(document).ready(function() {
    $('#feedback').load('check.php').show();
    
    $('#Username').keyup(function() {
      $.post('check.php', { Username: form1.Username.value }, 
      function(result) {
        $('#feedback').html(result).show();
    });
  }); 
  
});