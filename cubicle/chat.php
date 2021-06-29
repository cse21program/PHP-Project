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
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
		<style>
    body {
    font-family: "Muli-Regular";
    margin: 0;
    padding: 0;
    
 }
     
     
 #header {
     background-color: #5D5B6A;
     width:100%;
 }

 #header::after {
     content: "";
     clear: both;
     display: table;
 }
     
 .head-view {
     padding-top: 10px;
     line-height:50px;
 }
     
 .head-view label {
     color: white;
     font-size:20px;
     padding: 5px;
     cursor: pointer;
 }

.pages a{
    padding: 10px;
}
 .head-view  li {
     display: inline;
     color: black;
 }
     
 .head-view  li a {
     text-decoration:none;
     color: #000000;
 }
     
 .head-view label:hover {
     color: wheat
 }
     

 .head-view b {
     color: white;
     text-shadow:3px 3px 3px #000000;
     font-size:50px;
     font-weight: normal;
 }

.btn-signout {
    color:white;
    font-size:19px;
    width:100px;
    padding: 5px;
    border-radius: 10px;
    background-color: #5D5B6A;
    border: none;
}

.btn-signout:hover {
    color:wheat
}
.pages {
    float: right
}

.container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 100%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}




 
 @media only screen and (max-width: 1150px) {
    .head-view .title{
        display: block;
        font-size: 40px;
        text-align: center;
    }
    .head-view b {
        font-size: 50px;
    }

    .head-view label {
        display: inline;
        text-align: center;
        line-height: 10px;

    }
    .btn-signout {
        display: inline;
        text-align: center;
        margin: 0 auto;
    }
   
  

    .pages {
        float: none;
        text-align: center;
    }

   
 }

 
     
     
    
    </style>
	</head>

<body>
	<div id="header">
		<div class="head-view">
			<ul>
				<li class="title"><a href="home.php"><b>Cubicle</b></a></li>
				<div class="pages">
					<li><a href="home.php" ><label >Home</label></a></li>
					<li><a href="profile.php"><label>Profile</label></a></li>
					<li><a href="chat.php" ><label  style="color: wheat">Chat</label></a></li>
					<li><a href="clubactivity.php" ><label>Club Activity</label></a></li>
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
			$current_id = $_SESSION['id'];
			$query = mysqli_query($con, "SELECT * FROM club_members WHERE student_id = '$current_id' ");
			while($row=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

				$club_name = $row['club_name'];
				$club_profile_picture = $row['club_profile_picture'];
				$club_id = $row['club_id'];

       

        if($row3 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM chats WHERE sender_id='$club_id' OR receiver_id = '$club_id' ORDER BY message_id DESC"), MYSQLI_ASSOC)) {
		
		
		?>
			<div class="card gedf-card">
				<div class="card-header justify-content-center" >
				<a style="text-decoration:none; color:black" href="chatbox.php<?php echo '?club_id='.$club_id;?>">
				<div class="d-flex justify-content-between align-items-center">
						<div class="d-flex justify-content-between align-items-center">
							<div class="mr-2" style="margin-left: 10px">
								<img class="rounded-circle" width="90" height="90" src="<?php echo "admin/".$club_profile_picture?>">
							</div>
							<div  style="margin-left: 20px;" class="mr-2 ">
								<div  class="h5 m-0"><?php echo $club_name ?></div>
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

<?php }?>