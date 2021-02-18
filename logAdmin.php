<?php
$usernm="root";
$passwd="";
$host="localhost";
$database="vintage_unversity_db";
$con=mysqli_connect($host,$usernm,$passwd) or die ("Unable to connect");
mysqli_select_db($con,$database) or die("Unable to select database");

$username=$_POST['username'];
$password=$_POST['password'];

$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);

$result = mysqli_query($con ,"SELECT * FROM administrator WHERE adminUserName = '$username' AND adminPass = '$password'");
$row = mysqli_fetch_array($result);
if ($row['adminUserName'] == $username && $row['adminPass'] == $password) {
	 include "adminAllocation.php";
}else
{
	include "adminlogin.php";
}
 
/*include('database_connection.php');

$username=$_POST['name'];
$password=$_POST['passw'];

$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con,$_POST['name']);
$password = mysqli_real_escape_string($con,$_POST['passw']);

$result = mysqli_query($con ,"SELECT * FROM administrator WHERE adminUserName = '$username' AND adminPass = '$password'");
$row = mysqli_fetch_array($result);
if ($row['adminUserName'] == $username && $row['adminPass'] == $password) {
	 include "adminAllocation.php";
}else
{
	 include "adminAllocation.php";
}*/
 


?>