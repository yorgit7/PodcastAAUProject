<?php include 'config/db.php';?>

<?php 
    $deleted_id = $_GET["id"];
    $delete_post_query = "delete from audio where id = $deleted_id";
    $new_post = mysqli_query($connection,$delete_post_query);

    header("Location: post.php");
?>