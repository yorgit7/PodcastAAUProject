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
                $query = "SELECT * FROM user_relationship as ur JOIN users as u ON ur.following_id = u.id WHERE follower_id=$userid";

                $posts = mysqli_query($connection, $query);
                ?>

                <?php foreach ($posts as $row) {
                    $username = $row['username'];
                    $id = $row['id'];
                    $email = $row['email'];
                    echo "<div style='display:flex; align-items:center; justify-content:space-between; width:50%;
                    padding: 1rem;
                    border-radius: 2rem;
                    margin-top: 2rem;
                    color: white;
                    background-color: #0d2a4b;'
                    >";
                    echo "<div style='background-color:#0d2a4b;'>";
                    echo "<h1 style='margin-bottom:1rem;'> $username</h1>";
                    echo    "<p style='background-color: #0d2a4b;'>  $email </p>";
                    echo '</div>';
                    echo "<a class='btn btn-primary' href='/aaudio/unfollow.php?id=$id'>Unfollow</a>";
                    echo '</div>';
                } ?>

            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php' ?>