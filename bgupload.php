<?php ini_set('display_errors', 1);
	  require ('config.inc.php');
	  $loggedinusername = $_SESSION['username'];
    $name = $sql->real_escape_string($_SESSION['username']); 
    $ok = $sql->query("SELECT * FROM users WHERE username='$name'");
    $loggedu = mysqli_fetch_assoc($ok);
$target_dir = "vi/bg/";
$target_file = $target_dir . $loggedinusername . ".jpg";
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
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The background has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?><br>
<a href="/account">Back</a>
