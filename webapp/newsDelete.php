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

<?php  
} 
?>

 <h3>This page permits the admin to remove individual RSS feeds which dynamically update the database</h3>

<?php
if ($_POST) {  
require 'includes/classes/NewsClass.php';
$sql = "DELETE FROM News WHERE news_id='". mysql_escape_string($_POST['newsId']) . "'";
$result = mysql_query($sql);
  if ($result) {
      $obj = new NewsClass();
      echo $obj->newsSuccess();
  } else {
    $obj = new NewsClass();
    echo $obj->newsOperationFailed();
   }}
      
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

echo <<<NEWS_DETAIL
<div class="right">
    <form action="{$_SERVER['PHP_SELF']}" method="post" onsubmit="if(!confirm('Are you sure you want to delete this item?')){return false;}">
        <input name="newsId" id="newsId" type="hidden" value="$newsId" />
        <button class="btn btn-danger">Delete Article</button>
    </form>
        <h2>$newsTitle</h2> 
                <div id="newsImage"><img src=$newsImage width=300 height=160></div>
                <div id="newsImageCaption"><p><i>$newsImageCaption</i></p><br/></div>
                <div id="newsBody"><p>$newsBody</p><br/></div>
                <div id="newsPublished"><p><b>Published:</b> $newsPublished</p><br/></div>
                <a href="collection.php"><button class="btn btn-success">Back</button></a>
</div> 
NEWS_DETAIL;
}
	echo '<footer>
				</footer><!--footer-->';
}
?>

</div>
</div>
<?php require 'includes/footer.php'; ?> 