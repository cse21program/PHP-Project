<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "cubicle";

$con = mysqli_connect(
    $hostname,
    $username,
    $password,
    $dbname
) or 
die (
    "connection was not established"
);

?>