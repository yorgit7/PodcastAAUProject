<?php include 'config/db.php'; ?>


<section class="home">
    <div class="home-left">
        <?php include 'sidebar.php' ?>
    </div>
    <div class="home-right">

        <div class="feed">
            <div class="accounts">

                <?php
                $userid = $_COOKIE['user_id'];
                $query = "SELECT * FROM user_relationship as ur JOIN users as u ON ur.follower_id = u.id WHERE following_id = $userid";

                $posts = mysqli_query($connection, $query);
                ?>

                <?php foreach ($posts as $row) {
                    $username = $row['username'];
                    $email = $row['email'];
                    // $audioURL = $row['audio_url'];
                    // $coverImage = $row['cover_image'];
                    // $title = $row['title'];
                    // $description = $row['description'];

                    // // Display the audio post card
                    echo '<div class="audio-card">';
                    // // echo '<img src="' . $coverImage . '" alt="Cover Image">';
                    // echo "<div style='background:#0d2a4b; display:flex; justify-content:space-between;'>";
                    echo '<h1>' . $username. '</h1>';
                     echo    '<p>' . $email. '</p>';
                    // echo '</div>';
                    echo '</div>';
                } ?>

            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php' ?>