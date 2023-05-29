<?php $loggedinuserid = $loggeduser['id'];
		  $videoid = $sql->real_escape_string($video['id']); 
	  $name = $sql->real_escape_string($_GET['v']);
	  $ok = $sql->query("SELECT * FROM video WHERE id='$name'");
	  $video = mysqli_fetch_assoc($ok);
	  $name = $sql->real_escape_string($video['author']);
	  $ok = $sql->query("SELECT * FROM users WHERE username='$name'");
	  $user = mysqli_fetch_assoc($ok);
	  $name = $sql->real_escape_string($_SESSION['username']);
	  $ok = $sql->query("SELECT * FROM users WHERE username='$name'");
	  $loggeduser = mysqli_fetch_assoc($ok);
	  $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	  $pagetitle = $sitetitle.' - '.$video['title'];
	  
	  // Feature video
	  if(!empty($video['id']) && isset($_GET['feature']) && ($loggedu['admin']==1 || strtolower($loggedu['username']) == "evie")) {
		$name = $sql->real_escape_string($video['id']);
		if($video['featured'] == 0) {
			$sql->query("UPDATE video SET featured=1 WHERE id='$name'");
			$_SESSION['error'] = 'The video has been featured... nice';
			$txt = $_SESSION['username'].": featured video ".$video['id'];
			$myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
		}else{
			$sql->query("UPDATE video SET featured=0 WHERE id='$name'");
			$_SESSION['error'] = 'The video has been unfeatured... sadge';
			$txt = $_SESSION['username'].": unfeatured video ".$video['id'];
			$myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
		}
		echo "<script>window.location.href='/';</script>";
		die($_SESSION['error']);
	  } 
	  
	  // Delete video
	  if($video['featured'] == 1) {
			$pre = 'Un'; 
	}
	if($video['deleted'] == 1) {
			$pre1 = 'Un'; 
	}
	  if(!empty($video['id']) && isset($_GET['delete']) && ($loggedu['admin']==1 || strtolower($loggedu['username']) == "evie")) {
		$name = $sql->real_escape_string($video['id']);
		if($video['deleted'] == 0) {
			if($user['banned'] == 1){ $pre = 'Un'; }
			$sql->query("UPDATE video SET deleted=1 WHERE id='$name'");
			$_SESSION['error'] = 'The video has been deleted... :sob: <a href="/watch?v='.$video['id'].'&delete">UNDO</a>';
			$txt = $_SESSION['username'].": deleted video ".$video['id'];
			$myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
		}else{
			$sql->query("UPDATE video SET deleted=0 WHERE id='$name'");
			$_SESSION['error'] = 'The video has been undeleted... yey';
			$txt = $_SESSION['username'].": undeleted video ".$video['id'];
			$myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
		}
		echo "<script>window.location.href='/';</script>";
		die($_SESSION['error']);
	  } 
	  
	  // Comment add
	  if(!empty($_POST['msg'])) {
		if(isset($_SESSION['commentkey']) && $_POST['keys'] == $_SESSION['commentkey']) {
		  $loggedinusername = $_SESSION['username'];
		  $msg = $sql->real_escape_string($_POST['msg']); 
		  $name = $sql->real_escape_string($_POST['touser']); 
		  $ok = $sql->query("SELECT * FROM video WHERE id='$name'");
		  $touser = mysqli_fetch_assoc($ok); 
		  $pp = $touser['id'];
		  $vids=mysqli_query($sql, "SELECT * FROM `comments` WHERE fromuser = '$loggedinusername' AND touser = '$pp' AND text = '$msg'");
		  while($vid=mysqli_fetch_array($vids)) {
			die('<script>window.location.replace("/watch?v='.$pp.'");</script>');
			$_SESSION['commenterror'] = "Your comment was not posted.";
		  }
		  if(!empty($touser['date'])) {
			  mysqli_query($sql, "INSERT INTO comments (touser, fromuser, text)
				VALUES ('".$pp."', '".$loggedinusername."', '".$msg."')");
			  $_SESSION['commentgotposted'] = 1;
			  echo '<script>window.location.replace("/watch?v='.$pp.'");</script>';
		  } else{
				die('Video not found.');
		  }
		  unset($_SESSION['commentkey']);
	  }
	}

	// Favorite add
	$loggedinuserid = $loggeduser['id'];
	$videoid = $sql->real_escape_string($video['id']); 
	$ok = $sql->query("SELECT * FROM video WHERE id='$videoid'");
	$touser = mysqli_fetch_assoc($ok); 
	$vids=mysqli_query($sql, "SELECT * FROM `favorites` WHERE userid = '$loggedinuserid' AND video = '$videoid'");
	while($vid=mysqli_fetch_array($vids)) {
				$isfav = "yes";
			}
	  if(isset($_POST['fav'])) {
		  
		  $loggedinuserid = $loggeduser['id'];
		  $videoid = $sql->real_escape_string($video['id']); 
		  $ok = $sql->query("SELECT * FROM video WHERE id='$videoid'");
		  $touser = mysqli_fetch_assoc($ok); 
		  $vids=mysqli_query($sql, "SELECT * FROM `favorites` WHERE userid = '$loggedinuserid' AND video = '$videoid'");
			while($vid=mysqli_fetch_array($vids)) {
				mysqli_query($sql, "DELETE FROM `favorites` WHERE userid = '$loggedinuserid' AND video = '$videoid'");
				$isdelete = true;
				header('Location: /watch?v='.$_GET['v']); 
		  }
		  
		  if(!empty($touser['date']) && $isdelete !== true) {
			  $pp = $touser['id'];
			  mysqli_query($sql, "INSERT INTO favorites (video, userid)
				VALUES ('".$pp."', '".$loggedinuserid."')");
			  $hasbeenaddedtofavs = 1;
			  header('Location: /watch?v='.$_GET['v']); 
		  } else{
		  }
	}

	  if(empty($video['id'])) {
		$_SESSION['error'] = 'This video does not exist!';
		echo "<script>window.location.href='/';</script>";
		die($_SESSION['error']);
	  } 
	  
	  if($user['banned'] == '1') {
		if($loggedu['admin'] !== '1' && $logged['username'] !== "Evie") {
			$_SESSION['error'] = 'The user that uploaded this video has been suspended.';
			echo "<script>window.location.href='/';</script>";
			die($_SESSION['error']);
		}else{
			echo 'The user that uploaded this video has been suspended.';
		}
	  }
	  if($video['deleted'] == '1') {
		if($loggedu['admin'] !== '1') {
			$_SESSION['error'] = 'This video has been removed';
			echo "<script>window.location.href='/';</script>";
			die($_SESSION['error']);
		}else{
			echo 'This video has been removed';
		}
	  }?><?php $videoid = $video['id'];
			$comments = 0;
			$commentsc=mysqli_query($sql, "SELECT * FROM `comments` WHERE touser = '$videoid' ORDER BY `id` DESC");
			while($comment=mysqli_fetch_array($commentsc)) { $comments = $comments + 1; } 
			#$newviews = $video['views'] + 1; 
			#$sql->query("UPDATE `video` SET `views` = '$newviews' WHERE id = '$videoid';");
?>
<div id="watch-vid-title" class="title  longform" bis_skin_checked="1">
	<div id="watch-longform-buttons" bis_skin_checked="1">
		<div class="clearL" bis_skin_checked="1"></div>
	</div>
		<h1><?php echo htmlspecialchars($video['title']) ?></h1>
</div>
<div id="watch-this-vid" class="yt-rounded" bis_skin_checked="1">
				<div id="watch-player-div" class="flash-player" bis_skin_checked="1">
					<iframe height="320px" width="640px" src="/player/lolplayer.php?filename=<?php echo htmlspecialchars($video['mp4']); ?>"></iframe>
				</div> 				<script type="text/javascript">
					var fo = writeMoviePlayer("watch-player-div", false, null, null, "100%", "100%");
				</script>

</div>
