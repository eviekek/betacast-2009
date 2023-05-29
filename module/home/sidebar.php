<div id="homepage-side-content" bis_skin_checked="1">
<script>
function showstats() {
  var x = document.getElementById("stats_right");
  var x1 = document.getElementById("stats_right_toggle_on");
  var x2 = document.getElementById("stats_right_toggle_off");
  if (x.style.display === "none") {
    x.style.display = "block";
    x1.style.display = "none";
    x2.style.display = "block";
  } else {
    x.style.display = "none";
    x1.style.display = "block";
    x2.style.display = "none";
  }
}
</script>
<div id="iyt-login-suggest-side-box" class="homepage-side-block" bis_skin_checked="1">
	<div style="border: 1px solid rgb(153, 153, 153); padding: 5px;" bis_skin_checked="1">
		<div id="main_right" style="border: 1px solid rgb(204, 204, 204); padding: 4px; background: #eee; text-align: center;" bis_skin_checked="1">
			<?php if(!isset($_SESSION['loggedin'])) { ?>
				<strong>Want to customize this homepage?</strong><br>
				<a href="<?= $site_domain ?>/login">Sign In</a> or <a href="<?= $site_domain ?>/signup">Sign Up</a> now!
			<?php } else{ ?>
				<h2>Hi, <?php echo $loggedname; ?></h2><br>
				<span>You currently have <strong><?= $loggedu['subs'] ?></strong> subscribers</span><br>
				<a href="<?= $site_domain ?>/user/<?php echo $loggedname; ?>">My profile</a> | <a href="<?= $site_domain ?>/my_videos">My videos</a> | <a href="<?= $site_domain ?>/account?m=ps">Profile Setup</a>
				<br><a href="<?= $site_domain ?>/subscription_center">My subscriptions</a> | <a href="<?= $site_domain ?>/user/<?= $loggedu['username'] ?>/subscribers">My subscribers</a>
				<?php if(!empty($loggedu['ownsmcn'])) { echo '<br><br><a href="/mcn_manage">Manage MCN</a>'; } ?>
				<?php if($loggedu['admin'] == 1) { ?><br><a id="stats_right_toggle_on" href="javascript:showstats();">Show Site stats</a><a style="display:none;" id="stats_right_toggle_off" href="javascript:showstats();">Hide Site stats</a><?php } ?>
			<?php } ?>
		</div>
		<?php if($loggedu['admin'] == 1) { ?>
		<?php
				// user count
				$count_users=mysqli_query($sql, "SELECT COUNT(id) AS `value_occurrence` FROM users WHERE lastlogin > '1' ORDER BY `value_occurrence` DESC");
				$count_users=mysqli_fetch_array($count_users);
				$count_users=$count_users['value_occurrence'];
				
				// user count
				$count_videos=mysqli_query($sql, "SELECT COUNT(id) AS `value_occurrence` FROM video WHERE deleted != '1' ORDER BY `value_occurrence` DESC");
				$count_videos=mysqli_fetch_array($count_videos);
				$count_videos=$count_videos['value_occurrence'];
				
				// mcn count
				$top_mcn=mysqli_query($sql, "SELECT mcn, COUNT(mcn) AS `value_occurrence` FROM users GROUP BY mcn ORDER BY `value_occurrence` DESC LIMIT 1");
				$top_mcn=mysqli_fetch_array($top_mcn);

		?>
		<div id="stats_right" style="display:none;border: 1px solid rgb(204, 204, 204); padding: 4px; background: #eee; text-align: center;" bis_skin_checked="1">
				<h2>BetaCast stats</h2><br>
				<span><strong><?= number_format($count_users) ?></strong> users have signed in before</span><br>
				<span><strong><?= number_format($count_videos) ?></strong> videos have been uploaded</span><br>
				<span>The site is <strong><?= time_elapsed_string('2023-01-02 00:00:00') ?></strong> old</span><br>
				<span>Most popular MCN is <strong><?= $top_mcn['mcn'] ?></strong> with <strong><?= $top_mcn['value_occurrence'] ?></strong> members</span><br>
		</div><?php } ?>
	</div>  

		</div>

	<div class="clear" bis_skin_checked="1"></div>

	<div class="homepage-side-block" bis_skin_checked="1">
		<div id="homepage-whats-new-block" bis_skin_checked="1">
		<div class="side-announcement-box yt-rounded" bis_skin_checked="1">
				<div class="homepage-whats-new-content" bis_skin_checked="1">
		<div class="homepage-block-heading" bis_skin_checked="1">Last 5 users online...</div>

			<?php $vids=mysqli_query($sql, "SELECT * FROM `users` WHERE banned = 0 ORDER BY `lastlogin` DESC LIMIT 5");
			while($vid=mysqli_fetch_array($vids)) { ?>
			<div class="homepage-whatsnew-entry" bis_skin_checked="1">
				<div class="homepage-whatsnew-entry-title" bis_skin_checked="1">
					<a href="/user/<?= $vid['username'] ?>"><?= $vid['username'] ?></a>
				</div>
				<div class="homepage-whatsnew-text" bis_skin_checked="1">
					<?php
					$user=$vid['username'];
					$vids2=mysqli_query($sql, 'SELECT COUNT(author) AS `number` FROM video WHERE author="'.$user.'"');
					while($vid2=mysqli_fetch_array($vids2)) { 
					?>
					<?= $vid['subs'] ?> subscribers | <?= $vid2['number'] ?> videos <?php } ?>
				</div>
			</div><div class="clear" bis_skin_checked="1"></div><?php } ?>
			
			
			<!-- <div class="alignR" style="padding-top: 5px;" bis_skin_checked="1">
				<a href="/discord" style="color:#CC6600">Read more in our Discord</a>
			</div> -->
			<div style="font-size: 1px; height: 1px;" bis_skin_checked="1"><br></div>
	</div>
			<div class="spacer" bis_skin_checked="1">&nbsp;</div>
		</div>
	</div>
</div>
</div>
