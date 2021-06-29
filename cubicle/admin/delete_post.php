<?php 

  include('services/connection.php');

   $post_id = $_GET['post_id'];
   mysqli_query($con, "DELETE FROM post WHERE post_id = '$post_id'");
   mysqli_query($con, "DELETE FROM post_like WHERE post_id = '$post_id'");
   mysqli_query($con, "DELETE FROM post_comments WHERE post_id = '$post_id'");
  
   header('location: profile.php');


?>