<?php 
include_once ("includes/connection.php");
// if id provided, then delete that recor
	$UserID = $_GET['UserID'];
// create query to delete record
	$query = "DELETE FROM Users WHERE UserID = '$UserID' ";
	$result = mysqli_query($connection, $query) or exit("Error in query: $query. " . mysqli_error($connection));
// see if any rows were affected
	if (mysqli_affected_rows($connection) > 0) {
//If so , return to calling page(stored in the server variables as HTTP_REFERER
	 header("Location: {$_SERVER['HTTP_REFERER']}");  
		} else {
// print error message
			echo "Error in query: $query. " . mysqli_error($connection);
			exit ;
			}
?>
 <script type="text/javascript">
   window.location = "loginadmin.php";
 </script>