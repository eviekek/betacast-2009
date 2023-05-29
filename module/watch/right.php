<?php
$name = $sql->real_escape_string($video['author']); $ok = $sql->query("SELECT * FROM users WHERE username='$name'");
$videus = mysqli_fetch_assoc($ok); ?>
<?php
$towho = $name;
$hwat = $_SESSION['username'];
$vids=mysqli_query($sql, "SELECT * FROM `subs` WHERE fromwho = '$hwat' AND towho = '$towho'");
while($vid=mysqli_fetch_array($vids)) {
 $subbed = true;
}
?>
<div id="watch-channel-vids-div" class="vcard" bis_skin_checked="1">
		<div id="watch-channel-vids-top" bis_skin_checked="1">
				<div id="watch-channel-icon" class="user-thumb-medium" bis_skin_checked="1"><div bis_skin_checked="1">
					<a class="url" href="<?= $site_domain ?>/user/<?php echo strtolower(htmlspecialchars($video['author'])) ?>" onmousedown="urchinTracker('/Events/VideoWatch/ChannelIconLink');"><img src="<?= $site_cdn  ?>/thumb/<?php echo $videus['channelicon']; ?>.jpg" class="photo" alt="Channel Icon"></a>
				</div></div>
				<div id="watch-channel-subscribe" bis_skin_checked="1">
						<div id="subscribeDiv" bis_skin_checked="1">
		<?php if($_SESSION['username'] == $video['author']) { ?>
				<a class="yt-button yt-button-urgent" id="user-profile-subscribe-button" style="" href="#" onclick='window.location.replace("/account"); return false;'><span>Edit Channel</span></a>
		<?php }else{ ?>
			<a class="yt-button <?php if(!isset($subbed)) { echo 'yt-button-urgent'; } ?>" id="user-profile-<?php if(isset($subbed)) { echo 'unsubscribe'; } else{ echo 'subscribe'; } ?>-button" style="" href="#" onclick='window.location.replace("/subscription_center?add_user=<?php echo strtolower(htmlspecialchars($user['username'])) ?>"); return false;'><span><?php if(isset($subbed)) { echo 'Unsubscribe'; } else{ echo 'Subscribe'; } ?></span></a>
		<?php } ?>
		</div>
				</div>
				<div id="watch-channel-stats" bis_skin_checked="1">
					<a href="<?= $site_domain ?>/user/<?php echo strtolower(htmlspecialchars($video['author'])) ?>" onmousedown="urchinTracker('/Events/VideoWatch/ChannelNameLink');" class="hLink fn n contributor"><?php echo htmlspecialchars($video['author']) ?></a><br>
						<span class="watch-video-added post-date" style="cursor:pointer;" onclick='this.innerHTML = "<?php echo time_elapsed_string($video['date']); ?>";'><?php echo date("M d, Y", strtotime($video['date'])); ?></span><br>
						<span class="watch-video-added post-date"><?php echo $videus['subs']; ?> Subscribers</span>
				</div>

			<div class="clear" bis_skin_checked="1"></div>
		</div> 

		<div id="subscribeMessage" style="display: none" bis_skin_checked="1"></div>

		<div id="subscribeLoginInvite" style="border: 1px solid rgb(153, 153, 153); padding: 5px; background-color:#ffffff;margin:8px 5px 0 5px;display:none;" bis_skin_checked="1">
			
		<div style="border: 1px solid rgb(204, 204, 204); padding: 4px; background: #eee; text-align: center;" bis_skin_checked="1">
			<strong>Want to Subscribe?</strong><br>
			<a href="https://web.archive.org/web/20090802183845/https://www.google.com/accounts/ServiceLogin?uilel=3&amp;service=youtube&amp;passive=true&amp;continue=http%3A%2F%2Fwww.youtube.com%2Fsignup%3Fnomobiletemp%3D1%26hl%3Den_US%26next%3D%252F&amp;hl=en_US<mpl=sso">Sign In</a> or <a href="/web/20090802183845/https://www.youtube.com/signup?next=%2F">Sign Up</a> now!
	</div>  
		</div>
		<div id="watch-video-details" class="expand-panel" bis_skin_checked="1">
			<div id="watch-video-details-inner" bis_skin_checked="1">

				<div class="collapse-content" bis_skin_checked="1">

					<div class="watch-video-desc" bis_skin_checked="1">
						<span class="description"><?php echo strtolower(htmlspecialchars($video['description'])) ?></span>
						<?php if($loggedu['admin'] == '1') { echo '<hr><center><a class="yt-button yt-button-urgent" id="user-profile-subscribe-button" style="" href="#" onclick="window.location.replace('."'/watch?v=".$video['id']."&feature'".')"><span>'.$pre.'Feature Video</span></a>
							<a class="yt-button" id="user-profile-unsubscribe-button" style="" href="#" onclick="window.location.replace('."'/watch?v=".$video['id']."&delete'".')"><span>'.$pre1.'Delete Video</span></a></center>'; } ?>
					</div>
				</div>

				<div class="expand-content" bis_skin_checked="1">

					<div class="watch-video-desc description" bis_skin_checked="1">
						<span><></span>
					</div>
				</div> 
				<!--<div id="watch-url-div" bis_skin_checked="1">
					<form action="" name="urlForm" id="urlForm">
						<label for="watch-url-field">URL</label>
						<input name="video_link" id="watch-url-field" type="text" class="email-video-url" value="http://www.youtube.com/watch?v=WfYyBp4Ln2s" onclick="javascript:document.urlForm.video_link.focus();document.urlForm.video_link.select();" onmousedown="urchinTracker('/Events/VideoWatch/CopyPasteLinkFromMoreInfo');" readonly="">
						<div class="clearL" bis_skin_checked="1"></div>
					</form>
				</div>
				<div id="watch-embed-div" bis_skin_checked="1">
					<form action="" name="embedForm" id="embedForm">
						<label for="embed_code">Embed</label>
						<div bis_skin_checked="1">
							<input id="embed_code" name="embed_code" type="text" value="<object width=&quot;425&quot; height=&quot;344&quot;><param name=&quot;movie&quot; value=&quot;http://www.youtube.com/v/WfYyBp4Ln2s&amp;hl=en&amp;fs=1&quot;></param><param name=&quot;allowFullScreen&quot; value=&quot;true&quot;></param><param name=&quot;allowscriptaccess&quot; value=&quot;always&quot;></param><embed src=&quot;http://www.youtube.com/v/WfYyBp4Ln2s&amp;hl=en&amp;fs=1&quot; type=&quot;application/x-shockwave-flash&quot; allowscriptaccess=&quot;always&quot; allowfullscreen=&quot;true&quot; width=&quot;425&quot; height=&quot;344&quot;></embed></object>" onclick="document.embedForm.embed_code.focus();document.embedForm.embed_code.select();customizeEmbed(isWidescreen, true);" readonly="">
							<span id="watch-embed-customize-wrapper" class="tooltip-wrapper" style="z-index: 0;">
								<button id="watch-embed-customize" onclick="customizeEmbed(isWidescreen); urchinTracker('/Events/VideoWatch/CustomizeEmbed'); return false;" class="master-sprite" title="" onmouseover="toggleSimpleTooltip(this, true)" onmouseout="toggleSimpleTooltip(this, false)"></button>
								<div class="tooltip-wrapper-box hid" bis_skin_checked="1" style="display: none;"><div class="tooltip-box" bis_skin_checked="1" style="background-image: url(&quot;https://web.archive.org/web/20090802152206/http://s.ytimg.com/yt/img/tooltip-vfl56131.gif&quot;);">Customize</div><img class="tooltip-box-bot" src="https://web.archive.org/web/20090802183845im_/http://s.ytimg.com/yt/img/pixel-vfl73.gif" style="background-image: url(&quot;https://web.archive.org/web/20090802152206/http://s.ytimg.com/yt/img/tooltip-vfl56131.gif&quot;);"></div>
							</span>
						</div>
						<div class="clearL" bis_skin_checked="1"></div>
					</form>
				</div> 
			</div> 
				<form id="watch-customize-embed-div" name="embedCustomizeForm" style="display: none;">Loading...</form>
		</div> 	</div> -->
</div></div></div><div id="watch-channel-videos-panel" class="watch-discoverbox-wrapper expand-panel expanded" onexpanded="toggleChannelVideos('RayWilliamJohnson');" bis_skin_checked="1"> 
		<a href="#" onclick="togglePanel(this.parentNode); this.blur(); return false;" class="expand-header"><button title="" class="master-sprite watch-arrow"></button>			<span>More From: <?php echo htmlspecialchars($video['author']) ?>
					</span></a>
		<div id="watch-channel-vids-body" class="watch-discoverbox-body mini-list-view expand-content" bis_skin_checked="1">
					<div id="watch-channel-discoverbox" class="watch-discoverbox" style="height:302px" onscroll="performDelayLoad('channel')" bis_skin_checked="1">
<?php $more = $video['author']; ?>
<?php $vids=mysqli_query($sql, "SELECT * FROM `video` WHERE author = '$more' AND DELETED = 0 ORDER BY `id` DESC");
while($vidmore=mysqli_fetch_array($vids)) { ?>
	<div class="video-entry " bis_skin_checked="1">
		<div class="v90WideEntry" bis_skin_checked="1"><div class="v90WrapperOuter" bis_skin_checked="1"><div class="v90WrapperInner" bis_skin_checked="1"><a href="/watch?v=<?php echo htmlspecialchars($vidmore['id']) ?>" rel="nofollow"><img title="<?php echo htmlspecialchars($vidmore['title']) ?>" src="<?= $site_cdn  ?>/thumb/<?php echo $vidmore['thumb'] ?>.jpg" class="vimg90" onload="delayLoad(this, '/vi/thumb/<?php echo $vidmore['thumb'] ?>.jpg', 'channel')" qlicon="xZFkcyM13hU" alt="<?php echo htmlspecialchars($vidmore['title']) ?>"></a></div></div></div></div>
		<div class="video-main-content" bis_skin_checked="1">
			<div class="video-mini-title" bis_skin_checked="1"><a href="/watch?v=<?php echo $vidmore['id'] ?>" title="<?php echo htmlspecialchars($vidmore['title']) ?>" rel="nofollow"><?php echo htmlspecialchars($vidmore['title']) ?></a></div>
			<div class="video-view-count" bis_skin_checked="1"><?= $vidmore['views']; ?> views</div>
		</div>
		<div class="video-clear-list-left" bis_skin_checked="1"></div><br><?php } ?>
	</div>
		<div id="watch-channel-video-list-loading-div" class="watch-discoverbox-more-link" style="display:none" bis_skin_checked="1">Loading...</div>
	</div>
		</div>
		<div class="clearL" bis_skin_checked="1"></div>
</div>
