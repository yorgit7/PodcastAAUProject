<?php include 'config/db.php';?>

<?php 
    $post_id = $_GET["id"];
    $user_id = $_COOKIE["user_id"];
    $findPost = mysqli_query($connection,"select * from audio where id = $post_id");
    $post = mysqli_fetch_assoc($findPost);
    if(mysqli_num_rows($findPost) >= 1){
        $likeCount = $post['like_count'];
        $likeCount = trim($likeCount);
        $array = explode(",", $likeCount);
        $array = array_map('intval', $array);
        $array = array_filter($array);

        if (in_array(intval($user_id), $array)) {
            // Remove the post_id from the array
            $array = array_diff($array, array(intval($user_id)));
        } else {
            // Append the post_id to the array
            $array[] = $user_id;
        }
        $array = array_map('intval', $array);
        $result = implode(",", $array) . ",";

        $like_post = mysqli_query($connection, "update audio set like_count = '$result' where id = $post_id");

    }
    else{
        echo "bo here";
        $like_post = mysqli_query($connection, "update audio set like_count = '1,' where id = $post_id");
    }

    header("Location: feed.php");
?>