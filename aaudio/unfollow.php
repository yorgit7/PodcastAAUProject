<?php
include 'config/db.php';

$followinguser = $_COOKIE['user_id'];
$followeruser = $_GET['id'];
    echo $followeruser . $followinguser;
if(isset($followinguser)){
    $query = "DELETE FROM user_relationship where follower_id = $followinguser and following_id = $followeruser";
    $result = mysqli_query($connection, $query);
}
header("Location: following.php");
?>