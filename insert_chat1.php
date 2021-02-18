<?php

//insert_chat1.php

include('database_connection1.php');

session_start();

$data = array(
 ':to_ID'  => $_POST['to_sID'],
 ':from_ID'  => $_SESSION['tutorName'],
 ':chat_message'  => $_POST['chat_message'],
 ':status'   => '1'
);

$query = "
INSERT INTO chatplatform 
(to_user_id, from_user_id, chat_message, status) 
VALUES (:to_sID, :from_tID, :chat_message, :status)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 echo fetch_user_chat_history($_SESSION['tutorName'], $_POST['to_sID'], $connect);
}

?>