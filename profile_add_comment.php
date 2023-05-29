<?php require ('config.inc.php');
		if(!isset($_SESSION['loggedin'])) {
					header('Location: login');
					die();
		}
	  if(isset($_GET['user'])) {
	  $name = $sql->real_escape_string($_GET['user']);
	  $ok = $sql->query("SELECT * FROM users WHERE username='$name'");
	  $user = mysqli_fetch_assoc($ok);
	  } else{
		if(isset($_SESSION['loggedin'])) {
			$name = $sql->real_escape_string($_SESSION['username']);
			$ok = $sql->query("SELECT * FROM users WHERE username='$name'");
			$user = mysqli_fetch_assoc($ok);
		} else{
			header('Location: login');
		}
	  }
	  $username = $user['username'];
	  $loggedinusername = $_SESSION['username'];
	  if(!isset($_COOKIE['hideurl'])) { $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; } else { $url = 'Url Hidden'; }
	  $pagetitle = $sitetitle.' - '.$username."'s Channel";
	  if(empty($user['id'])) {
		$_SESSION['error'] = 'This user does not exist!';
		header('Location: ./');
		die();
	  }
	  if(!empty($_POST['msg'])) {
		  $msg = $sql->real_escape_string($_POST['msg']); 
		  $name = $sql->real_escape_string($_POST['touser']); 
		  $ok = $sql->query("SELECT * FROM users WHERE username='$name'");
		  $touser = mysqli_fetch_assoc($ok); 
		  if(!empty($touser['username'])) {
			  $pp = $touser['username'];
			  mysqli_query($sql, "INSERT INTO profilecomments (touser, fromuser, text)
				VALUES ('".$pp."', '".$loggedinusername."', '".$msg."')");
			  header('Location: /user/'.strtolower($username)); 
		  } else{
				die('User not found.');
		  }
	}
?>
<!DOCTYPE HTML>
<html>
<title>
		<?php echo $pagetitle; ?>
</title>
<body onLoad="ytshit();">
	<style>
	<?php require 'channelcss.php'; ?>
	</style>
	<style type="text/css">
#baseDiv {
			width: 875px;
		}

#baseDiv {
			width: 960px;
		}
#profile-player-div #movie_player {
			height: 385px;
			width: 640px;
		}
#smallMastheadBottom {
			width: 960px;
			background:transparent url(/img/profile_960.gif) no-repeat scroll 0 0;
		}
#profile-main-content {
			width: 640px;
		}
		.profileEmbedVideoInfo {
			width: 638px;
		}
		.profile-banner-box {
			text-align: center;
		}
		.vlog-entry-info {
			width: 333px;
		}
	
	</style>
<body onLoad="performOnLoadFunctions();" onUnload="performOnUnloadFunctions();">
<div id="baseDiv"><?php require 'module/channel/header.php'; $videolimit = 1; ?>
<!--Begin Page Container Table-->
<center>
<table class="pageContainerTable" width="875px">
<h2 style="margin:0 0 2px">Write a comment</h2>
<div style="margin-bottom:3px;font-family:arial,helvetica,sans-serif;color:#222222 !important">Channel comments appear on the users channel.</div>
<form action="" method="POST">
<table cellpadding="4px" style="position:relative;right:4px">
    <tbody><tr>
        <td><textarea maxlength="500" name="msg" cols="66" rows="6"></textarea></td>
        <td><textarea style="display: none;" maxlength="500" name="touser" cols="66" rows="6"><?php echo $username; ?></textarea></td>
    </tr>
    <tr>
        <td><input type="submit" name="post_comment" value="Post Comment"></td>
    </tr>
</tbody></table>
</form>
</table>
<!--End Page Container Table-->
</body>
</html>
