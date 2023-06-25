<?php include 'config/db.php'; ?>

<?php
    $userId = $_COOKIE['user_id'];
    $usernameError = $passwordError = '';
    if(isset($_POST['submit'])){
        if(empty($_POST['username'])){
            $usernameError = "Username can not be empty!";
          }else{
            $newusername = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
          }

          if(empty($_POST['password'])){
            $passwordError = "Password can not be empty!";
          }else{
            $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        }
        $newfirstname = $_POST["firstname"];
        $newlastname = $_POST["lastname"];
        
        $update_user_query = "update users set username = '$newusername', password='$hashed_password',firstname='$newfirstname', lastname = '$newlastname' where id = $userId";
        $update_user = mysqli_query($connection,$update_user_query);
        header("Location: feed.php");
    }
?>

<section class="home">
    <div class="home-left">
        <?php include 'sidebar.php' ?>
    </div>
    <div class="home-right">

    <form class="auth-form" style="width: 40%; margin-top: auto; margin-bottom: auto;" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
      <h2>Update user credential</h2>
      <input type="text" placeholder="New First Name"  name="firstname" value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : ''; ?>" required>
        <input type="text" placeholder="New Last Name"  name="lastname" value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : ''; ?>" required>
        <input type="text" placeholder="new username" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required>
        <div style="background-color: inherit; color:red;">
        <?php echo $usernameError ?>  
        <input type="password" style="width:100%" placeholder="new Password" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" required>
        <div style="background-color: inherit; color:red;">
        <?php echo $passwordError ?>  
        </div>
    </div>
      <button type="submit" class="btn btn-primary" name="submit">Update</button>
     </form>
        </div>
    </div>
</section>

<?php include 'includes/footer.php' ?>