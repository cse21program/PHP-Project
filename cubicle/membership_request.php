<?php 
     include('services/connection.php');
     session_start();
     $id = $_SESSION['id'];
     $row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM students WHERE id = '$id'"), MYSQLI_ASSOC);
     $profile_picture = $row['profile_picture'];
     $firstname = $row['firstname'];
     $lastname = $row['lastname'];
     $club_id = $_GET['club_id'];
     $name = $firstname." ".$lastname;
     
     $request_type = "received";
     mysqli_query($con, "INSERT INTO membership_requests (club_id, student_id, student_profile_picture, student_name, request_type) VALUE ('$club_id', '$id', '$profile_picture', '$name','$request_type')");
     header('location: club_details.php?club_id='.$club_id);  
?>