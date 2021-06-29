<?php 
     include('services/connection.php');
     session_start();
     $id = $_SESSION['club_id'];
     $post_id = $_GET['post_id'];
     $position = 'Liked';
     mysqli_query($con, "INSERT INTO post_like (id, post_id, position) VALUE ('$id', '$post_id', '$position')");
     header('location: home.php');
     //echo"<script>window.open('profile.php','_self')</script>";

?>