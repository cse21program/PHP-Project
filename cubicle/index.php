<?php
session_start();
if(isset($_SESSION['id'])) {
	header('location: home.php');
} else {

?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cubicle</title>
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
	<div class="topnav">
	  <a class="active" href="home.php">Cubicle</a>
	  
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
			<h2 style="color: white">Registration with Cubicle</h2>
				<form method="POST" action="signup_form.php"  enctype="multipart/form-data">
				<div class="group-item-name">
					<input type="text" name="firstname" placeholder="Firstname" required>
					<input type="text" name="lastname" placeholder="Lastname" required>
				</div>
				<div class="singal-item-email">
					<input type="email" name="email" placeholder="Enter your email..." required>
				</div>
				<div class="singal-item-id">
					<input type="number" name="student_id" placeholder="Enter your id..." required>
				</div>

				<div class="singal-item-id">
					<input type="number" name="student_phone" placeholder="Enter your phone number..." required>
				</div>
	
				<div class="group-item-password">
					<input type="password" name="pass" placeholder="Enter your password..." required>
					<input type="password" name="pass2" placeholder="repeat your password..." required>
				</div>
				<div class="group-item-department">
					<label style="color:white">Department:</label>
					<select name="department" required>
							<option>Department of Business Administration</option>
							<option>Department of CSE</option>
							<option>Department of English</option>
							<option>Department of Architecture</option>
							<option>Department of Law</option>
							<option>Department of Civil Engineering</option>
							<option>Department of EEE</option>
							<option>Department of Islamic Studies</option>
							<option>Department of Public Health</option>
							<option>Department of THM</option>
							<option>November</option>
							<option>December</option>
						</select>
					
			</div>
	
			<div class="singal-item-batch">
					
				<input type="text" name="batch" placeholder="Enter your batch..." required>
					
			</div>
	
			<div class="group-item-gender">
				<label style="color:white">Male</label><input type="radio" check="checked" name="gender" value="male" required  selected/>
				<label style="color:white">Female</label><input type="radio" name="gender" value="female" required />		
				<label style="color:white">Others</label><input type="radio" name="gender" value="others" required />		
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

