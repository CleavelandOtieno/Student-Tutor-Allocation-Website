<?php
$usernm="root";
$passwd="";
$host="localhost";
$database="vintage_unversity_db";
$con=mysqli_connect($host,$usernm,$passwd) or die ("Unable to connect");
mysqli_select_db($con,$database) or die("Unable to select database");

if (isset($_POST['regUser'])) {
	$studentRegNo=$_POST['studentRegNo'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$uname=$_POST['uname'];
$email=$_POST['email'];
$DOB=$_POST['DOB'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
{

  	$query="INSERT INTO login VALUES('$studentRegNo','$uname','$password1')";
mysqli_query($con,$query);

  }

 if($_POST['password1'] != $_POST['password2'])
{
    echo('Passwords do not match!');
    include "registerStudent.html";
}else{

  	$query="INSERT INTO regstudent VALUES('$studentRegNo','$fname','$lname','$uname','$email','$DOB','$password1','$password2')";
mysqli_query($con,$query);
include "login.php";

  }
  

}




?>