<?php 
     include('services/connection.php');
     session_start();
     $id = $_SESSION['id'];
     $post_id = $_GET['post_id'];
     $position = 'Liked';
     mysqli_query($con, "INSERT INTO post_like (id, post_id, position) VALUE ('$id', '$post_id', '$position')");
     header('location: home.php');
?>