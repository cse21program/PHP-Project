<?php
include("services/connection.php");
include("functions.php");

if(isset($_POST['submit'])) {
    $clubEmail = $_POST['email'];
    $pass = $_POST['password'];
    $encrypass = data_encrytion($pass, $clubEmail);
    $result = mysqli_query($con, "SELECT * FROM `club_details` WHERE club_email = '$clubEmail' and club_password = '$encrypass'");
   
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $club_id = $row['club_id'];
    $count = mysqli_num_rows($result);


    if($count == 0) {
        echo "<script>alert('Please check your email and password!'); window.location='index.php'</script>";
    } else {
        session_start();
        $_SESSION['club_id'] = $row['club_id'];
        $position = 'online';
        mysqli_query($con, "UPDATE `club_details` SET login_status='$position' WHERE club_id = '$club_id'");
        header("location: home.php");
    }
}

?>