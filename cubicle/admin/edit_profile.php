<?php 
    session_start();
    if(!isset($_SESSION['club_id'])) {
        header('location: index.php');
    } else {
        include('services/connection.php');
        $id = $_SESSION['club_id'];
        $query = "SELECT * FROM `club_details` WHERE club_id='$id'";
        $current_user_info = mysqli_query($con, $query);
        $row = mysqli_fetch_array($current_user_info, MYSQLI_ASSOC);
        
        $mission = $row['mission'];
        $club_name = $row['club_name'];
        $title = $clubName;
        $club_email = $row['club_email'];
        $profile_picture = $row['profile_picture'];
        $club_phone = $row['club_phone'];
        $cover_picture = $row['cover_picture'];
        $website =  $row['website'];
        $founded =  $row['founded'];
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $club_name?></title>
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
				crossorigin="anonymous">

</head>
<body>
<div id="header">
		<div class="head-view">
			<ul>
				<li class="title"><a href="home.php"><b>Cubicle</b></a></li>
				<div class="pages">
						<li><a href="home.php" ><label>Home</label></a></li>
						<li><a href="profile.php"><label>Profile</label></a></li>
						<li><a href="chat.php"><label>Chat</label></a></li>
						<li><a href="requests.php"><label>Requests</label></a></li>
						<li><a href="services/logout.php" title="Log out"><button class="btn-signout" value="Log out">Log out</button></a></li>
				</div>
				
			</ul>
		</div>
</div>
<div class="container-fluid gedf-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-6 card" style="margin-top:10px; padding:15px">
        <form action="<?php echo $_SERVER['PHP_SEFT']?>" method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $club_name?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Mission</label>
                <textarea class="form-control" name="mission" rows="5"><?php  echo $mission; ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="<?php echo $club_email ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="number" name="phone" value="<?php echo $club_phone?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Website</label>
                <input type="text" name="website" value="<?php echo $website ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Founded</label>
                <input type="text" name="founded" value="<?php echo $founded?>" class="form-control">
            </div>  
            
                <input type="submit" name="submit" class="form-control btn btn-primary" value="Update">
        </form>

        <?php 
        
        include('services/connection.php');
        $id = $_SESSION['club_id'];
            if(isset($_POST['submit'])) {
                $u_name = $_POST['name'];
                $u_mission = $_POST['mission'];
                $u_website = $_POST['website'];
                $u_phone = $_POST['phone'];
                $u_email = $_POST['email'];
                $U_founded = $_POST['founded'];
                $update_data = mysqli_query($con, "UPDATE `club_details` SET club_name = '$u_name', club_email = '$u_email', mission = '$u_mission', club_phone = '$u_phone', website = '$u_website', founded = '$U_founded' WHERE club_id = '$id'");

                if($update_data) {
                    header('location: profile.php');
                }
        
             }
        
        ?>
        </div>
    </div>

</div>

</body>
</html>
<?php } ?>