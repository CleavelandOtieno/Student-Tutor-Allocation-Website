<?php
include('database_connection1.php');

session_start();

$query="
SELECT * FROM allocation
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output='
<table class="table table-bordered table-striped">
	<tr>
		<td>Student Username</td>
		<td>Chat Status</td>
		<td>Chat Platform</td>
	</tr>
';

foreach ($result as $row) {
	$status = '';
	$current_time = strtotime(date('Y-m-d H:i:s') . '-10 seconds');
	$current_time = date('Y-m-d H:i:s',$current_time);
	$userActivity = fetch_tutorandStudentActivity($row['allocationNo'] , $connect);
	if ($userActivity > $current_time) {
		$status = '<span class="label label-success">Online</span>';
	}else{
		$status = '<span class="label label-danger">ONLINE BUT OFFLINE</span>';
	}
	$output .='
 		<tr>
		<td>'.$row['StudentAllocatedTo'].'</td>
		<td>'.$status.'</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-tousername="'.$row['StudentAllocatedTo'].'">Start Chat</button></td>
 </tr>
	';
}
$output .= '</table>';

echo $output;
?>