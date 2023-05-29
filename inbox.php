<?php if($_GET['m'] !== "s") { ?>
<?php require 'config.inc.php'; ?>
<?php require 'module/pagestart.php'; ?>
<?php require 'module/2009_header.php'; ?>
<?php if(!isset($_SESSION['username'])) { die("<center>You Must login to access this page.</center>"); } ?>
<?php require 'module/settings/inbox.php';
$pp = $_SESSION['username'];
$sql->query("UPDATE `users` SET `unreadmsg` = '0' WHERE `users`.`username` = '$pp';"); ?>
<?php } else{  ?>
<?php require 'module/channel/base.php'; ?>
<body onLoad="performOnLoadFunctions();" onUnload="performOnUnloadFunctions();">
<div id="baseDiv"><?php require 'module/channel/header.php'; ?>
<?php
	  if(isset($_POST['msg'])) {
		  $loggedinusername = $_SESSION['username'];
		  $msg = $sql->real_escape_string($_POST['msg']); 
		  $name = $sql->real_escape_string($_POST['touser']); 
		  $ok = $sql->query("SELECT * FROM users WHERE username='$name'");
		  $touser = mysqli_fetch_assoc($ok); 
		  if(!empty($touser['username'])) {
			  $pp = $touser['username'];
			  mysqli_query($sql, "INSERT INTO mail (touser, fromuser, content)
				VALUES ('".$pp."', '".$loggedinusername."', '".$msg."')");
			  $sql->query("UPDATE `users` SET `unreadmsg` = '1' WHERE `users`.`username` = '$pp';"); 
			  header('Location: /inbox');
			  die('<script>window.location.replace("/inbox");</script>');
		  } else{
				die('User not found.');
		  }
	}
	  $name = $sql->real_escape_string($_POST['name']);
	  $ok = $sql->query("SELECT * FROM users WHERE username='$name'");
	  $user = mysqli_fetch_assoc($ok);
	  $username = $user['username'];
	  if(!isset($_COOKIE['hideurl'])) { $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; } else { $url = 'Url Hidden'; }
	  $pagetitle = $sitetitle.' - '.$username."'s Channel";
	  if(empty($user['id'])) {
		$_SESSION['error'] = 'This user does not exist!';
		header('Location: ./');
		die();
	  }
?><center>
<h2 style="margin:0 0 2px">Write a message to <?php echo $username; ?></h2>
<form action="/inbox?m=s" method="POST">
<table cellpadding="4px" style="position:relative;right:4px">
    <tbody><tr>
        <td><textarea maxlength="500" name="msg" cols="66" rows="6"></textarea></td>
        <td><textarea style="display: none;" maxlength="500" name="touser" cols="66" rows="6"><?php echo $username; ?></textarea></td>
    </tr>
    <tr>
        <td><input type="submit" name="post_comment" value="Send Message"></td>
    </tr>
</tbody></table>
</form>
<?php } ?>
