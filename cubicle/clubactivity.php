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
		<link rel="stylesheet" href="css/home.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
					<li><a href="clubactivity.php" ><label style="color:wheat">Club Activity</label></a></li>
					<li><a href="services/logout.php" title="Log out"><button class="btn-signout" value="Log out">Log out</button></a></li>
				</div>
				
			</ul>
		</div>
	</div>
	<div class="container-fluid gedf-wrapper">
	<div class="row justify-content-center">
	<div style="margin-top: 10px;" class="col-md-5">
	<?php 
			include('services/connection.php');
			$query = mysqli_query($con, "SELECT * FROM `club_details` ORDER BY club_id, club_name DESC ");

			while($row_club = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$club_profile_picture = $row_club['profile_picture'];
				$club_name = $row_club['club_name'];
				$club_mission = $row_club['mission'];
				$club_id = $row_club['club_id'];	
		?>
		

		
		
				<div class="card mb-3 text-center">
					<img style="width: 180px; heigth:150px; margin:auto; margin-top: 10px;" class=" text-center" src="<?php echo 'admin/'.$club_profile_picture?>" alt="">
					<div class="card-body ">
						<h4 style="font-weight:bold"><?php echo $club_name?></h4>
						<p class="card-text"><?php echo $club_mission?></p>
						
					</div>
					<a  style="text-decoration:none; margin-bottom: 10px" href="club_details.php<?php echo '?club_id='.$club_id;?>">See more details of <?php echo $club_name?></a>
				</div>
			
				<?php }?>
			</div>
			

		</div>
		
	</div>

	

		

</body>

</html>

<?php }?>