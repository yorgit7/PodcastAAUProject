<?php include 'config/db.php';?>


<?php

if(!isset($_COOKIE['user_id'])){
    header("Location: login.php");
}
?>
<?php 
  $titleError = $audioError = '';
  $title = '';
  if(isset($_POST['submit']) && isset($_FILES['audio']) && $_FILES['audio']['error'] === 0){
      $description = $_POST['description'];
      if(empty($_POST['title'])){
          $titleError = "Title can not be empty!";
        }else{
        $title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_SPECIAL_CHARS);
      }

      if(empty($titleError)){
        $audio = $_FILES['audio'];

        // Validate file type (accept only audio)
        $allowedTypes = ['audio/mpeg', 'audio/wav', 'audio/ogg']; // Add more allowed audio MIME types if needed
        if (!in_array($audio['type'], $allowedTypes)) {
            $audioError =  'Invalid file type. Only audio files are allowed.';
        }
        // Validate file size (e.g., limit to 10MB)
        $maxSize = 100 * 1024 * 1024; // 10MB in bytes
        if ($audio['size'] > $maxSize) {
            echo 'File size exceeds the limit of 10MB.';
        }

        // Generate a unique filename for the audio file
        $filename = uniqid('audio_') . '.' . pathinfo($audio['name'], PATHINFO_EXTENSION);


        // Move the uploaded file to the desired location
        $destination = 'audio_uploads/' . $filename;
        if (!move_uploaded_file($audio['tmp_name'], $destination)) {
            echo 'Failed to move the uploaded file.';
        }
        
        // Create a new audio instance in the db
        $user_id= $_COOKIE['user_id'];
        $currentDateTime = date('Y-m-d H:i:s');        
        $add_audio_query = "INSERT INTO audio (title, description, upload_date, user_id, audio_url) values ('$title','$description','$currentDateTime','$user_id','$destination')";
        $new_post = mysqli_query($connection, $add_audio_query);
        // if($new_post){
        //     echo "post added to db";
        // }
        }
         else {
            $audioError='Error uploading the file.';
        }
  }
?>

<!-- Fetch all audio posts -->
<?php
    $user_id = $_COOKIE["user_id"];
    $get_all_posts_query = "SELECT * FROM audio where user_id=$user_id";
    $posts = mysqli_query($connection, $get_all_posts_query);
?>

<section class="home">

    <div class="home-left">
        <?php include 'sidebar.php'?>
    </div>

    <div class="home-right">
        <h2 class="title-big">Share Podcast</h2>
       <form class="share-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data" method="POST">
            <input type="text" placeholder="Post Title"  name="title" value="<?php echo isset($_POST['title']) && (!empty($titleError) || !empty($audioError)) ? htmlspecialchars($_POST['title']) : ''; ?>" required >
            <div style="background-color: inherit; color:red;">
            <?php echo $titleError ?>
            </div>
      <!-- <div class="form-group"> -->
            <textarea rows="5" cols="46" name="description" value="<?php echo isset($_POST['description']) && (!empty($titleError) || !empty($audioError)) ? htmlspecialchars($_POST['description']) : ''; ?>" required>Write a little about this podcast...</textarea>
            <!-- <div style="background-color: inherit; color:red;">
            </div> -->
      <!-- </div> -->
            <div></div>
            <input type="file" placeholder="Post Title"  name="audio" accept="audio/*" required>
            <div style="background-color: inherit; color:red;">
            <?php echo $audioError ?>
            </div>
         <button type="submit" name="submit" class="btn btn-secondary">Post</button>
       </form>

       <?php
       foreach ($posts as $row){
        $id = $row['id'];
        $audioURL = $row['audio_url'];
        $coverImage = $row['cover_image'];
        $title = $row['title'];
        $description = $row['description'];
        
        // Display the audio post card
        echo '<div class="audio-card">';
        // echo '<img src="' . $coverImage . '" alt="Cover Image">';
        echo "<div style='background:#0d2a4b; display:flex; justify-content:space-between;'>";
        echo    '<h2>' . $title . '</h2>';
        echo    "<a href='/aaudio/deletePost.php?id=$id' style='color:white; padding:8px; background:red; border-radius:8px;'> Delete </a>";
        echo '</div>';
        echo '<p>' . $description . '</p>';
        echo '<audio controls>';
        echo '<source src="' . $audioURL . '" type="audio/mpeg">';
        echo 'Your browser does not support the audio tag.';
        echo '</audio>';
        echo '</div>';
       }
       ?>
    </div>
</section>

<?php include 'includes/footer.php'?>
