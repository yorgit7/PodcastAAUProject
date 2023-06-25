
<?php 
    $actions = [
        "feed"=> "/aaudio/feed.php",
        "post" => "/aaudio/post.php",
        "following" => "/aaudio/following.php",
        "followers" => "/aaudio/followers.php",
        "account" => "/aaudio/account.php" 
    ];
    
    // array("feed.php","post.php","following.php","followers.php","account.php");
    $userId = $_COOKIE["user_id"];
    $find_user_query = "SELECT * FROM USERS WHERE id = $userId";
    $result = mysqli_query($connection, $find_user_query);
    $fname=$lname=$username=$email = '';

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $fname = $row["firstname"];
            $lname = $row["lastname"];
            $username = $row["username"];
            $email = $row["email"];
            $nameInitial = substr($fname, 0, 1);
            // echo "ID: " . $row["id"] . ", Name: " . $row["firstname"]  "\n";
        }
    } else {
        echo "No results found.";
    }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css"/>
    <title>Document</title>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar_top">
            <div>
                <?php echo "
                <div class='user_profile'>
                    <div class='profile_pic'>
                    $nameInitial
                    </div>
                    <h1 class='fullname user_details'>$fname $lname<h1>
                    <h1 class='user_details user_email'>$email</h1>
                </div>
                "?>
            </div>
        </div>
        <div class="sidebar_bottom">
           <?php
            foreach($actions as $key => $value){
                echo "
                    <div class='actions'>
                      <a class='action' href=" . $value . ">" . strtoupper($key) . "</a>
                    <div>
                ";
            }
           ?>
        </div>
        <div class="logout">
            <a class="btn btn-primary" href="/aaudio/signout.php">Logout</a>
        </div>
        <div style="background-color: #05101d; display: flex; justify-content: center; align-items: center; margin-top: 1rem; padding: 1rem; color:white; font-weight: 800;"><span style="font-weight: 800; color: red;background-color: #05101d;">AAU</span>DIO</div>
    </aside>
</body>
</html>