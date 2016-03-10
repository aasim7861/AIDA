<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<div class="one-thirds column">
    <div id="right" id="right">
      <div class="two-thirds column">

<?php
	$connection = mysql_connect("localhost", "mohammedaasim_co_uk", "eyps6wZC") or die(mysql_error());
    mysql_select_db("mohammedaasim_co_uk", $connection) or die(mysql_error());

session_start();

// Check if we have an authenticated user
if (!isset($_SESSION["authenticatedUser"]))
//if not re-direct to login page
{
$_SESSION["message"] = "Welcome";

}
else
{ 
//If authenticated then display page contents
?>

     <h2><font color=red> Logged in as <?php echo $_SESSION["authenticatedUser"] ?> </font></h2>

    <h3>This page allows you to edit the RSS feed which dynamically updates the database</h3>

<?php  
} 
?>

				
<?php

if ($_POST) {
     if ($_POST['NewsId'])
        $newsId = mysql_real_escape_string($_POST['NewsId']);
    if ($_POST['newsTitle'])
        $newsTitle = mysql_real_escape_string($_POST['newsTitle']);
    if ($_POST['newsBody'])
        $newsBody = mysql_real_escape_string($_POST['newsBody']);
    if ($_POST['newsImage'])
        $newsImage = mysql_real_escape_string($_POST['newsImage']);
    if ($_POST['newsImageCaption'])
        $newsImageCaption = mysql_real_escape_string($_POST['newsImageCaption']);
    if ($newsTitle && $newsBody && $newsImage && $newsImageCaption) {
        $sql = "UPDATE News SET news_title =  '$newsTitle', news_body = '$newsBody',news_image = '$newsImage',
        news_img_caption = '$newsImageCaption' WHERE news_id = '$_POST[NewsId]'";
        $result = mysql_query($sql);
    }
    
    if($result) {
        echo "Line has been added!";
		echo "<p></p>";
		echo "<a href='collection.php'><button class='btn btn-danger'>Back</button></a>";
    }
	
  }
 
if (isset($_GET['NewsId'])){
$newsId = $_GET['NewsId'];
$sql = "SELECT * FROM News WHERE news_id LIKE '$newsId'";
$result  = mysql_query($sql);
if ($row = mysql_fetch_array($result)) {
    $newsTitle        = $row['news_title'];
    $newsBody         = $row['news_body'];
    $newsPublished    = $row['news_date'];
    $newsImage        = $row['news_image'];
    $newsImageCaption = $row['news_img_caption'];


echo <<<ADMIN_FORM
<div class="right">   
<form action="{$_SERVER['PHP_SELF']}" enctype="multipart/form-data" method="post" id="validation" onsubmit="if(!confirm('Are you sure you want to update this item?')){return false;}">
   <table>
        <tbody>
            <tr>
                <td><input name="NewsId" id="NewsId" type="hidden" value="$newsId" /></td>
            </tr>
            <tr>
                <td><label for="newsTitle"><b>News Title</b></label></td>
                <td><input name="newsTitle" id="newsTitle" type="text" maxlength="255" required class="required" value="$newsTitle"/></td>
            </tr>
            <tr>
                <td><label for="newsBody"><b>News Body</b></label></td>
                <td><textarea name="newsBody" id="newsBody" required class="required">$newsBody</textarea></td>
            </tr>
            <tr>
                <td><label for="newsImage"><b>News Image</b></label></td>
                <td><input name="newsImage" id="newsImage" required type="text" maxlength="255" class="required" value="$newsImage" /></td>
            </tr>
            <tr>
                <td><label for="newsImageCaption"><b>News Image Caption</b></label></td>
                <td><input name="newsImageCaption" id="newsImageCaption" type="text" maxlength="255" required class="required" value="$newsImageCaption" /></td>
            </tr>
            <tr>
                 <td><button class="btn btn-success">Update</button></td>
            </tr>
       </tbody>
    </table>
 </form>
        <a href="collection.php"><button class="btn btn-danger">Back</button></a>
</div>
ADMIN_FORM;

   }
}
?>


	</div>
	</div>
<?php require 'includes/footer.php'; ?> 
					
		
		