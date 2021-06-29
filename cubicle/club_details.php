<?php
session_start();
include('services/connection.php');
include('functions.php');
if(!isset($_SESSION['id'])) {
	header('location: index.php');
} else {
	$club_id = $_GET['club_id'];
	$club_row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM club_details WHERE club_id = '$club_id'"), MYSQLI_ASSOC);
	$club_name = $club_row['club_name'];
	$mission = $club_row['mission'];
	$club_email = $club_row['club_email'];
	$club_phone = $club_row['club_phone'];
	$website = $club_row['website'];
	$founded = $club_row['founded'];
	$club_profile_picture = $club_row['profile_picture'];
	$club_cover_picture = $club_row['cover_picture'];
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Cubicle</title>
		<link rel="stylesheet" href="css/club_details.css">
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
					<li><a href="clubactivity.php" ><label>Club Activity</label></a></li>
					<li><a href="services/logout.php" title="Log out"><button class="btn-signout" value="Log out">Log out</button></a></li>
				</div>
				
			</ul>
		</div>
	</div>
	<div class="container-fluid gedf-wrapper">
	<div class="row">
	<div class="col-md-12 container justify-content-center">
			<div id="clip2">
				<a href="#"><img title="Change Cover Photo" class="img-fluid mx-auto" src="<?php echo 'admin/'.$club_cover_picture ?>"></a>
			</div>		
			<div id="left-nav">
				<div class="clip1">
					<a href="#" ><img title="Change Profile Picture" src="<?php echo 'admin/'.$club_profile_picture ?>"></a>
				</div>
					<div class="user-details">
						<label><?php echo $club_name?></label>		
					</div>
				</div>
			</div>	
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<div class="h5">Club Information</div>
					<table>
				<tr>
					<td><b>Name:</b></td>
					<td width="20"></td>
					<td style="font-size: 15px"><?php echo $club_name ?></td>
				</tr>
				<tr>
					<td><b>Mission:</b></td>
					<td width="20"></td>
					<td style="font-size: 15px"><?php echo $mission ?></td>
				</tr>
				<tr>
					<td><b>Phone:</b></td>
					<td width="20"></td>
					<td style="font-size: 15px"><?php echo $club_phone; ?></td>
				</tr>
				<tr>
					<td><b>Email:</b></td>
					<td width="20"></td>
					<td style="font-size: 15px"><?php echo $club_email ?></td>
				</tr>

        		<tr>
					<td><b>Website:</b></td>
					<td width="20"></td>
					<td style="font-size: 15px"><?php echo $website ?></td>
				</tr>

       		 	<tr>
					<td><b>Founded:</b></td>
					<td width="20"></td>
					<td style="font-size: 15px"><?php echo $founded ?></td>
				</tr>
				<tr>
			</table>
				</div>
			</div>
		</div>


		<div class="col-md-7 gedf-main">
		<?php 
			$id = $_SESSION['id'];
			$request_row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM membership_requests WHERE student_id = '$id' and club_id = '$club_id'"), MYSQLI_ASSOC);
			$member_row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM club_members WHERE student_id = '$id' and club_id = '$club_id'"), MYSQLI_ASSOC);
			$member_status = $member_row['status'];

			$request_position = $request_row['request_type'];

		if($request_position == 'received') {	
		
		?>
			<div class="card">
				<div class="card-body">
					<a class="btn btn-primary" href="cancel_request.php<?php echo '?club_id='.$club_id;?>">Cancel request</a>
					<a style="margin-left: 30px" class="btn btn-primary" onclick="alert('Message only allow for Member. Please be member')" href="#">Message</a>
				</div>
			</div>
		<br>
		<?php } elseif($member_status == "member") {?>

		<div class="card">
			<div class="card-body">
				<a class="btn btn-primary" href="#">Member</a>
				<a style="margin-left: 30px" class="btn btn-primary" href="chatbox.php<?php echo '?club_id='.$club_id; ?>">Message</a>
			</div>
		</div>
		<br>
		<?php } else {?>
			<div class="card">
			<div class="card-body">
				<a class="btn btn-primary" href="membership_request.php<?php echo '?club_id='.$club_id;?>">Request for membership</a>
				<a style="margin-left: 30px" class="btn btn-primary" onclick="alert('Message only allow for Member. Please be member')" href="#">Message</a>
			</div>
			</div>
			<br>

		<?php } ?>

		<?php 
			//include('services/connection.php');
			//include('functions.php');
			//$club_id = $_GET['club_id'];
			$query = mysqli_query($con, "SELECT * FROM post WHERE club_id = '$club_id' ORDER BY post_id DESC");
			while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$location = $row['post_image'];
				$content = $row['content'];
				$time = $row['time'];
				$post_id = $row['post_id'];
		?>

<div class="card gedf-card">
	<div class="card-header">
		<div class="d-flex justify-content-between align-items-center">
			<div class="d-flex justify-content-between align-items-center">
				<div class="mr-2">
					<img class="rounded-circle" width="45" src="<?php echo $club_profile_picture;?>" alt="">
				</div>
				<div style="margin-left: 15px" class="ml-2">
					<div class="h7 m-0"><?php echo $club_name;?></div>
				</div>
			</div>
		</div>

	</div>
	<div class="justify-content-center card-body">
		<div style="font-size: 13px" class="text-muted h7 mb-2"> <i class="fa fa-clock-o" style="margin-right: 10px"></i><?php echo $time = time_stamp($time);?></div>

		<p class="card-text">
			<?php echo $content?>
		</p>

		<img  style=" display: block;margin-left: auto;margin-right: auto; width: 90%;" src="<?php echo "admin/".$location?>" alt="">
	</div>

	<div class="card-footer text-center">
	<?php 
		$like = mysqli_query($con, "SELECT * FROM post_like WHERE id = '$id' and post_id = '$post_id'");
		$count_like = mysqli_query($con, "SELECT * FROM post_like WHERE  post_id = '$post_id'");
		$like_position = mysqli_fetch_array($like, MYSQLI_ASSOC);
		$position = $like_position['position'];
		$total_like = mysqli_num_rows($count_like);
		$total_comment = mysqli_num_rows(mysqli_query($con, "SELECT * FROM post_comments WHERE post_id = '$post_id'"));

		if($position == "Liked") {
		?>
		<a href="delete_like.php<?php echo '?post_id='.$post_id;?>" style="text-decoration:none" class="card-link"><i class="fa fa-thumbs-up"></i><?php echo "<b> ". $total_like." ". $position."</b>";  ?></a>
		<?php } else {


		?>
		<a href="post_like.php<?php echo '?post_id='.$post_id;?>" style="text-decoration:none" class="card-link"><i class="far fa-thumbs-up"></i><?php  echo ($total_like > 0 ? " $total_like Like"  :  " Like");  ?></a>

		<?php } ?>
		<a href="#" style="text-decoration:none" class="card-link"><i class="far fa-comment"></i><?php echo ($total_comment > 0 ? " $total_comment Comments " : " Comment")?></a>
		<a href="#" style="text-decoration:none" class="card-link"><i class="fa fa-share-alt"></i> Share</a>
	</div>

	<div class="col-sm-12">
	<div class="row" >
           <div style="margin-left: 10px" class="text-center col-sm-3 col-lg-1 ">
                <img class="rounded-circle" width = "40" src="<?php echo $club_profile_picture ?>" alt="">
            </div>
                    <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                     	<form method="POST" action="post_comment.php">
                            <div class="mb-3">
                            <textarea name="comment_content" class="form-control" placeholder="Enter your comment..." rows="4"></textarea>
                            <input name="post_comment" type="submit" class="btn btn-primary" value="comment">
							<input type="hidden" name="post_id" value="<?php echo $post_id;?>">
                        	</div>
                        </form>
                                
                    </div>
     	</div>

		 <?php 
	include('services/connection.php');
	$comment = mysqli_query($con, "SELECT * FROM post_comments WHERE post_id = '$post_id' ORDER BY post_id DESC");
	while($comment_row = mysqli_fetch_array($comment, MYSQLI_ASSOC)) {
		$comment_id = $comment_row['comment_id'];
		$c_content_comment = $comment_row['comment_content'];
		$time = $comment_row['time'];
		$c_post_id = $comment_row['post_id'];
		$c_profile_picture = $comment_row['profile_picture'];
		$c_name = $comment_row['name'];
	?>
	                <div class="card mb-3 " style="width: 350px; height: 130px; margin:auto">
                    <div class="row g-0">
						<div class="col-md-1" style="margin-top:10px; margin-left:10px">
							<img width="40" class="rounded-circle" src="<?php echo $c_profile_picture?>" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<p style="font-size: 13px" class="card-title"><?php echo $c_name ?></p>
								<p class="card-text"><?php echo  $c_content_comment?></p>
								<p style="font-size: 13px" class="card-text"><small class="text-muted"><?php echo time_stamp($time)?></small></p>
							</div>
						</div>
                 	</div>
                </div>
         
<?php }?>
</div>
		
</div>
<?php }?>


</div>
</div>
</body>

</html>

<?php }?>