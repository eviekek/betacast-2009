<div class="profile-box" id="user_subscriptions" bis_skin_checked="1">
	<div class="box-head" bis_skin_checked="1">
	<div class="box-fg" bis_skin_checked="1">
			<div class="headerTitleRight floatR" bis_skin_checked="1">
			</div>
			<?php
				$name = $user['username']; 
				$count_subscriptions=mysqli_query($sql, "SELECT COUNT(fromwho) AS `value_occurrence` FROM subs WHERE fromwho = '$name' ORDER BY `value_occurrence` DESC");
				$countsubscriptions=mysqli_fetch_array($count_subscriptions);
				$countsubscriptions=$countsubscriptions['value_occurrence'];
			?>
			<div class="headerTitle  channel-box-title" id="user_subscriptions-head" bis_skin_checked="1">
						Subscriptions
						(<a href="<?= $site_domain ?>/user/<?= $name ?>/subscriptions" class="headersSmall" name="channel-box-item-count"><?= $countsubscriptions ?></a>)
			</div>
			<div class="clear" bis_skin_checked="1"></div>
	</div>
	<div class="box-bg" bis_skin_checked="1"></div>
	</div>
			<div class="box-body" id="user_subscriptions-body" bis_skin_checked="1">
				<div class="box-fg" bis_skin_checked="1">
	<div class="box-fg" bis_skin_checked="1">
		<?php 
		if($videolimit == 1) {
			$vids=mysqli_query($sql, "SELECT * FROM `subs` WHERE fromwho = '$username' ORDER BY `id`");
		} else{
			$vids=mysqli_query($sql, "SELECT * FROM `subs` WHERE fromwho = '$username' ORDER BY rand() LIMIT 6");
		}
							while($vid=mysqli_fetch_array($vids)) {
							$namew = $sql->real_escape_string($vid['towho']);
							$ok = $sql->query("SELECT * FROM users WHERE username='$namew'");
							$subbersa = mysqli_fetch_assoc($ok);								
							?>
		<!--start this user-->
			<div class="user-peep" style="width:95px;" bis_skin_checked="1"><center>
				  <div class="user-thumb-large" bis_skin_checked="1"><div bis_skin_checked="1">
<a href="<?php if(empty($subbersa['vanity'])) { echo "/user/".htmlspecialchars($vid['towho']); } else{ echo "/".$subbersa['vanity']; } ?>">
    <img id="" src="<?= $site_cdn ?>/thumb/<?php echo htmlspecialchars($subbersa['channelicon']) ?>.jpg" alt="profile">
</a>
  </div></div>
				<a href="<?= $site_domain ?><?php if(empty($subbersa['vanity'])) { echo "/user/".htmlspecialchars($vid['towho']); } else{ echo "/".$subbersa['vanity']; } ?>"title="<?php echo htmlspecialchars($vid['towho']); ?>"><?php echo htmlspecialchars($subbersa['username']) ?></a>
			</center></div>
<!-- end this user --><?php } ?>
		<div style="clear:both;font-height:1px" bis_skin_checked="1"></div>
				<div style="font-size: 12px; text-align: right; margin-top: 7px;" bis_skin_checked="1">
		<b><a name="channel-box-see-all" href="<?= $site_domain ?><?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>/subscriptions">
see all
		</a></b>
	</div>
	</div>
					<div class="clear" bis_skin_checked="1"></div>
				</div>
				<div class="box-bg" bis_skin_checked="1"></div>
			</div>
</div>
