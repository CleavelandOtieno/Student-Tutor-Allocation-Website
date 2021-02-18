<?php
if(isset($_POST['action']))
{
	include('database_connection.php');

	$output = '';

	if($_POST["action"] == 'country')
	{
		$query = "
		SELECT email FROM regtutor 
		";
		$statement = $connect->prepare($query);
		$statement->execute(
		array(
				':email'		=>	$_POST["query"]
			)
	);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output .= '<input name="email" type="text" readonly id="email" value="'.$row["email"].'">';
			
		}
	}
	echo $output;
}

?>