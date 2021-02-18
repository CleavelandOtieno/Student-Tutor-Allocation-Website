<?php
$usernm="root";
$passwd="";
$host="localhost";
$database="vintage_unversity_db";
$con=mysqli_connect($host,$usernm,$passwd) or die ("Unable to connect");
mysqli_select_db($con,$database) or die("Unable to select database");

if (isset($_POST['regTutor'])) {
	$tutorRegNo=$_POST['tutorRegNo'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$uname=$_POST['uname'];
$course=$_POST['course'];
$email=$_POST['email'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
{

  	$query="INSERT INTO login2 VALUES('$tutorRegNo','$uname','$password1')";
mysqli_query($con,$query);

  }
 if($_POST['password1'] != $_POST['password2'])
{
    echo('Passwords do not match!');
    include "registerTutor.html";
}else{

  	$query="INSERT INTO regtutor VALUES('$tutorRegNo','$fname','$lname','$uname','$course','$email','$password1','$password2')";
mysqli_query($con,$query);
include "login2.php";

  }

}




?>