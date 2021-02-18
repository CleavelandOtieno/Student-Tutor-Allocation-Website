<?php
//database_connection1.php
$connect = new PDO("mysql:host=localhost;dbname=vintage_unversity_db", "root", "");

function fetch_tutorandStudentActivity($loggedUser,$connect){
	$query = "
		SELECT * FROM status_activity
		WHERE loggedUser = '$loggedUser'
		ORDER BY statusActivity DESC
		LIMIT 1
	";
	$statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row['statusActivity'];
 }
}
function fetch_user_chat_history($from_ID, $to_ID, $connect){
	$query = "
 SELECT * FROM chatplatform 
 WHERE (from_user_id = '".$from_ID."' 
 AND to_user_id = '".$to_ID."') 
 OR (from_user_id = '".$to_ID."' 
 AND to_user_id = '".$from_ID."') 
 ORDER BY status DESC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '<ul class="list-unstyled">';
  foreach($result as $row)
 {
  $user_name = '';
  if($row["from_user_id"] == $from_ID)
  {
   $user_name = '<b class="text-success">You</b>';
  }
  else
  {
   $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
  }
  $output .= '
  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$row["chat_message"].'
    <div align="right">
     - <small><em>'.$row['status'].'</em></small>
    </div>
   </p>
  </li>
  ';
 }
 $output .= '</ul>';
 return $output;
}
function get_user_name($user, $connect)
{
 $query = "SELECT tutorName FROM allocation WHERE allocationNo = '$user'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row['tutorName'];
 }
}
 
?>