<?php require 'config.inc.php';
$filename = $sql->real_escape_string($_GET['id']);
$ok = $sql->query("SELECT * FROM video WHERE id='$filename'");
$video = mysqli_fetch_assoc($ok);
$filename = $video['mp4'];
$userid = $_SESSION['id']; 
?>
<?php 
if(file_exists("./vi/videos/".$filename."")) {
	header("Location: ".$site_cdn."/videos/".$filename.""); 
} else{
	header("Location: ".$site_cdn."/videos/".$filename.""); 
}?>
<?php
	if(isset($_SESSION['viewkey']) && $_GET['key'] == $_SESSION['viewkey']) {
		$videoid = $video['id'];
		$newviews = $video['views'] + 1; 
		$sql->query("UPDATE `video` SET `views` = '$newviews' WHERE id = '$videoid';");
		$sql->query("UPDATE `users` SET `vidswatched` = vidswatched+1 WHERE id = $userid;");
    }
   unset($_SESSION['viewkey']); ?>
