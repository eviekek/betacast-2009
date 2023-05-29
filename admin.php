<!DOCTYPE HTML>
<?php require ('config.inc.php');
	  $pagetitle = $sitetitle.' - Admin Panel';
	  $index = true;
	  $name = $sql->real_escape_string($_SESSION['username']);
	  $ok = $sql->query("SELECT * FROM users WHERE username='$name'");
	  $logged = mysqli_fetch_assoc($ok); 
	  if($logged['admin'] !== '1' && $logged['username'] !== "Evie" && $logged['username'] !== "hwd") { $_SESSION['error'] = 'You are not admin.'; }
	  if($logged['super_admin'] == '0' && $logged['username'] !== "Evie" && $logged['username'] !== "hwd") { $_SESSION['error'] = 'The admin panel has been retired.'; }
	  if(($logged['super_admin'] == '0' || $logged['admin'] !== '1')  && $logged['username'] !== "Evie" && $logged['username'] !== "hwd") { echo "<script>window.location.href='/';</script>";
	  die($_SESSION['error']); }
// Feature a Video
if(!empty($_POST['featureid'])) { 
$featureid = $sql->real_escape_string($_POST['featureid']); $sql->query("UPDATE `video` SET `featured` = 1 WHERE `video`.`id` = '$featureid';"); 
$txt = $_SESSION['username'].": featured video ".$_POST['featureid'];
 $myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);}

// DELETE a Video
if(!empty($_POST['del'])) { 
$del = $sql->real_escape_string($_POST['del']); $sql->query("UPDATE `video` SET `deleted` = 1 WHERE `video`.`id` = '$del';"); 
 $txt = $_SESSION['username'].": deleted video ".$_POST['del'];
 $myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);}

// Ban a user
if(!empty($_POST['user'])) { 
$usertoban = $sql->real_escape_string($_POST['user']); 
$sql->query("UPDATE `users` SET `banned` = 1 WHERE `users`.`username` = '$usertoban';");
$sql->query("UPDATE `video` SET `deleted` = 1 WHERE author = '$usertoban';"); 
 $txt = $_SESSION['username'].": banned ".$_POST['user'];
 $myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);}

// unBan a user
if(!empty($_POST['userunban'])) { 
$usertoban = $sql->real_escape_string($_POST['userunban']); 
$sql->query("UPDATE `users` SET `banned` = 0 WHERE `users`.`username` = '$usertoban';");
$sql->query("UPDATE `video` SET `deleted` = 0 WHERE author = '$usertoban';"); 
 $txt = $_SESSION['username'].": unbanned ".$_POST['userunban'];
 $myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);}

// reset a user
if(!empty($_POST['reset'])) { 
$bytes = openssl_random_pseudo_bytes(4);
$pass = password_hash(bin2hex($bytes), PASSWORD_DEFAULT);
$reset = $sql->real_escape_string($_POST['reset']); 
$sql->query("UPDATE `users` SET `banned` = 0 WHERE `users`.`username` = '$reset';");
//$sql->query("UPDATE `users` SET `subs` = 0 WHERE `users`.`username` = '$reset';");
//$sql->query("UPDATE `users` SET `channelicon` = 'novideo' WHERE `users`.`username` = '$reset';");
//$sql->query("UPDATE `users` SET `chcolor` = '666' WHERE `users`.`username` = '$reset';");
$sql->query("UPDATE `users` SET `password` = '$pass' WHERE `users`.`username` = '$reset';");
//$sql->query("UPDATE `video` SET `deleted` = 1 WHERE `video`.`author` = '$reset';"); 
//$sql->query("DELETE FROM subs WHERE `subs`.`towho` = '$reset'"); 
//$sql->query("DELETE FROM subs WHERE `subs`.`fromwho` = '$reset'"); 
 $txt = $_SESSION['username'].": reclaimed user ".$_POST['reset'];
 $myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
}

