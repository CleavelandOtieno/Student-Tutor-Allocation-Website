<?php
$usernm="root";
$passwd="";
$host="localhost";
$database="vintage_unversity_db";
$con=mysqli_connect($host,$usernm,$passwd) or die ("Unable to connect");
mysqli_select_db($con,$database) or die("Unable to select database");

$studentRegNo=$_POST['studentRegNo'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$uname=$_POST['uname'];
$email=$_POST['email'];
$DOB=$_POST['DOB'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];

$query="INSERT INTO regStudent VALUES('$studentRegNo','$fname','$lname','$uname','$email','$DOB','$password1','$password2')";
mysqli_query($con,$query);
include "login.html";


?>