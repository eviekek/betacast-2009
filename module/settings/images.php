<?php
$loggeduser = $_SESSION['username'];
// Channel Icon
if(!empty($_POST['icon'])) {
	$name = $sql->real_escape_string($_POST['icon']); 
	$ok = $sql->query("SELECT * FROM video WHERE id='$name'"); 
	$tosetchannelicon = mysqli_fetch_assoc($ok);
	if($tosetchannelicon['author'] !== $loggedu['username']) { 
		$updaterr = 'Your channel icon must be your video!'; 
	} else{ 
		$newicon = $tosetchannelicon['thumb']; 
		$sql->query("UPDATE `users` SET `channelicon` = '$newicon' WHERE `users`.`username` = '$loggeduser';"); 
		$loggedu['channelicon'] = $newicon; 
		$updateyes = true; 
	}  header('Location: /account?m=ps');
}
?>
<form action="/bgupload" method="post" enctype="multipart/form-data">
		<h1><a>Channel Background</a></h1>
		Select background to upload:
	<input type="file" name="fileToUpload" id="fileToUpload">
	<input type="submit" value="Upload Image" name="submit">
</form><br><br>
<!-- old channel pic update form 
<form action="" method="post" enctype="multipart/form-data">
		<h1><a>Channel Picture</a></h1>
		<?php $name = $sql->real_escape_string($loggedu['channelicon']); $ok = $sql->query("SELECT * FROM video WHERE thumb='$name'");
		$channelicon = mysqli_fetch_assoc($ok); ?>
		<input name="icon" placeholder="Video ID" <?php if($loggedu['channelicon'] !== 'novideo') { ?>value="<?php echo $channelicon['id'] ?>"<?php } ?>>
		<input type="submit" value="Upload Image" name="submit">
</form>-->
<form action="/pfp_upload" method="post" enctype="multipart/form-data">
		<h1><a>Channel Picture</a></h1>
		Select image to upload:
	<input type="file" name="fileToUpload" id="fileToUpload">
	<input type="submit" value="Upload Image" name="submit">
</form><br><br>
