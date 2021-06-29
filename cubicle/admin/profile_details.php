<?php 
  session_start();
  $club_id=$_SESSION['club_id'];
  if(!isset($_SESSION['club_id'])) {
    header('location: index.php');
  } else {
      include('services/connection.php');
      $id = $_GET['student_id'];

      $row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM students WHERE id = '$id'"), MYSQLI_ASSOC);
      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      $profile_picture = $row['profile_picture'];
      $student_id = $row['student_id'];
      $department = $row['department'];
      $batch = $row['batch'];
      $student_email = $row['student_email'];
      $student_phone = $row['student_phone'];
      $gender = $row['gender'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="css/profile_details.css">
</head>
<body>
<div id="header">
		<div class="head-view">
			<ul>
				<li class="title"><a href="home.php"><b>Cubicle</b></a></li>
        <div class="pages">
          <li><a href="home.php" ><label >Home</label></a></li>
          <li><a href="profile.php"><label >Profile</label></a></li>
          <li><a href="chat.php"><label>Chat</label></a></li>
          <li><a href="requests.php" ><label>Requests</label></a></li>
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
                        <a> <img src="<?php echo "../".$profile_picture?>" alt=""> </a>
                      
                        <p class="name"><span><?php echo "$firstname $lastname"?></span></p>
                        <p><span><?php echo $batch?></span></p>
                        <p><span><?php echo $department?></span></p>
                      </div>
                      <?php 
                      $query2 = "SELECT * FROM `club_members` WHERE student_id='$id' AND club_id='$club_id'";
                      $current_user_info = mysqli_query($con, $query2);
                      $row2 = mysqli_fetch_array($current_user_info, MYSQLI_ASSOC);

                      if($row2['status'] == 'member') {
                        ?>
                        <div class="div">
                            <a style="padding: 5px 45px;" class="btn btn-primary" href="#">Member</a>
                            <a style="margin-left:30px; padding: 5px 45px" class="btn btn-danger" href="chatbox.php<?php echo '?student_id='.$id;?>">Message</a>
                      </div>
                      <?php }  else {?>
                      
                      <div class="div">
                      <a style="padding: 5px 45px" class="btn btn-primary" href="accept_requests.php<?php echo '?student_id='.$id;?>">Accept</a>
						          <a style="margin-left:30px; padding: 5px 45px" class="btn btn-danger" href="reject_requests.php<?php echo '?student_id='.$id?>">Reject</a>
                      </div>
                      <?php } ?>
        
                  </div>
             
              
              <div class="profile-details">
                  <p><b>Full Name:</b><span><?php echo "$firstname $lastname"?></span></p>
                  <p><b>Department:</b><span><?php echo "$department"?></span></p>
                  <p><b>Batch:</b><span><?php echo "$batch"?></span></p>
                  <p><b>Email:</b><span><?php echo "$student_email"?></span></p>
                  <p><b>id:</b><span><?php echo "$student_id"?></span></p>
                  <p><b>Phone:</b><span><?php echo "$student_phone"?></span></p>
                  <p><b>Gender:</b><span><?php echo "$gender"?></span></p>
              </div>
        </div>
      </div>
  </div>
   
      
  </div>
</div>



</body>
</html>
<?php  }?>