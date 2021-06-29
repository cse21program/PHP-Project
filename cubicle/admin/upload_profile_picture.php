<?php
session_start();
if(!isset($_SESSION['club_id'])) {
    header('location: index.php');
} else {


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cubicle</title>
</head>
<body>
    <form  method="POST" enctype="multipart/form-data" >
        <input type="file" name="image">
        <input type="submit" value="save" name="image">
    </form>
    <?php
        include('services/connection.php');
        if(!isset($_FILES['image']['tmp_name'])) {
            echo "";
        } else {
            $file = $_FILES['image']['tmp_name'];
            $image = $_FILES['image']['name'];
            $image_name = addslashes($_FILES['image']['name']);
            $size = $_FILES['image']['size'];
            $error = $_FILES['image']['error'];

            $file_ext = strtolower(end(explode(".", $_FILES['image']['name'])));

            $extensions = array("jpeg", "jpg", "png");


            if($error > 0) {
                die("Error uploading file! code $error.");

            } elseif (in_array($file_ext, $extensions) === false){
                die("extension not allowed, please choose a JPEG or PNG file.");
            } else {
                if($size > 10000000) {
                    die("Format is not allowed or file size is too big!");
                } else {
                    $uniquename = time().uniqid(rand());
                    move_uploaded_file($_FILES['image']['tmp_name'],"upload/" .$uniquename . $_FILES['image']['name']);

                    $location = "upload/" . $uniquename . $_FILES['image']['name'];
                    $id = $_SESSION['club_id'];

                    $update_image = mysqli_query($con, "UPDATE `club_details` SET profile_picture = '$location' WHERE club_id = '$id'" );
                    header('location: profile.php');

                }
            }
        }
    
    
    ?>
</body>
</html>
<?php }?>