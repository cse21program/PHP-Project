<?php 
     include('services/connection.php');
     session_start();
     $id = $_SESSION['club_id'];
     $post_id = $_GET['post_id'];
     mysqli_query($con, "DELETE FROM post_like WHERE id = '$id' and post_id = '$post_id'");
     header('location: home.php');
     //echo"<script>window.open('profile.php','_self')</script>";

?>