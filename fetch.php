<?php
//fetch.php

if(isset($_POST['action']))
{
	include('database_connection.php');

	$output = '';
	if($_POST["action"] == 'tuname')
	{
		$query = "
		SELECT userName FROM regstudent
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':fetchedStudentData'		=>	$_POST["query"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output .= '<option value="'.$row["userName"].'">'.$row["userName"].'</option>';
		}


	}
	echo $output;
}

?>