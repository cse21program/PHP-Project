<?php 
     include('services/connection.php');
     session_start();
     $club_id = $_SESSION['club_id'];
     $club_row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM club_details WHERE club_id = '$club_id'"), MYSQLI_ASSOC);
     $club_name = $club_row['club_name'];
     $club_profile_picture = $club_row['profile_picture'];
     $club_mission = $club_row['mission'];
     $student_id = $_GET['student_id'];
     $student_row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM students WHERE id = '$student_id'"), MYSQLI_ASSOC);
     $student_firstname = $student_row['firstname'];
     $student_lastname = $student_row['lastname'];
     $student_profile_picture = $student_row['profile_picture'];
     $student_name = $student_firstname." ".$student_lastname;
     $status = 'member';

     $accept_request = mysqli_query($con, "INSERT INTO `club_members`(`club_id`, `student_id`, `student_name`, `student_profile_picture`, `club_name`, `club_profile_picture`, `club_mission`, `status`) VALUES ('$club_id','$student_id','$student_name','$student_profile_picture','$club_name','$club_profile_picture','$club_mission','$status')");

     if($accept_request) {
        mysqli_query($con, "DELETE FROM membership_requests WHERE student_id = '$student_id' and club_id = '$club_id'");
        header('location: requests.php'); 
     } else {
         die('error occure!');
     }

?>