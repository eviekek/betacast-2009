<?php
// Post add
	  $pp = $_SESSION['username'];
	  if(!empty($_POST['fname'])) {
		if($_SESSION['username']) {
		  //ini_set('display_errors', 1);
		  //ini_set('display_startup_errors', 1);
		  //error_reporting(E_ALL);
		  $loggedinusername = $_SESSION['username'];
		  $msg = $sql->real_escape_string(htmlspecialchars($_POST['fname'])); 
		  $pp = $_SESSION['username'];
		  mysqli_query($sql, "INSERT INTO `recent` (`user`, `text`)
		  VALUES ('".$pp."', '".$msg."')");
	   }
	 }
	 if(isset($_POST['fname'])) { echo '<script>window.location.replace("/user/'.$pp.'");</script>'; }
?>
<?php $vids=mysqli_query($sql, "SELECT * FROM `recent` WHERE user = '$username' ORDER BY `id` DESC LIMIT 1");
	while($vid=mysqli_fetch_array($vids)) {	$postsexist = 1; } if(isset($postsexist) || $user['username'] == $_SESSION['username']) {?>
<div class="profile-box" id="user_recent_activity" bis_skin_checked="1">
	<div class="box-head" bis_skin_checked="1">
	<div class="box-fg" bis_skin_checked="1">
			<div class="headerTitleRight floatR" bis_skin_checked="1">
			</div>
			<div class="headerTitle  channel-box-title" id="user_recent_activity-head" bis_skin_checked="1">
				Recent Activity &nbsp;
			</div>
			<div class="clear" bis_skin_checked="1"></div>
	</div>
	<div class="box-bg" bis_skin_checked="1"></div>
	</div>
	<?php if($user['username'] == $_SESSION['username']) { ?>
	<form method="post">
		<div style="display: flex; flex-wrap: wrap;">
			<input type="text" id="fname" name="fname" placeholder="Whats on your mind?" style="flex: 1;">
			<input type="submit" value="Post" style="flex: 0 0 20%;">
		</div>
	</form><?php } 
	if(isset($postsexist)) {?>
			<div class="box-body" id="user_recent_activity-body" bis_skin_checked="1">
				<div class="box-fg" bis_skin_checked="1">
	<div id="feed_table" bis_skin_checked="1">
		<table border="0" cellspacing="0" cellpadding="0" width="100%">
					<tbody>	
	<?php $vids=mysqli_query($sql, "SELECT * FROM `recent` WHERE user = '$username' ORDER BY `id` DESC LIMIT 5");
	while($vid=mysqli_fetch_array($vids)) {	?>
	<tr id="feed_item_<?php echo $vid['id']; ?>" valign="top">
		<td class="feed_icon">
			<img class="icon-FRI" src="http://s.ytimg.com/yt/img/pixel-vfl73.gif">
		</td>
		<td>
			<div bis_skin_checked="1">
				<strong><?php echo $user['username']; ?></strong> <?php echo $vid['text']; ?>
								<span class="timestamp">(<?php echo time_elapsed_string($vid['date']); ?>)</span>
			</div>
		</td>
		<td class="feed_delete">
			&nbsp;

		</td>
	</tr><tr id="feed_divider_iJLXf_7B368" class="divider"><td colspan="3">&nbsp;</td>
	<?php } ?>
					
		
	</tr>
		</tbody></table>
	</div>
					<div class="clear" bis_skin_checked="1"></div>
				</div>
				<div class="box-bg" bis_skin_checked="1"></div>
			</div>
<?php } ?></div><?php } ?>
