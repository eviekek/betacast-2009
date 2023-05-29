<div class="profile-box" id="user_subscribers" bis_skin_checked="1">
	<div class="box-head" bis_skin_checked="1">
	<div class="box-fg" bis_skin_checked="1">
			<div class="headerTitleRight floatR" bis_skin_checked="1">
			</div>
			<div class="headerTitle  channel-box-title" id="user_subscribers-head" bis_skin_checked="1">
Subscribers
					(<a href="<?= $site_domain ?>/user/<?php echo htmlspecialchars($user['username']) ?>/subscribers" class="headersSmall" name="channel-box-item-count"><?php echo $user['subs']; ?></a>)
			</div>
			<div class="clear" bis_skin_checked="1"></div>
	</div>
	<div class="box-bg" bis_skin_checked="1"></div>
	</div>
			<div class="box-body" id="user_subscribers-body" bis_skin_checked="1">
				<div class="box-fg" bis_skin_checked="1">
	<div class="box-fg" bis_skin_checked="1">
		
		<?php
		if($videolimit == 1) {
			$vids=mysqli_query($sql, "SELECT * FROM `subs` WHERE towho = '$username' ORDER BY `fromwho`");
		} else{
			$vids=mysqli_query($sql, "SELECT * FROM `subs` WHERE towho = '$username' ORDER BY `id` LIMIT 6");
		}
							while($vid=mysqli_fetch_array($vids)) {
							$name = $sql->real_escape_string($vid['fromwho']);
							$ok = $sql->query("SELECT * FROM users WHERE username='$name'");
							$users = mysqli_fetch_assoc($ok);								
							?>
			<div class="user-peep" style="width:<?php if(true == true) { echo '95px'; } else{ echo '25%'; } ?>;" bis_skin_checked="1"><center>
				<?php
					if(true == true) { ?><div class="user-thumb-large" bis_skin_checked="1"><div bis_skin_checked="1"><?php } else{ ?>
				  <div class="user-thumb-xlarge" bis_skin_checked="1"><div bis_skin_checked="1"><?php } ?>
					<a href="<?= $site_domain ?>/user/<?php echo htmlspecialchars($vid['fromwho']) ?>" onmousedown="trackEvent('ChannelPage', 'subscriptions_image_link', '00haxorg00 - bayfa')">
						<img id="" src="<?= $site_cdn ?>/thumb/<?php echo htmlspecialchars($users['channelicon']) ?>.jpg" alt="<?php echo htmlspecialchars($vid['fromwho']) ?>">
					</a>
  </div></div>
				<a href="<?= $site_domain ?>/user/<?php echo htmlspecialchars($vid['fromwho']) ?>" title="<?php echo htmlspecialchars($vid['fromwho']) ?>"><?php echo $vid['fromwho']; ?></a>
			</center></div>
			<?php } ?>
	
	<div style="clear:both;font-height:1px" bis_skin_checked="1"></div>
				<div style="font-size: 12px; text-align: right; margin-top: 7px;" bis_skin_checked="1">
		<b><a name="channel-box-see-all" href="<?= $site_domain ?>/user/<?php echo htmlspecialchars($user['username']) ?>/subscribers">
see all
		</a></b>
	</div>
	</div>
					<div class="clear" bis_skin_checked="1"></div>
				</div>
				<div class="box-bg" bis_skin_checked="1"></div>
			</div>
</div>
