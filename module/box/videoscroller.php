<div class="headerRCBox">
	<b class="rch">
	<b class="rch1"><b></b></b>
	<b class="rch2"><b></b></b>
	<b class="rch3"></b>
	<b class="rch4"></b>
	<b class="rch5"></b>
	</b><div class="content">									
		<div class="headerTitle">
					<div class="headerTitleRight">
						<!-- <img src="/img/arrow_sq_sm.gif" align="absmiddle" /><a href="playall" class="headers">Play All Videos</a> | -->
						(<a href="/user/<?php echo htmlspecialchars($username) ?>/videos" class="headers">View All Videos</a> |
						<a href="/subscription_center?add_user=<?php echo htmlspecialchars($username) ?>" class="headers">Subscribe To Videos</a>)
					</div><span>Videos</span>
		</div></div>
</div>
<div class="basicBoxes scrollersBox">
	<center>
 		<div style="padding-left: 1px;">					
		<table width="21" height="121" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<table width="500" height="121" style="background-color: #ffffff; " cellpadding="0" cellspacing="0">
						<tr>
							<td   style="border-bottom:none;">
							<?php $vids=mysqli_query($sql, "SELECT * FROM `video` WHERE author = '$name' AND DELETED = 0 ORDER BY `id` DESC LIMIT 4");
							while($vid=mysqli_fetch_array($vids)) { ?>
							<div class="videobarthumbnail_block" id="div_profile_videos_0">
								<center>
									<div><a id="href_profile_videos_0" href="/watch?v=<?php echo $vid['id'] ?>"><img class="videobarthumbnail_white" id="img_profile_videos_0" src="/vi/thumb/<?php echo $vid['thumb'] ?>.jpg" onload="opacity('img_profile_videos_0', 80, 100, 800);" width="80" height="60"></a></div>
									<div id = "title1_profile_videos_0" style="font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #666666; padding-bottom: 3px;"><?php echo htmlspecialchars($vid['title']) ?></div>
									<div id = "title2_profile_videos_0" style="font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #666666; padding-bottom: 3px;"><?php echo elapsed_time(strtotime($vid['date'])) ?></div>
								</center>
							</div>
							<div class="videobarthumbnail_block" id="div_profile_videos_0_alternate" style="display: none">
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
		</div>
	</center>
</div>
