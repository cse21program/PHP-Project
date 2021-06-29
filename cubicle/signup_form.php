<?php
   include("functions.php");
   include("services/connection.php");
   if(isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $student_id = $_POST['student_id'];
        $pass = $_POST['pass'];
        $c_pass = $_POST['pass2'];
        $department = $_POST['department'];
        $batch = $_POST['batch'];
        $gender = $_POST['gender'];
        $student_phone = $_POST['student_phone'];


            $sql = mysqli_query($con, "SELECT * FROM `students` WHERE student_email='$email'");
            $row = mysqli_num_rows($sql);

            if($row > 0) {
                echo "<script>alert('$email is already taken ! Please try with another email id..'); window.location = 'index.php'</script>";
            }
            elseif($pass != $c_pass) {
                echo "<script>alert('Password do not match! Please correct your cofirmation password'); window.location = 'index.php'</script>";
            } else {
                $id = uniqid()."-".uniqid();
                $profile_picture = "not yet";
                $login_status = "offline";
                $encrypass = data_encrytion($pass,$email);
                mysqli_query($con, "INSERT INTO `students` (id, firstname, lastname, student_id, student_email, student_password, department, batch, gender, student_phone, profile_picture, login_status) VALUES ('$id', '$firstname', '$lastname', '$student_id', '$email', '$encrypass', '$department', '$batch', '$gender', '$student_phone','$profile_picture', '$login_status')");
                echo "<script>alert('Account successfully created'); window.location = 'index.php'</script>";
            }
    }
   
?>