<?php 
     include('services/connection.php');
     session_start();
     $club_id = $_SESSION['club_id'];
     $student_id = $_GET['student_id'];
     mysqli_query($con, "DELETE FROM membership_requests WHERE student_id = '$student_id' and club_id = '$club_id'");
     header('location: requests.php');
     //echo"<script>window.open('profile.php','_self')</script>";

?>