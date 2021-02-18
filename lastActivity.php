<?php
include('database_connection1.php');

session_start();

$query="
UPDATE status_activity
SET statusActivity = now()
WHERE statusID = '".$_SESSION["statusID"]."'

";
$statement = $connect->prepare($query);

$statement->execute();
?>