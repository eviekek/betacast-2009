<?php ini_set('display_errors', 1);
	  require ('config.inc.php');
	  $loggedinusername = $_SESSION['username'];
    $name = $sql->real_escape_string($_SESSION['username']); 
    $ok = $sql->query("SELECT * FROM users WHERE username='$name'");
    $loggedu = mysqli_fetch_assoc($ok);
    $loggeduid = $loggedu['id'];
$target_dir = "vi/thumb/";
$target_file = $target_dir . $loggeduid . ".jpg";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The channel picture has been uploaded.";
    ?><br><img id='' width='100px' src='<?= $site_cdn  ?>/thumb/<?= $loggeduid ?>.jpg?1' alt=''><?php
    $sql->query("UPDATE users SET channelicon='$loggeduid' WHERE username='$name'");
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?><br>
<a href="/account">Back</a>
