<?php
session_start();
if(!isset($_SESSION['club_id'])) {
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
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 80%;
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

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




.inbox_chat { height: 550px; overflow-y: scroll;}



.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 100%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}


 
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
          <li><a href="profile.php"><label >Profile</label></a></li>
          <li><a href="chat.php"><label style="color:wheat">Chat</label></a></li>
          <li><a href="requests.php" ><label>Requests</label></a></li>
          <li><a href="members.php" ><label>Members</label></a></li>
          <li><a href="services/logout.php" title="Log out"><button class="btn-signout" value="Log out">Log out</button></a></li>

				</div>
				
			</ul>
		</div>
	</div>

	<div class="container" style="margin-top:10px">
<div class="messaging">

      <div class="inbox_msg">
        <div class="mesgs">
          <div class="msg_history">
          <?php 
           include('services/connection.php');
           session_start();
           $id = $_SESSION['club_id'];
           $student_id = $_GET['student_id'];


           $query = mysqli_query($con , "SELECT * FROM chats WHERE (sender_id = '$id' AND receiver_id = '$student_id') OR (sender_id = '$student_id' AND receiver_id = '$id')");
           while($f_row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
             $sender_id = $f_row['sender_id'];
             $receiver_id = $f_row['receiver_id'];
             $message_content = $f_row['message_content'];
             $message_date =  $f_row['message_date'];
             $receiver = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM students WHERE id='$student_id'"), MYSQLI_ASSOC);
             $receiver_profile_picture = $receiver['profile_picture'];
             if($id == $sender_id AND  $student_id == $receiver_id) {

          
          ?>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p><?php echo $message_content?></p>
                <span class="time_date"> <?php echo $message_date?></span> </div>
            </div>
            <?php } else{?>

            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="<?php echo '../'.$receiver_profile_picture;?>" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p><?php echo $message_content?></p>
                  <span class="time_date"><?php echo $message_date?></span></div>
              </div>
            </div>
            <br>
            <?php } }?>


          </div>
          <div class="type_msg">
            <div class="input_msg_write">
            <?php $club_id = $_GET['club_id'];?>
            <form method="POST" action="chat_form.php">
              <input type="text" name="message_content" class="write_msg" placeholder="Type a message" />
              <input type="hidden" name="student_id" value="<?php echo $student_id;?>"/>
              <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </form>    
            </div>
          </div>
        </div>
        
      </div>
      
      
    </div>
  
  </div>

  </div>
		

</body>

</html>

<?php }?>