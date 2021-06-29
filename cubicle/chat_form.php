<?php 
session_start();
include('services/connection.php');

$club_id = $_POST['club_id'];
$message_content = $_POST['message_content'];
$student_id = $_SESSION['id'];


$message_id = uniqid()."-".uniqid();
$message_status = "unread";
 $message_date = time();


if($message_content == '') {
    header('location: chatbox.php?club_id='.$club_id);
} else {
    mysqli_query($con, "INSERT INTO `chats`(`message_id`, `sender_id`, `receiver_id`,`message_content`, `message_status`, `message_date`) VALUES ('$message_id','$student_id','$club_id','$message_content','$message_status',NOW())");
    header('location: chatbox.php?club_id='.$club_id);
}



?>