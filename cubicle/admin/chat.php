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
  <title>Admin</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="css/chat.css">
</head>
<body>
<div id="header">
		<div class="head-view">
			<ul>
				<li class="title"><a href="home.php"><b>Cubicle</b></a></li>
        <div class="pages">
          <li><a href="home.php" ><label >Home</label></a></li>
          <li><a href="profile.php"><label >Profile</label></a></li>
          <li><a href="chat.php"><label style="color:wheat">Chat</label></a></li>
          <li><a href="requests.php" ><label>Requests</label></a></li>
          <li><a href="members.php" ><label>Members</label></a></li>
          <li><a href="services/logout.php" title="Log out"><button class="btn-signout" value="Log out">Log out</button></a></li>
        </div>
			
			</ul>
		</div>
</div>

<div class="container-fluid gedf-wrapper">
	<div class="row justify-content-center" style="margin-top: 10px;">
		<div class="col-md-4" style="">
		<?php
			include('services/connection.php');
			$current_id = $_SESSION['club_id'];
			$query = mysqli_query($con, "SELECT * FROM club_members WHERE club_id = '$current_id' ");
			while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

				$student_name = $row['student_name'];
				$student_profile_picture = $row['student_profile_picture'];
				$student_id = $row['student_id'];

        $query3 = mysqli_query($con, "SELECT * FROM chats WHERE sender_id='$current_id' OR receiver_id = '$current_id' ORDER BY message_id DESC");

        if($row3 = mysqli_fetch_array($query3, MYSQLI_ASSOC)) {
		
		
		?>
			<div class="card gedf-card">
				<div class="card-header justify-content-center" >
				<a style="text-decoration:none; color:black" href="chatbox.php<?php echo '?student_id='.$student_id;?>">
				<div class="d-flex justify-content-between align-items-center">
						<div class="d-flex justify-content-between align-items-center">
							<div class="mr-2" style="margin-left: 10px">
								<img class="rounded-circle" width="90" height="90" src="<?php echo "../".$student_profile_picture?>">
							</div>
							<div  style="margin-left: 20px;" class="mr-2 ">
								<div  class="h5 m-0"><?php echo $student_name ?></div>
							</div>
							
						</div>
					</div>	
				
				</a>


				</div>
			</div>
			<br>
			<?php }}?>
		</div>
	</div>
</div>
</body>


</html>

<?php } ?>