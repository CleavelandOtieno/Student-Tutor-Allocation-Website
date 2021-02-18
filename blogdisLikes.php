<?php

$usernm="root";
$passwd="";
$host="localhost";
$database="vintage_unversity_db";
$con=mysqli_connect($host,$usernm,$passwd) or die ("Unable to connect");
mysqli_select_db($con,$database) or die("Unable to select database");

//echo "connected";

if (isset($_POST['dislike'])) {
	$user_id = $_POST['user_id'];
	$postID = $_POST['postID'];
//echo "fetched";
$sql = "INSERT INTO blogdislikestatus (user_id, postID) VALUES ('$user_id', '$postID')";
mysqli_query($con,$sql);
header("location:blogView.php?postID=" . $postID);
//include "blogView.php";
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

