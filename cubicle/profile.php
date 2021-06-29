<?php
session_start();
if(!isset($_SESSION['id'])) {
	header('location: index.php');
} else {

?>

<!DOCTYPE html>
<html>

	<head>
		<title>Cubicle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="css/profile.css">
	</head>

<body>
  <?php 
  include('services/connection.php');
   $id = $_SESSION['id'];
   $query = "SELECT * FROM `students` WHERE id='$id'";
   $current_user_info = mysqli_query($con, $query);
   $row = mysqli_fetch_array($current_user_info, MYSQLI_ASSOC);
   

   $firstname = $row['firstname'];
   $lastname = $row['lastname'];
   $student_id = $row['student_id'];
   $student_email = $row['student_email'];
   $department = $row['department'];
   $batch = $row['batch'];
   $gender = $row['gender'];
   $profile_picture = $row['profile_picture'];
   $student_phone = $row['student_phone'];
   
  
  ?>
<div id="header">
		<div class="head-view">
			<ul>
				<li class="title"><a href="home.php"><b>Cubicle</b></a></li>
        <div class="pages">
          <li><a href="home.php" ><label >Home</label></a></li>
          <li><a href="profile.php"><label style="color: wheat;">Profile</label></a></li>
          <li><a href="chat.php"><label>Chat</label></a></li>
          <li><a href="clubactivity.php" ><label>Club Activity</label></a></li>
          <li><a href="services/logout.php" title="Log out"><button class="btn-signout" value="Log out">Log out</button></a></li>

        </div>
			</ul>
		</div>
</div>
<div class="container-fluid gedf-wrapper">
  <div class="row justify-content-center">
  <div class="col-md-10 ">
  <div class="profile-body">
          <div class="profile-container">
              
                  <div class="student-profile">
          
                      <div class="student-profile-attribute">
                        <a href="upload_profile_picture.php"> <img src="<?php echo $profile_picture?>" alt=""> </a>
                      
                        <p class="name"><span><?php echo "$firstname $lastname"?></span></p>
                        <p><span><?php echo $batch?></span></p>
                        <p><span><?php echo $department?></span></p>
                      </div>
        
                  </div>
             
              
              <div class="profile-details">
                  <p><b>Full Name:</b><span><?php echo "$firstname $lastname"?></span></p>
                  <p><b>Department:</b><span><?php echo "$department"?></span></p>
                  <p><b>Batch:</b><span><?php echo "$batch"?></span></p>
                  <p><b>Email:</b><span><?php echo "$student_email"?></span></p>
                  <p><b>id:</b><span><?php echo "$student_id"?></span></p>
                  <p><b>Phone:</b><span><?php echo "$student_phone"?></span></p>
                  <p><b>Gender:</b><span><?php echo "$gender"?></span></p>
                  <button type="button">Edit</button>
              </div>
        </div>
      </div>
  </div>
   
      
  </div>
</div>

<footer>
			<h5>Contact</h5>
			<p>Phone: 0145865463</p>
			<p>Email: cubicle@lus.ac.bd</p>
	</footer>

</body>

</html>

<?php }?>