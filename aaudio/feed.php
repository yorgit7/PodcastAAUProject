<?php include 'config/db.php'; ?>




<section class="home">
    <div class="home-left">
        <?php include 'sidebar.php' ?>
    </div>
    <div class="home-right">
        <!-- SEARCH -->
        <form method="GET" action="searchuser.php" class="search_form">
            <input type="text" name="search" placeholder="Enter a username" class="input-search">
            <button type="submit" name="submit" class="btn btn-secondary">Search</button>
        </form>


        <div class="feed">
            <div class="accounts">

                <?php
                $userid = $_COOKIE['user_id'];
                $query = "SELECT * FROM user_relationship as ur JOIN audio as a ON ur.following_id = a.user_id WHERE follower_id=$userid";

                $posts = mysqli_query($connection, $query);
                
                ?>

                <?php foreach ($posts as $row) {
                    $id = $row['id'];
                    $audioURL = $row['audio_url'];
                    $coverImage = $row['cover_image'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $likeCount = $row['like_count'];
                    $array = explode(",", $likeCount);
                    $array = array_map('intval', $array);
                    $array = array_filter($array);

                    $like = sizeof($array);
            

                    // Display the audio post card
                    echo '<div class="audio-card">';
                    // echo '<img src="' . $coverImage . '" alt="Cover Image">';
                    echo "<div style='background:#0d2a4b; display:flex; justify-content:space-between;'>";
                    echo    '<h2>' . $title . '</h2>';
                    echo '</div>';
                    echo '<p>' . $description . '</p>';
                    echo '<audio controls>';
                    echo '<source src="' . $audioURL . '" type="audio/mpeg">';
                    echo 'Your browser does not support the audio tag.';
                    echo '</audio>';
                    echo 
                    "
                    <div style='background-color:#0d2a4b; display:flex; align-items:center;'>
                    <a style='margin-right:5px; background-color:red; red; text-decoration:none; padding:5px; color:white;  width:10%; text-align:center; border-radius:10px;' href='/aaudio/like.php?id=$id'>Like</a>
                    <p>$like</p>
                     </div>";
                    echo '</div>';
                } ?>

            </div>
        </div>
    </div>
</section>
<?php include 'includes/footer.php' ?>