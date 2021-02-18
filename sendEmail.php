<?php 
$usernm="root";
$passwd="";
$host="localhost";
$database="vintage_unversity_db";
$con=mysqli_connect($host,$usernm,$passwd) or die ("Unable to connect");
mysqli_select_db($con,$database) or die("Unable to select database");

if (isset($_POST['sendmail'])) {
	$email=$_POST['email'];
	$time=$_POST['time'];
	$query="INSERT INTO sentmail VALUES('$email','$time')";
	mysqli_query($con,$query);
  include "index.html";
if(mail($_POST['email'],'Welcome', 'you will recieve Offers and Newsletters')){
    include "index.html";
  }else
  {
    echo "fail";
  }
}
?>