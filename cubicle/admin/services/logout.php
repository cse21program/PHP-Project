<?php
include('connection.php');
session_start();
$club_id = $_SESSION['club_id'];
$position = 'offline';
mysqli_query($con, "UPDATE club_details SET login_status='$position' WHERE club_id='$club_id'");
session_destroy();
header('location: ../index.php');

?>