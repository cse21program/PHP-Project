<?php
include("services/connection.php");
include("functions.php");

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $encrypass = data_encrytion($pass, $email);
    $result = mysqli_query($con, "SELECT * FROM `students` WHERE student_email = '$email' and student_password = '$encrypass'");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count == 0) {
        echo "<script>alert('Please check your email and password!'); window.location='index.php'</script>";
    } else {
        session_start();
        $_SESSION['id'] = $row['id'];
        header("location: home.php");
    } 
}

?>