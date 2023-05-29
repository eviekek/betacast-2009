<div class="headerRCBox">
	<b class="rch">
	<b class="rch1"><b></b></b>
	<b class="rch2"><b></b></b>
	<b class="rch3"></b>
	<b class="rch4"></b>
	<b class="rch5"></b>
	</b><div class="content">
	<div class="headerTitle">
		<div class="headerTitleRight">(<a href="/user/<?php echo htmlspecialchars($username) ?>/subscriptions" class="headers">View</a>)</div>
		<span>Subscriptions</span>
	</div></div>
</div>
<div class="basicBoxes scrollersBox"><center>
		<div style="padding-left: 1px;">					
		<table width="21" height="121" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<table width="500" height="121" style="background-color: #ffffff; " cellpadding="0" cellspacing="0">
						<tr>
							<td   style="border-bottom:none;">
							<?php $vids=mysqli_query($sql, "SELECT * FROM `subs` WHERE fromwho = '$username' ORDER BY `id` DESC LIMIT 4");
							while($vid=mysqli_fetch_array($vids)) {
							$namew = $sql->real_escape_string($vid['towho']);
							$ok = $sql->query("SELECT * FROM users WHERE username='$namew'");
							$users = mysqli_fetch_assoc($ok);								
							?>
							<div class="videobarthumbnail_block" id="div_subscribers_0">
								<center>
									<div><a id="href_subscribers_0" href="/user/<?php echo htmlspecialchars($vid['fromwho']) ?>"><img class="videobarthumbnail_white" id="img_subscribers_0" src="/vi/thumb/<?php echo htmlspecialchars($users['channelicon']) ?>.jpg" onload="opacity('img_subscribers_0', 80, 100, 800);" width="80" height="60"></a></div>
									<div id = "title1_subscribers_0" style="font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #666666; padding-bottom: 3px;"><?php echo htmlspecialchars($vid['fromwho']) ?></div>
									<div id = "title2_subscribers_0" style="font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #666666; padding-bottom: 3px;">&nbsp;</div>
								</center>
							</div>
							<div class="videobarthumbnail_block" id="div_subscribers_0_alternate" style="display: none">
								<center>
									<div><img src="/vi/static/pixel.gif" width="80" height="60"></div>
									<div style="font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #666666; padding-bottom: 3px;">&nbsp;</div>
									<div style="font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #666666; padding-bottom: 3px;">&nbsp;</div>
								</center>
							</div>
							<?php } ?>
							</td>
						</tr>
					</table>
				</td>
				</td>
			</tr>
		</table>
		</div></center>
</div>
