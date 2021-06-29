<?php
session_start();
if(!isset($_SESSION['club_id'])) {
	header('location: index.php');
} else {
	include('services/connection.php');

    $current_user_id = $_SESSION['club_id'];
    $query2 = "SELECT * FROM `club_details` WHERE club_id='$current_user_id'";
    $current_user_info = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_array($current_user_info, MYSQLI_ASSOC);
    $current_user_name = $row2['club_name'];
    $current_user_profile_picture = $row2['profile_picture'];
    $post_id = $_POST['post_id'];

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
						<li><a href="home.php" ><label style="color:wheat">Home</label></a></li>
						<li><a href="profile.php"><label>Profile</label></a></li>
						<li><a href="chat.php"><label>Chat</label></a></li>
						<li><a href="requests.php"><label>Requests</label></a></li>
						<li><a href="members.php"><label>Members</label></a></li>
						<li><a href="services/logout.php" title="Log out"><button class="btn-signout" value="Log out">Log out</button></a></li>
				</div>
				
			</ul>
		</div>
</div>

<div class="container-fluid gedf-wrapper">
	<div class="row " style="border-top: 1px solid white; padding: 10px">
	<div class="col-md-4">

	
	</div>
<div class="col-md-6 gedf-main ">

<?php 
	include('services/connection.php');
	include('functions.php');
		$id = $_SESSION['club_id'];
		$query = mysqli_query($con, "SELECT * FROM post LEFT JOIN club_details ON club_details.club_id = post.club_id ORDER BY post_id DESC");
		while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			$location = $row['post_image'];
			$profile_picture = $row['profile_picture'];
			$content = $row['content'];
			$time = $row['time'];
			$post_id = $row['post_id'];
			$current_post_id  = $post_id;
			$clubName = $row['club_name'];
?>
<div class="card gedf-card">
	<div class="card-header">
		<div class="d-flex justify-content-between align-items-center">
			<div class="d-flex justify-content-between align-items-center">
				<div class="mr-2">
					<img class="rounded-circle" width="45" src="<?php echo $profile_picture?>" alt="">
				</div>
				<div style="margin-left: 10px" class="ml-2">
					<div class="h6 m-0"><?php echo $clubName?></div>
				</div>
			</div>
			
		</div>

	</div>
	<div class="justify-content-center card-body">
		<div style="font-size: 13px" class="text-muted h7 mb-2"> <i class="fa fa-clock-o" style="margin-right: 10px"></i><?php echo $time = time_stamp($time);?></div>

		<p class="card-text">
			<?php echo $content?>
		</p>

		<img width=90% height=350px style=" display: block;margin-left: auto;margin-right: auto;" src="<?php echo $location?>" alt="">
	</div>
	<div class="card-footer text-center ">
	<?php
	session_start();
		$id = $_SESSION['club_id'];
		$like = mysqli_query($con, "SELECT * FROM post_like WHERE id = '$id' and post_id = '$post_id'");
		$count_like = mysqli_query($con, "SELECT * FROM post_like WHERE post_id = '$post_id'");
		$total_comment = mysqli_num_rows(mysqli_query($con, "SELECT * FROM post_comments WHERE post_id = '$post_id'"));
			$like_position = mysqli_fetch_array($like, MYSQLI_ASSOC);
			$position = $like_position['position'];
			$total_like = mysqli_num_rows($count_like);
			

			if($position == "Liked") {
			?>
			<a href="delete_like.php<?php echo '?post_id='.$post_id;?>" style="text-decoration:none" class="card-link"><i class="fa fa-thumbs-up"></i><?php echo " <b>". $total_like." ". $position."</b>";  ?></a>
			<?php } else {


			?>
			<a href="post_like.php<?php echo '?post_id='.$post_id;?>" style="text-decoration:none" class="card-link"><i class="far fa-thumbs-up"></i><?php echo ($total_like > 0 ? " $total_like Like"  :  " Like");  ?></a>

			<?php } ?>
			<a href="#" style="text-decoration:none" class="card-link"><i class="far fa-comment"></i><?php echo ($total_comment > 0 ? " $total_comment Comments " : " Comment")?></a>
			<a href="#" style="text-decoration:none" class="card-link"><i class="fas fa-share-alt"></i> Share</a>
	</div>

            <div class="col-sm-12">          	
                    <div class="row" >
                                <div style="margin-left: 10px" class="text-center col-sm-3 col-lg-1 ">
                                	<img class="rounded-circle" width = "40" src="<?php echo $current_user_profile_picture ?>" alt="">
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
							<img width="40" class="rounded-circle" src="<?php echo '../'.$c_profile_picture?>" alt="...">
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
<br>
<br>
<!-- Post /////-->
<?php } ?>

</div>

</body>

</html>

<?php }?>