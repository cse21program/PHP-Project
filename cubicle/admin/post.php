<?php
	include('services/connection.php');
							
		if (!isset($_FILES['image']['tmp_name'])) {
			echo "";
		}else{
			$file=$_FILES['image']['tmp_name'];
			$image = $_FILES["image"] ["name"];
			$image_name= addslashes($_FILES['image']['name']);
			$size = $_FILES["image"] ["size"];
			$error = $_FILES["image"] ["error"];
			$uniquename = time().uniqid(rand());

			if ($error > 0){
					die("Error uploading file! Code $error.");
			}else{
				if($size > 10000000) {
					die("Format is not allowed or file size is too big!");
				}
										
				else{				    		
				    move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $uniquename . $_FILES["image"]["name"]);		
					$location="upload/" . $uniquename . $_FILES["image"]["name"];
					//move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/" . $uniquename . $_FILES["image"]["name"]);
					session_start();
					$id = $_SESSION['club_id'];
					$content=$_POST['content'];
					$time=time();
					$uuid = uniqid()."-".uniqid();
					$update=mysqli_query($con," INSERT INTO post (post_id, club_id, post_image, content, time) VALUES ('$uuid', '$id','$location','$content','$time') ");

				}
			header('location: profile.php');
									
		}
}
?>