<?php include 'config/db.php';
if (isset($_GET['submit']) ) {
    $search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT * FROM users WHERE username LIKE '%$search%' ";
    $users = mysqli_query($connection, $query);
} else {
    header('location: ' . 'feed.php');
} ?>
<section class="home">
    <div class="home-left">
        <?php include 'sidebar.php' ?>
    </div>
    <div class="home-right">
    <form method="GET" action="searchuser.php" class="search_form">
            <input type="text" name="search" placeholder="Enter a username" class="input-search">
            <button type="submit" name="submit" class="btn btn-secondary">Search</button>
        </form>

    <?php if (mysqli_num_rows($users)>0) : ?>
        <div class="search">
            <div style="display: flex; gap:2rem; flex-wrap: wrap;  background-color:#07172b; margin:2rem; border-radius: 10px;">
                <?php while($user = mysqli_fetch_assoc($users)) : ?>
                <div class="account" >
                    <h2 style="text-transform: uppercase; margin-bottom:1rem;"><?=$user['firstname']?>  <?=$user['lastname']?> </h2>
                    <a class="btn btn-secondary" href="/aaudio/follow.php?id=<?=$user['id']?>">Follow</a>
                </div>
                <?php endwhile?>
            </div>
        </div>
    <?php endif?>
    </div>
</section>
<?php include 'includes/footer.php' ?>