// Rename a user
if(!empty($_POST['usertochange'])) { 
if(!empty($_POST['changetowhat'])) { 
$nameseys = $sql->real_escape_string($_SESSION['changetowhat']); $ok = $sql->query("SELECT * FROM users WHERE username='$nameseys'");
$lnewnameseys = mysqli_fetch_assoc($ok); 
if(empty($lnewnameseys['id'])) {
$usertochange = $sql->real_escape_string($_POST['usertochange']); 
$changetowhat = $sql->real_escape_string($_POST['changetowhat']); 
$sql->query("UPDATE `users` SET `username` = '$changetowhat' WHERE `users`.`username` = '$usertochange';");
$sql->query("UPDATE `video` SET `author` = '$changetowhat' WHERE `video`.`author` = '$usertochange';"); 
$sql->query("UPDATE `subs` SET `fromwho` = '$changetowhat' WHERE `subs`.`fromwho` = '$usertochange';"); 
$sql->query("UPDATE `subs` SET `towho` = '$changetowhat' WHERE `subs`.`towho` = '$usertochange';"); 
$sql->query("UPDATE `profilecomments` SET `fromuser` = '$changetowhat' WHERE `fromwho` = '$usertochange';"); 
$sql->query("UPDATE `profilecomments` SET `touser` = '$changetowhat' WHERE ``towho` = '$usertochange';"); 
$sql->query("UPDATE `mail` SET `fromuser` = '$changetowhat' WHERE `fromwho` = '$usertochange';"); 
$sql->query("UPDATE `mail` SET `touser` = '$changetowhat' WHERE ``towho` = '$usertochange';"); 
 $txt = $_SESSION['username'].": renamed user ".$_POST['usertochange']." to ".$_POST['changetowhat'];
 $myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
} else{ die('b'); } } } 
?>
<html>
<head>
	<title><?php echo $pagetitle ?></title>
	<link rel="stylesheet" href="./styles.css" type="text/css">
	<link rel="stylesheet" href="./base.css" type="text/css">
	<link rel="stylesheet" href="./watch.css" type="text/css">
	<script language="javascript" type="text/javascript">
		onLoadFunctionList = new Array();
		function performOnLoadFunctions()
		{
			for (var i in onLoadFunctionList)
			{
				onLoadFunctionList[i]();
			}
		}
	</script>
