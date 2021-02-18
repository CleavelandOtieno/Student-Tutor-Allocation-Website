<?php
if(isset($_POST['tuname']))
{
	include_once('database_connection.php');
	$query = "
	INSERT INTO allocation (tutorName, StudentAllocatedTo) 
	VALUES(:tuname, :fetchedStudentData)
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':tuname'		=>	$_POST['tuname'],
			':fetchedStudentData'	=>	$_POST['selectedStudentData']
		)
	);
	$result = $statement->fetchAll();

	if(isset($result))
	{
		echo 'done';
	}
if(mail($_POST['temail'],'You have been Successfully Allocated to the below Students', $_POST['selectedStudentData'])){
  }else
  {
    echo "fail";
  }
}

?>