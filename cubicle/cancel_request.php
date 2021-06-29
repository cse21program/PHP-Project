<?php 
     include('services/connection.php');
     session_start();
     $id = $_SESSION['id'];
     $club_id = $_GET['club_id'];
     mysqli_query($con, "DELETE FROM membership_requests WHERE student_id = '$id' and club_id = '$club_id'");
     header('location: club_details.php?club_id='.$club_id);
     //echo"<script>window.open('profile.php','_self')</script>";

?>