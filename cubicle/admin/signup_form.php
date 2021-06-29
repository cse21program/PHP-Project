<?php
   include("functions.php");
   include("services/connection.php");
   if(isset($_POST['submit'])) {
        $clubName = $_POST['name'];
        $clubEmail = $_POST['email'];
        $clubMission = $_POST['mission'];
        $phone = $_POST['phone'];
        $pass = $_POST['pass'];
        $c_pass = $_POST['pass2'];
        $clubWebsite = $_POST['website'];
        $founded = $_POST['founded'];


            $sql = mysqli_query($con, "SELECT * FROM `club_details` WHERE club_email='$clubEmail'");
            $row = mysqli_num_rows($sql);

            if($row > 0) {
                echo "<script>alert('$clubEmail is already taken ! Please try with another email id..'); window.location = 'index.php'</script>";
            }
            elseif($pass != $c_pass) {
                echo "<script>alert('Password do not match! Please correct your cofirmation password'); window.location = 'index.php'</script>";
            } else {
                $id = uniqid()."-".uniqid();
                $profile_picture = "not yet";
                $cover_picture = "not yet";
                $login_status = "offline";
                $encrypass = data_encrytion($pass, $clubEmail);
                mysqli_query($con, "INSERT INTO `club_details` (club_id, club_name, club_email, club_password, mission, club_phone, website, founded, profile_picture, cover_picture, login_status) VALUES ('$id', '$clubName', '$clubEmail', '$encrypass', '$clubMission', '$phone', '$clubWebsite', '$founded', '$profile_picture', '$cover_picture', '$login_status')");
                echo "<script>alert('Account successfully created'); window.location = 'index.php'</script>";
            }
    }
   
?>