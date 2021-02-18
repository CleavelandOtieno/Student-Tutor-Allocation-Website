<?php 
$usernm="root";
$passwd="";
$host="localhost";
$database="vintage_unversity_db";
$con=mysqli_connect($host,$usernm,$passwd) or die ("Unable to connect");
mysqli_select_db($con,$database) or die("Unable to select database");

if (isset($_POST['msgsent1'])) {
	$name=$_POST['name'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];
	$message=$_POST['message'];
	$query="INSERT INTO contactlist VALUES('$name','$email','$subject','$message')";
	mysqli_query($con,$query);
 include "contact.html";
if(mail($_POST['email'],$_POST['subject'], $_POST['message'])){
    include "contact.html";
  }else
  {
    echo "fail";
  }
}
?>