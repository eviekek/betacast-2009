<?php
$towho = $username;
$hwat = $_SESSION['username'];
$vids=mysqli_query($sql, "SELECT * FROM `subs` WHERE fromwho = '$hwat' AND towho = '$towho'");
while($vid=mysqli_fetch_array($vids)) {
 $subbed = true;
}
if($user['lastlogin'] == "-1") {
	$user['lastlogin'] = strtotime($user['created_at']);
}
// Ban user
	  if(!empty($user['id']) && isset($_GET['ban']) && $loggedu['admin']==1) {
		$name = $sql->real_escape_string($user['id']);
		if($user['banned'] == 0) {
			$sql->query("UPDATE users SET banned=1 WHERE id='$name'");
			$_SESSION['error'] = 'The video has been deleted';
			$txt = $_SESSION['username'].": banned user ".$video['id'];
			$myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
		}else{
			$sql->query("UPDATE users SET banned=0 WHERE id='$name'");
			$_SESSION['error'] = 'The video has been undeleted';
			$txt = $_SESSION['username'].": unbanned user ".$video['id'];
			$myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
		}
		echo "<script>window.location.href='/user/".$user['username']."';</script>";
		die($_SESSION['error']);
	  } 
	  
// Reclaim user
if(isset($_GET['reclaim'])) {
?>
<div class="profile-box profile-highlightbox" id="user_profile" bis_skin_checked="1">
	<div class="box-head" bis_skin_checked="1">
		<div class="box-fg" bis_skin_checked="1">
				<div class="headerTitleEdit" bis_skin_checked="1">
					<div class="headerTitleRight" bis_skin_checked="1">
					</div>
					<div class="headerTitleLeft" bis_skin_checked="1">
						<span id="user-profile-title">Reclaiming</span>
					</div>
				</div>
		</div>
		<div class="box-bg" bis_skin_checked="1"></div>
	</div>
	<div class="box-body" bis_skin_checked="1">
		
	<div class="box-bg" bis_skin_checked="1"></div>
<div class="box-fg" bis_skin_checked="1">
<?php
	  if(!empty($user['id']) && $_GET['reclaim']=="r" && $loggedu['admin']==1) {
		 $bytes = openssl_random_pseudo_bytes(4);
		$pass = password_hash(bin2hex($bytes), PASSWORD_DEFAULT);
		$name = $sql->real_escape_string($user['id']);
		$sql->query("UPDATE users SET password='$pass' WHERE id='$name'");
		$_SESSION['error'] = '<div id="subscribeMessage" style="margin-bottom: 5px;" bis_skin_checked="1">USERNAME: '.$user['username'].' <br>PASSWORD: '.bin2hex($bytes).'</div>';
		$txt = $_SESSION['username'].": reclaimed user ".$user['username'];
		$myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
		// i dont think the profile page shows the error thingy :/
		// echo "<script>window.location.href='/user/".$user['username']."';</script>";
		die($_SESSION['error']);
}
if($_GET['reclaim'] !=="r" && isset($_GET['reclaim'])) {
	die('<div class="smallText">Are you sure? <a href="/user/'.$user['username'].'&reclaim=r">Yes, I am sure</a></div>');
}
?>
	</div></div>
</div><?php } ?>
<div class="profile-box profile-highlightbox" id="user_profile" bis_skin_checked="1">
	<div class="box-head" bis_skin_checked="1">
		<div class="box-fg" bis_skin_checked="1">
				<div class="headerTitleEdit" bis_skin_checked="1">
					<div class="headerTitleRight" bis_skin_checked="1">
									<div id="subscribeDiv" bis_skin_checked="1">
										<?php if($_SESSION['username'] == $username) { ?>
										<a class="yt-button yt-button-urgent" id="user-profile-subscribe-button" style="" href="https://www.youtube.com/account" onclick='window.location.replace("/account?m=ps"); return false;'><span>Edit Channel</span></a>
										<?php }else{ ?>
										<a class="yt-button <?php if(!isset($subbed)) { echo 'yt-button-urgent'; } ?>" id="user-profile-<?php if(isset($subbed)) { echo 'unsubscribe'; } else{ echo 'subscribe'; } ?>-button" style="" href="#" onclick='window.location.replace("/subscription_center?add_user=<?php echo strtolower(htmlspecialchars($user['username'])) ?>"); return false;'><span><?php if(isset($subbed)) { echo 'Unsubscribe'; } else{ echo 'Subscribe'; } ?></span></a>
										<?php } ?>
									</div>
					</div>
					<div class="headerTitleLeft" bis_skin_checked="1">
						<span id="user-profile-title"><?php echo htmlspecialchars($username) ?>'s Channel</span>
					</div>
				</div>
		</div>
		<div class="box-bg" bis_skin_checked="1"></div>
	</div>
	<div class="box-body" bis_skin_checked="1">
		<div class="box-fg" bis_skin_checked="1">

		<div id="subscribeMessage" style="margin-bottom: 5px; <?php if($_SESSION['justsubbed']  !== true) { ?>display: none;<?php }else{ $_SESSION['justsubbed'] = false; } ?>" bis_skin_checked="1">
			<?php if($_SESSION['unsub'] !== true) { ?>You are now subscribed!<?php } ?>
			<?php if($_SESSION['unsub'] == true) { ?>You are no longer subscribed!<?php } ?>
		</div>

				<div id="user-profile-image" class="floatL" bis_skin_checked="1">
					  <div class="user-thumb-xlarge" bis_skin_checked="1"><div bis_skin_checked="1">
