<?php
if(isset($_POST['tuname']))
{
	include_once('database_connection.php');
	$query = "
	INSERT INTO allocation (tutorName, StudentAllocatedTo) 
	VALUES(:tuname, :suname)
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':tuname'		=>	$_POST['tuname'],
			':suname'		=>	$_POST['suname']
		)

	);

	$result = $statement->fetchAll();

	if(isset($result))
	{

		echo 'done';
	}
if(mail($_POST['temail'],'You have been Successfully Allocated to the below Students', $_POST['suname'])){
  }else
  {
    echo "fail";
  }
  if(mail($_POST['semail'],'You have been Successfully Allocated to the below Tutor', $_POST['tuname'])){
  }else
  {
    echo "fail";
  }
}

?>