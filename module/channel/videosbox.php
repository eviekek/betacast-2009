<?php 
if($videolimit == 1) {
	$vids=mysqli_query($sql, "SELECT * FROM `video` WHERE DELETED = 0 ORDER BY `id` DESC LIMIT 1");
} else{
	$vids=mysqli_query($sql, "SELECT * FROM `video` WHERE author = '$username' AND DELETED = 0 ORDER BY `id` DESC LIMIT 1");
}
while($vid=mysqli_fetch_array($vids)) { ?>
<?php 
$vids=mysqli_query($sql, "SELECT * FROM `video` WHERE author = '$username' AND DELETED = 0 ORDER BY `id` DESC LIMIT 1");
while($vid=mysqli_fetch_array($vids)) { $hasvids = 1; } ?>
<div class="profile-box" id="user_videos" bis_skin_checked="1">
	<div class="box-head" bis_skin_checked="1">
	<div class="box-fg" bis_skin_checked="1">
			<?php
				$name = $user['username']; 
				$count_videos=mysqli_query($sql, "SELECT COUNT(author) AS `value_occurrence` FROM video WHERE author = '$name' ORDER BY `value_occurrence` DESC");
				$videocount=mysqli_fetch_array($count_videos);
				$videocount=$videocount['value_occurrence'];
			?>
			<div class="headerTitleRight floatR" bis_skin_checked="1">
			<form name="subscribeToUsernameBox" method="get" action="/subscription_center">
				<input type="hidden" name="add_user" value="<?php echo $username; ?>">
				<a href="javascript: document.subscribeToUsernameBox.submit();">
					Subscribe to <?php echo $username; ?>'s videos
				</a>
			</form>
			</div>
			<div class="headerTitle  channel-box-title" id="user_videos-head" bis_skin_checked="1">
					Videos
						(<a href="/user/<?php echo $username; ?>/videos" class="headersSmall" name="channel-box-item-count"><?= $videocount ?></a>)
			</div>
			<div class="clear" bis_skin_checked="1"></div>
	</div>
	<div class="box-bg" bis_skin_checked="1"></div>
	</div>
			<div class="box-body" id="user_videos-body" bis_skin_checked="1">
				<div class="box-fg" bis_skin_checked="1">
	<div id="videosPofileVideos" bis_skin_checked="1">
		  <div id="user-videos-max-details" bis_skin_checked="1"></div>
		<div class="grid-view" bis_skin_checked="1">
<?php 
if($videolimit == 1) {
	$vids=mysqli_query($sql, "SELECT * FROM `video` WHERE author = '$username' AND DELETED = 0 ORDER BY `id` DESC");
} else{
	$vids=mysqli_query($sql, "SELECT * FROM `video` WHERE author = '$username' AND DELETED = 0 ORDER BY `id` DESC LIMIT 3");
}
while($vid=mysqli_fetch_array($vids)) { ?>
<div class="video-cell" style="width:32.6%" bis_skin_checked="1">
	<div class="video-entry" bis_skin_checked="1">
			<div class="v120WideEntry" bis_skin_checked="1"><div class="v120WrapperOuter" bis_skin_checked="1"><div class="v120WrapperInner" bis_skin_checked="1"><a id="video-url-IcmSeJAdqts" href="/watch?v=<?php echo $vid['id'] ?>;feature=channel_page" rel="nofollow"><img title="Thumbnail" src="<?= $site_cdn ?>/thumb/<?php echo $vid['thumb'] ?>.jpg" class="vimg120" qlicon="IcmSeJAdqts" alt="Thumbnail"></a><div id="quicklist-icon-IcmSeJAdqts" class="addtoQL90" bis_skin_checked="1"><a id="add-to-quicklist-IcmSeJAdqts" href="#" ql="IcmSeJAdqts" title="Add Video to QuickList"><button class="master-sprite QLIconImg" title="" onclick="clicked_add_icon(this, this.parentNode.getAttribute('ql'), 0, 'https://web.archive.org/web/20090609011044/http://i2.ytimg.com/vi/IcmSeJAdqts/default.jpg', '<?php echo htmlspecialchars($vid['title']) ?>');return false;" onmouseover="mouseOverQuickAdd(this)" onmouseout="mouseOutQuickAdd(this)" onmousedown="urchinTracker('/Events/profile/QuickList+AddTo')"></button></a></div>
			</div></div></div>
		<div class="video-main-content" id="video-main-content-IcmSeJAdqts" bis_skin_checked="1">
			<div class="video-title " bis_skin_checked="1">
				<div class="video-short-title" bis_skin_checked="1">
						<span id="translated_short_prefix_IcmSeJAdqts" style="font-size: 10px;" class="hid">[TRANSLATED]</span>
						<a id="video-short-title-IcmSeJAdqts" href="/watch?v=<?php echo $vid['id'] ?>;feature=channel_page" title="<?php echo htmlspecialchars($vid['title']) ?>" rel="nofollow"><?php echo htmlspecialchars($vid['title']) ?></a>
				</div>
				<div class="video-long-title" bis_skin_checked="1">
						<span id="translated_long_prefix_IcmSeJAdqts" style="font-size: 10px;" class="hid">[TRANSLATED]</span>
						<a id="video-long-title-IcmSeJAdqts" href="/watch?v=<?php echo $vid['id'] ?>;feature=channel_page" title="<?php echo htmlspecialchars($vid['title']) ?>" rel="nofollow"><?php echo htmlspecialchars($vid['title']) ?></a>
				</div>
			</div>
			<div class="video-facets" bis_skin_checked="1">
					<span id="video-average-rating-IcmSeJAdqts" class="video-rating-list video-rating-with-caps">
					</span>
						<span id="video-added-time-IcmSeJAdqts" class="video-date-added"><?php echo date("M d, Y", strtotime($vid['date'])); ?></span>
					<span id="video-num-views-IcmSeJAdqts" class="video-view-count"><?php echo htmlspecialchars($vid['views']) ?> views</span>
					<span class="video-username"><a id="video-from-username-IcmSeJAdqts" class="hLink" href="/user/<?php echo $vid['author'] ?>"><?php echo $vid['author'] ?></a></span>
					<span id="video-average-rating-IcmSeJAdqts" class="video-rating-grid video-rating-with-caps">
	<div bis_skin_checked="1">
<button class="master-sprite ratingCapsVS-left" title=""></button><button class="master-sprite ratingCapsVS ratingCapsVS-2.5" title="2.5"></button><button class="master-sprite ratingCapsVS-right" title=""></button>
	</div>
					</span>
			</div>	
		</div>	
		<div class="video-clear-list-left" bis_skin_checked="1"></div>
	</div>	
</div>	
<?php } ?>
<?php if(!isset($hasvids)) { echo '<center><strong>This user has no videos!</strong></center>'; } ?>		</div>
	</div>
					<div class="clear" bis_skin_checked="1"></div>
				</div>
				<div class="box-bg" bis_skin_checked="1"></div>
			</div>
</div>
<?php } ?>
