<?php
$usernm="root";
$passwd="";
$host="localhost";
$database="vintage_unversity_db";
$con=mysqli_connect($host,$usernm,$passwd) or die ("Unable to connect");
mysqli_select_db($con,$database) or die("Unable to select database");

if (isset($_POST['posFeed'])) {

$feedback=$_POST['feedback'];
  	$query="INSERT INTO userreview VALUES('$feedback')";
mysqli_query($con,$query);
include "whoPage.html";
}else{
	echo "not complete";
}




?>