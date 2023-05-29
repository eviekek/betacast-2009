<div class="profile-box" id="user_subscribers" bis_skin_checked="1">
	<div class="box-head" bis_skin_checked="1">
	<div class="box-fg" bis_skin_checked="1">
			<div class="headerTitleRight floatR" bis_skin_checked="1">
			</div>
			<div class="headerTitle  channel-box-title" id="user_subscribers-head" bis_skin_checked="1">
Subscribers
					(<a href="/user/<?php echo htmlspecialchars($user['username']) ?>/subscribers" class="headersSmall" name="channel-box-item-count"><?php echo $user['subs']; ?></a>)
			</div>
			<div class="clear" bis_skin_checked="1"></div>
	</div>
	<div class="box-bg" bis_skin_checked="1"></div>
	</div>
			<div class="box-body" id="user_subscribers-body" bis_skin_checked="1">
				<div class="box-fg" bis_skin_checked="1">
	<div class="box-fg" bis_skin_checked="1">
		
		<?php $vids=mysqli_query($sql, "SELECT * FROM `subs` WHERE towho = '$username' ORDER BY `id` DESC LIMIT 4");
							while($vid=mysqli_fetch_array($vids)) {
							$name = $sql->real_escape_string($vid['fromwho']);
							$ok = $sql->query("SELECT * FROM users WHERE username='$name'");
							$users = mysqli_fetch_assoc($ok);								
							?>
			<div class="user-peep" style="width:25%;" bis_skin_checked="1"><center>
				  <div class="user-thumb-xlarge" bis_skin_checked="1"><div bis_skin_checked="1">
					<a href="/user/<?php echo htmlspecialchars($vid['fromwho']) ?>" onmousedown="trackEvent('ChannelPage', 'subscriptions_image_link', '00haxorg00 - bayfa')">
						<img id="" src="/vi/thumb/<?php echo htmlspecialchars($users['channelicon']) ?>.jpg" alt="<?php echo htmlspecialchars($vid['fromwho']) ?>">
					</a>
  </div></div>
				<a href="/user/<?php echo htmlspecialchars($vid['fromwho']) ?>" title="<?php echo htmlspecialchars($vid['fromwho']) ?>"><?php echo $vid['fromwho']; ?></a>
			</center></div>
			
	
	<div style="clear:both;font-height:1px" bis_skin_checked="1"></div>
				<div style="font-size: 12px; text-align: right; margin-top: 7px;" bis_skin_checked="1">
		<b><a name="channel-box-see-all" href="/user/<?php echo htmlspecialchars($user['username']) ?>/subscribers">
see all
		</a></b>
	</div>
	</div>
					<div class="clear" bis_skin_checked="1"></div>
				</div>
				<div class="box-bg" bis_skin_checked="1"></div>
			</div>
</div>
