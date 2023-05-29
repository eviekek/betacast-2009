<?php $vids=mysqli_query($sql, "SELECT * FROM `subs` WHERE fromwho = '$username' ORDER BY `id` DESC LIMIT 1");
while($vid=mysqli_fetch_array($vids)) {?>
<div class="headerRCBox">
	<b class="rch">
	<b class="rch1"><b></b></b>
	<b class="rch2"><b></b></b>
	<b class="rch3"></b>
	<b class="rch4"></b>
	<b class="rch5"></b>
	</b> <div class="content">	<div class="headerTitle">
									<div class="headerTitleRight">
										(<a href="/user/<?php echo htmlspecialchars($username) ?>/subscriptions" class="headers">View</a>)
									</div>
									<span>Subscriptions</span>
								</div></div>
</div>
<div id="channelsBox" class="basicBoxes">
	<ul class="channelsList">
							<?php $vids=mysqli_query($sql, "SELECT * FROM `subs` WHERE fromwho = '$username' ORDER BY `id` DESC LIMIT 2");
							while($vid=mysqli_fetch_array($vids)) {
							$namew = $sql->real_escape_string($vid['towho']);
							$ok = $sql->query("SELECT * FROM users WHERE username='$namew'");
							$subbersa = mysqli_fetch_assoc($ok);								
							?>
		<li class="listHorizontal" style="padding-right: 35px;">
			<a href="/user/<?php echo htmlspecialchars($vid['towho']) ?>"><img src="/vi/thumb/<?php echo htmlspecialchars($subbersa['channelicon']) ?>.jpg" id="videoImg" class="imgBrdr"></a>
			<center><a href="/user/<?php echo htmlspecialchars($vid['towho']) ?>"><?php echo htmlspecialchars($vid['towho']) ?></a></center>
							</li><?php } ?>
	</ul>
</div><?php } ?>
