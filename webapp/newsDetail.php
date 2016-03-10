<?php require 'includes/header.php'; ?>
<?php require 'includes/leftnav.php'; ?>
<div class="two-thirds column">
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

 <h3>This page provides more information about the selected feed </h3>

<?php
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
        <h2>$newsTitle</h2>
        <div id="image"><img src=$newsImage class="img-rounded" width=200 height=200 ></div>
        <div id="caption"><p><i><kbd>$newsImageCaption</kbd></i></p><br/></div>
        <div id="body"><p>$newsBody</p><br/></div>
        <div id="published"><p><b>Published:</b> $newsPublished</p><br/></div>
        <a href="collection.php"><button class="btn btn-primary">Back</button></a>
        </div>    
NEWS_DETAIL;
}

	
?>
</div>
</div>
<?php require 'includes/footer.php'; ?> 