<?php if($_SESSION['username'] == $username) { ?><a href="<?= $site_domain ?>/account?m=images"><?php } ?>
    <img id="" src="<?= $site_cdn ?><?php if($user['channelicon'] !== "novideo") { ?>/thumb/<?php echo $user['channelicon'] ?>.jpg?a=1<?php }else{ 
	echo '/thumb/novideo.jpg?1'; }
?>" alt="">
<?php if($_SESSION['username'] == $username) { ?></a><?php } ?>
  </div></div>
				<?php 
				//$vids=mysqli_query($sql, "SELECT * FROM `users` WHERE banned = 0");
				//while($vid=mysqli_fetch_array($vids)) {
				//if(!is_numeric($vid['lastlogin'])) { 
				//	$towho = $vid['username'];
				//	mysqli_query($sql, "UPDATE users SET lastlogin=0 WHERE username='$towho'");
				 //}  }
				 
				 // fuck logs 
				 ?>
				</div>
				<div style="float:left;margin-left:5px;width:180px;" bis_skin_checked="1">
					<div class="largeTitles" bis_skin_checked="1"><strong id="user-profile-username"><?php echo htmlspecialchars($username) ?> <?php echo htmlspecialchars($user['suffix']) ?><?php if($user['admin'] == "1") { ?><span style="color: red;">    [ADMIN]</span><?php } ?></strong></div>
					<div style="padding-top: 3px;" bis_skin_checked="1">
						<div class="smallText" bis_skin_checked="1">Joined: <strong id="user-profile-member-since" style="cursor:pointer;" onclick='this.innerHTML = "<?php echo time_elapsed_string($user['created_at'], 0, 10); ?>";'><?php echo date("M d, Y", strtotime($user['created_at'])); ?></strong></div>
						<div class="smallText" bis_skin_checked="1">Last Sign In: <strong id="user-profile-last-login" style="cursor:pointer;" onclick='this.innerHTML = "<?php echo date("M d, Y", substr($user['lastlogin'], 0, 10)); ?>";'><?php echo time_elapsed_string(date("Y-m-d H:i:s", substr($user['lastlogin'], 0, 10))); ?></strong></div>
						<div class="smallText" bis_skin_checked="1">Videos Watched: <strong id="user-profile-video-watch-count"><?= $user['vidswatched'] ?></strong></div>
						<div class="smallText" bis_skin_checked="1">Subscribers: <strong id="user-profile-subscriber-count" onclick='window.location.href = "/user/<?php echo htmlspecialchars($user['username']) ?>/subscribers";' style="cursor:pointer;"><?php echo $user['subs'] ?></strong></div>
						<div class="smallText" bis_skin_checked="1">Channel Views: <strong id="user-profile-viewed-count">0</strong></div>
						<?php if($user['partner'] == "1") { ?>MCN: <strong><?php echo $user['mcn']; ?></strong><?php } ?>
					</div>
				</div>
				<div style="clear:both" bis_skin_checked="1"></div>
					<br>
						<br>
						<div style="padding-top: 3px;" bis_skin_checked="1"><div bis_skin_checked="1">
							<?php 
							$paragraphs = preg_split('/\n+/', htmlspecialchars($user['bio']));
							foreach($paragraphs as $p)
								{
									if(strlen($p) > 0)
									{
										echo "$p<br>";
									}
								} 
							
							if($user['banned'] == 1){ $pre = 'Un'; } ?>
							<?php if($loggedu['admin'] == '1' && $_SESSION['username'] !== $user['username']) { echo '<hr><center><a class="yt-button" id="user-profile-unsubscribe-button" style="" href="#" onclick="window.location.replace('."'/user/".$user['username']."&ban'".')"><span>'.$pre.'Ban User</span></a>
								<a class="yt-button" id="user-profile-unsubscribe-button" style="" href="#" onclick="window.location.replace('."'/user/".$user['username']."&reclaim'".')"><span>Reclaim User</span></a></center>'; } ?>
						</div></div>

					<div class="profileAssets" style="padding-top: 5px;" bis_skin_checked="1">

					<?php if(!empty($user['location'])) { ?><span class="smallText">Location:</span> <strong id="user-profile-country"><?php echo htmlspecialchars($user['location']); ?></strong><?php } ?>
				<br>
							<!--<span class="smallText">Occupation:</span> <strong id="user-profile-occupation">Admin</strong><br>
							<span class="smallText">Interests and Hobbies:</span> <strong id="user-profile-hobbies">swimming,shopping,clubbing,travelling.</strong><br>-->
							<!-- <span class="smallText">Website:</span> <strong id="user-profile-url">	<a href="https://web.archive.org/web/20090609011044/http://www.cammycams.com/" name="&amp;lid=ProfileWebsiteLink&amp;lpos=Profile" onmousedown="trackEvent('ChannelPage', 'infobox_website_link', '00haxorg00')" rel="nofollow">http://www.cammycams.com</a></strong><br>-->
					</div>
	</div>
	<div class="box-bg" bis_skin_checked="1"></div>
	</div>
</div>
