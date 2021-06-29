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
    <link rel="stylesheet" href="css/requests.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin</title>
</head>
<body>
<div id="header">
		<div class="head-view">
			<ul>
				<li class="title"><a href="home.php"><b>Cubicle</b></a></li>
				<div class="pages">

						<li><a href="home.php" ><label >Home</label></a></li>
						<li><a href="profile.php"><label>Profile</label></a></li>
						<li><a href="chat.php"><label>Chat</label></a></li>
						<li><a href="requests.php" ><label  style="color:wheat">Requests</label></a></li>
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
			$query = mysqli_query($con, "SELECT * FROM membership_requests WHERE club_id = '$current_id' ORDER BY student_id DESC");
			while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$student_name = $row['student_name'];
				$student_profile_picture = $row['student_profile_picture'];
				$student_id = $row['student_id'];
		
		
		?>
			<div class="card gedf-card">
				<div class="card-header justify-content-center" >
				<a style="text-decoration:none; color:black" href="profile_details.php<?php echo '?student_id='.$student_id;?>">
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

					<div class="card-body">
						<a style="padding: 5px 45px" class="btn btn-primary" href="accept_requests.php<?php echo '?student_id='.$student_id;?>">Accept</a>
						<a style="margin-left:30px; padding: 5px 45px" class="btn btn-danger" href="reject_requests.php<?php echo '?student_id='.$student_id?>">Reject</a>
					</div>

				</div>
			</div>
			<br>
			<?php }?>
		</div>
	</div>
</div>



</body>
</html>
<?php  }?>