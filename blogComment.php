<?php

$usernm="root";
$passwd="";
$host="localhost";
$database="vintage_unversity_db";
$con=mysqli_connect($host,$usernm,$passwd) or die ("Unable to connect");
mysqli_select_db($con,$database) or die("Unable to select database");

//echo "connected";

if (isset($_POST['postComment'])) {
			$user_id = $_POST['user_id'];
			$username = $_POST['username'];
			$postID = $_POST['postID'];
			$blogComment = $_POST['blogComment'];
//echo "fetched";
			if ($blogComment != "") {
$sql = "INSERT INTO blogcomment (user_id, postID, userName, comment) VALUES ('$user_id', '$postID', '$username', '$blogComment')";
mysqli_query($con,$sql);
header("Location:blogView.php?postID=" . $postID);
//include "blogView.php";
}
}
	/*$sql = "INSERT INTO bloglikestatus (user_id, postID) VALUES ('$user_id', '$postID')";

mysqli_query($con,$sql);

		include "blogView.php";

		}else
		{
			echo "fail";
		}
*/
?>