</head>
<body onLoad="performOnLoadFunctions();">
<div id="baseDiv"><?php require 'module/yt_header.php'; ?><script type="text/javascript" src="/js/video_bar.js"></script>
<div id="standardContent" style="width: 685px;">
		<div id="normal" class="contentBox" style="margin-bottom: 15px;<?php if(isset($reset)) {  ?>display:none;<?php } ?>">
			<table cellpadding="6" cellspacing="0" border="0">
				<tr valign="top">
					<td width="33%">
						<?php
						if(isset($_GET['logs'])) { $paragraphs = preg_split('/\n+/', file_get_contents('logs.txt'));
						echo '<h1><a>Admin logs</a></h1>';
						foreach($paragraphs as $p)
							{
								if(strlen($p) > 0)
								{
									echo "<p>$p</p>";
								}
							} 
						echo '<a></a>';
						}
						if(!isset($_GET['logs'])) {
						?>
						<h1><a>Rename user</a></h1>
						<a>WARNING: THIS HAS NO RESTRICTIONS. DONT RENAME USERS TO THE NAMES OF OTHER USERS.</a>
						<form method="post" action="admin.php">
							<input name="usertochange" placeholder="CURRENT USERNAME"><br>
							<input name="changetowhat" placeholder="NEW NAME"><br>
							<input type="submit" value="LAUNCH NUKE">
						</form>
					</td>
					<td width="33%">
						<h1><a>Latest Users</a></h1>
						<div id="littleusers">
							<?php $vids=mysqli_query($sql, "SELECT * FROM `users` WHERE banned = 0 ORDER BY `id` DESC LIMIT 7");
							while($vid=mysqli_fetch_array($vids)) { ?><a href="profile?user=<?php echo $vid['username'] ?>"><?php echo substr($vid['username'], 0, 19) ?></a><br><?php } ?>
							<center><strong><a href="javascript:void(0);" onclick='document.getElementById("littleusers").style.display = "none";document.getElementById("moreusers").style.display = "block";'>MORE</a></strong></center>
						</div>
						<div style="display: none;" id="moreusers">
							<?php $vids=mysqli_query($sql, "SELECT * FROM `users` WHERE banned = 0 ORDER BY `id` DESC LIMIT 8, 8");
							while($vid=mysqli_fetch_array($vids)) { ?><a  href="profile?user=<?php echo $vid['username'] ?>"><?php echo substr($vid['username'], 0, 19) ?></a><br><?php } ?>
						</div>
					</td>
					<td width="34%">
						<h1><a>Last Users Online</a></h1>
						<?php $vids=mysqli_query($sql, "SELECT * FROM `users` WHERE banned = 0 ORDER BY `lastlogin` DESC LIMIT 8");
						while($vid=mysqli_fetch_array($vids)) { ?><a href="profile?user=<?php echo $vid['username'] ?>"><?php echo substr($vid['username'], 0, 19) ?></a><br><?php } ?>
					</td><?php } ?>
				</tr>
			</table><center><a href="<?php if(isset($_GET['logs'])) { ?>/admin<?php } else{?>javascript:void(0);<?php } ?>" <?php if(!isset($_GET['logs'])) { ?>onclick='div1.style.display = "none";div2.style.display = "block";'<?php } ?>><?php if(!isset($_GET['logs'])) { ?>Reclaiming<?php }else{ ?>Back<?php } ?></a>
			<?php if(!isset($_GET['logs'])) { ?> | <a href="/admin?logs" >Logs</a><?php } ?></center>
		</div>
		<div id="reclaim" class="contentBox" style="<?php if(!isset($reset)) {  ?>display:none;<?php } ?>margin-bottom: 15px;">
			<?php if(isset($reset)) {  ?>
			<div style="border: 3px solid green;padding: 6px;margin-top: 6px;margin-bottom: 6px;text-align: center;font-weight: bold;font-size: 14px;color: green;" bis_skin_checked="1">USERNAME: <?php echo $reset; ?><br> PASSWORD: <?php echo bin2hex($bytes); ?></div>
			<?php } ?>
			<table cellpadding="6" cellspacing="0" border="0">
				<tr valign="top">
					<td width="33%">
						<h1><a>Reclaim user</a></h1>
						<a>WARNING: YOU MUST CONFIRM<br> WITH SEED THAT THIS IS OK</a>
						<form method="post" action="/admin">
							<input name="reset" placeholder="RECLAIM USER"><br>
							<input type="submit" value="Reclaim">
						</form>
					</td>
				</tr>
			</table><center><a href="javascript:void(0);" onclick='div2.style.display = "none";div1.style.display = "block";'>Back</a></center>
		</div>
		<script>
			var div1 = document.getElementById("normal");
			var div2 = document.getElementById("reclaim");
		</script>
<div class="headerRCBox">
	<b class="rch">
	<b class="rch1"><b></b></b>
	<b class="rch2"><b></b></b>
	<b class="rch3"></b>
	<b class="rch4"></b>
	<b class="rch5"></b>
	</b>
	<div class="content">		
		<div class="headerTitle">
			<span>Actions</span>
		</div>
	</div>
</div>
	<div class="contentListBox" style="margin-bottom: 15px;">
		<div class="contentListStandard">
			<table cellpadding="6" cellspacing="0" border="0">
					<td width="33%">
						<h1><a>Feature Video</a></h1>
						<form method="post" action="admin.php">
							<input name="featureid" placeholder="Video ID"><br>
							<input type="submit" value="Feature">
						</form>
					</td>
					<td width="33%">
						<h1><a>Delete Video</a></h1>
						<form method="post" action="admin.php">
							<input name="del" placeholder="Video ID"><br>
							<input type="submit" value="Delete">
						</form>
					</td>
					<td width="34%">
						<h1><a>Ban User</a></h1>
						<form method="post">
							<input name="user<?php if(isset($_GET['unb'])) { ?>unban<?php } ?>" placeholder="Username"><br>
							<input type="submit" value="Ban">
						</form>					
					</td>
			</table>
		</div>
	</div>
</div>
<?php require 'module/sidebar.php'; ?><div id="footerDiv"><?php // require 'module/betacast_foot.php' ?></div></div>-->
</body>
</html>
