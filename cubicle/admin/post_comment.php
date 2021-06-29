<?php 
    include('services/connection.php');
    session_start();
    $current_user_id = $_SESSION['club_id'];
    $query2 = "SELECT * FROM `club_details` WHERE club_id='$current_user_id'";
    $current_user_info = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_array($current_user_info, MYSQLI_ASSOC);
    $current_user_name = $row2['club_name'];
    $current_user_profile_picture = $row2['profile_picture'];
    $post_id = $_POST['post_id'];

        $comment_content = $_POST['comment_content'];
        $time = time();
        $comment_id = uniqid()."-".uniqid();

        mysqli_query($con, "INSERT INTO post_comments (id, post_id, comment_id, comment_content, name, profile_picture, time) VALUES ('$current_user_id', '$post_id', '$comment_id', '$comment_content', '$current_user_name', '$current_user_profile_picture', '$time')");
        header('location: home.php');
   


?>