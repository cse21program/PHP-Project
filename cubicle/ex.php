<?php 
session_start();
include('services/connection.php');
$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM post ORDER BY post_id DESC");
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
    $club_id = $row['club_id'];
    $post_id = $row['post_id'];
    $query2 = mysqli_query($con, "SELECT * FROM club_members WHERE club_id = '$club_id'and student_id ='$id' ");
   while($row2 = mysqli_fetch_array($query2,MYSQLI_ASSOC)) {  
       echo $post_id."<br>";
   }
}
?>
