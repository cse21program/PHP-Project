<?php
session_start();
if(isset($_SESSION['club_id'])) {
	header('location: home.php');
} else {

?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin</title>
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
	<div class="topnav">
	  <a class="active" href="home.php">Admin</a>
	  
	  <div class="login-container">
		<form method="POST" action="signin_form.php">
		  <input id="email" type="email" placeholder="Email" name="email">
		  <input id="pass" type="password" placeholder="Password" name="password">
		  <button type="submit" name = 'submit'>Login</button>
		</form>
	  </div>
	</div>
	
	<div class="container">
		<div class="container-content">
			<p class="main-theme">Cubicle is Web Application that will act as a booth for the Leading University students and give a place to start where student can register any club and event easily and will get all update from the desire club.</p>
			<h3>Features</h3>
			<div class="features">
				<p>Club registration</p>
				<p>Event registration</p>
				<p>Post update from club</p>
				<p>News Feed</p>
				<p>Like And Comment</p>
				<p>Settings</p>
				<p>Chating</p>
				<p>Chat data encrypt end to end</p>
			</div>
			
		</div>
			<div class="signup_form">
			<h2>Register Club with Cubicle</h2>
				<form method="POST" action="signup_form.php"  enctype="multipart/form-data">
				<div class="singal-item-name">
					<input type="text" name="name" placeholder="Enter club name..." required>
				</div>
				<div class="singal-item-email">
					<input type="email" name="email" placeholder="Enter your email..." required>
				</div>

				<div class="singal-item-mission">
					<textarea name="mission" cols="30" rows="10" placeholder="Write club mission..." required></textarea>
				</div>
				<div class="singal-item-phone">
					<input type="number" name="phone" placeholder="Enter phone number..." required>
				</div>
	
				<div class="group-item-password">
					<input type="password" name="pass" placeholder="Enter your password..." required>
					<input type="password" name="pass2" placeholder="repeat your password..." required>
				</div>
				
	
			<div class="singal-item-website">
					
				<input type="text" name="website" placeholder="Enter club website..." required>
					
			</div>

			<div class="singal-item-founded">
					
				<input type="text" name="founded" placeholder="Enter when club founded..." required>
					
			</div>
			
	
			<div class="group-item-btn" style="cursor:pointer">
				
				<input type="submit"  style="cursor:pointer" value="Register Here" name="submit">
				
			</div>
	
			</form>
				
	
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

