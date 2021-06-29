<?php 
session_start();
include('services/connection.php');

$student_id = $_POST['student_id'];
$message_content = $_POST['message_content'];
$club_id = $_SESSION['club_id'];


$message_id = uniqid()."-".uniqid();
$message_status = "unread";
 $message_date = time();


if($message_content == '') {
    header('location: chatbox.php?student_id='.$student_id);
} else {
    mysqli_query($con, "INSERT INTO `chats`(`message_id`, `sender_id`, `receiver_id`,`message_content`, `message_status`, `message_date`) VALUES ('$message_id','$club_id','$student_id','$message_content','$message_status',NOW())");
    header('location: chatbox.php?student_id='.$student_id);
}



?>