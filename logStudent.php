<?php
$usernm="root";
$passwd="";
$host="localhost";
$database="vintage_unversity_db";
$con=mysqli_connect($host,$usernm,$passwd) or die ("Unable to connect");
mysqli_select_db($con,$database) or die("Unable to select database");

$username=$_POST['name'];
$password=$_POST['pass'];

$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con,$_POST['name']);
$password = mysqli_real_escape_string($con,$_POST['pass']);

$result = mysqli_query($con ,"SELECT * FROM regstudent WHERE userName = '$username' AND firstPassword = '$password'");
$row = mysqli_fetch_array($result);
if ($row['userName'] == $username && $row['firstPassword'] == $password) {
	echo "Welcome -" .$row['userName'];
	 include "messagePlatform1.php";
}else
{
	include "login.html";
}
 


?>