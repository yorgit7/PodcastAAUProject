<?php
include 'config/db.php';

$followinguser = $_COOKIE['user_id'];
$followeruser = $_GET['id'];

if(isset($followinguser)){
    $query = "INSERT INTO user_relationship (follower_id , following_id) values ($followinguser,$followeruser)";
    $result = mysqli_query($connection, $query);
}
header("Location: feed.php");
?>