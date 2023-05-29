<?php require ('config.inc.php');
	  if(!empty($_GET['user'])) {
	  $name = $sql->real_escape_string($_GET['user']);
	  $name = preg_replace('/[\/\\\]/', '', $name);
	  $ok = $sql->query("SELECT * FROM users WHERE username='$name'");
	  $user = mysqli_fetch_assoc($ok);
	  } else{
		if(isset($_GET['vanity'])) {
			$name = $sql->real_escape_string($_GET['vanity']);
			$ok = $sql->query("SELECT * FROM users WHERE vanity='$name'");
			$user = mysqli_fetch_assoc($ok);
			if(!empty($user['id'])) {
				$name = $user['username'];
			}else{
				$name = $sql->real_escape_string($_GET['vanity']);
				$name = preg_replace('/[\/\\\]/', '', $name);
				$ok = $sql->query("SELECT * FROM users WHERE username='$name'");
				$user = mysqli_fetch_assoc($ok);
			}
		} else{
			if(isset($_SESSION['loggedin'])) {
				$name = $sql->real_escape_string($_SESSION['username']);
				$ok = $sql->query("SELECT * FROM users WHERE username='$name'");
				$user = mysqli_fetch_assoc($ok);
			} else{
				header('Location: /login');
			}
		}
	  }
	  $username = $user['username'];
	  if(!isset($_COOKIE['hideurl'])) { $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; } else { $url = 'Url Hidden'; }
	  $pagetitle = $sitetitle.' - '.$username."'s Channel";
	  if(empty($user['id'])) {
		header("HTTP/1.0 404 Not Found");
		$error = '404: Not found';
		require 'module/home_page.php';
		die();
	  }
	  if($user['banned'] == '1') {
		$namesasda = $sql->real_escape_string($_SESSION['username']); $ok = $sql->query("SELECT * FROM users WHERE username='$namesasda'");
		$loggedu = mysqli_fetch_assoc($ok); 
		if($loggedu['admin'] !== "1") {
		header("HTTP/1.0 404 Not Found");
		$error = 'This user is suspended.';
		require 'module/home_page.php';
		die();
		} else{
			echo '<center><div style="background-color: lightgrey; color: black;">This user is banned!</div></center>';
		}
	  }
	  if(!empty($user['redirect'])) {
		header('Location: /'.$user['redirect']);
		die();
	  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- hwd was here uwu -->
	<html lang="en"><head>
	<title><?php echo $pagetitle; ?></title>
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
			background:transparent url(<?= $site_cdn ?>/img/profile_960.gif) no-repeat scroll 0 0;
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
	<base target="_top">
</head>
