<div id="feedmodule-PRO" class="feedmodule-anchor" bis_skin_checked="1">
				<div class="feedmodule-modheader" onmousedown="bootstrapHomepage()" id="PRO-titlebar" bis_skin_checked="1">
			<div id="feed_promoted" bis_skin_checked="1">
		<div class="fm2-title-border-box-blue yt-rounded" bis_skin_checked="1">
			<div class="fm2-title" bis_skin_checked="1">
				<img class="img_feed_promoted master-sprite fm2-icon" src="http://s.ytimg.com/yt/img/pixel-vfl73.gif">
				<span class="fm2-titleText" id="feed_promoted-titleText">Most Viewed Videos   <?php if(!isset($_GET['deleted'])) { if($loggedu['admin'] == "1") {?><a href="/browse?deleted">Include deleted videos</a><?php } } ?></span>
			</div>
	</div>
	</div>
	</div>
	<div class="clear feedmodule-border-blue yt-rounded" id="feed_promoted-content" bis_skin_checked="1">
			<div id="PRO-options" class="opt-pane" style="display: none;" bis_skin_checked="1">
		<div class="opt-box-top" bis_skin_checked="1">
			<img class="homepage-ajax-sprite img-php-opt-box-caret" src="http://s.ytimg.com/yt/img/pixel-vfl73.gif">
		</div>
		<div class="opt-banner" bis_skin_checked="1">
			<div class="opt-links" bis_skin_checked="1">
				<div class="opt-edit" bis_skin_checked="1">Editing: Featured Videos  </div>
				<div class="opt-close opt-close-button" onclick="queueHomepageFunction(function() { php_support.close_options_pane('PRO-options');})" bis_skin_checked="1"><img class="img-php-close-button" src="https://web.archive.org/web/20090620134647im_/http://s.ytimg.com/yt/img/pixel-vfl73.gif"></div>
				<div class="opt-close opt-close-text" onclick="queueHomepageFunction(function() { php_support.close_options_pane('PRO-options');})" bis_skin_checked="1">close</div>
				<div id="PRO-loading-msg" class="opt-loading-msg" style="display: none;" bis_skin_checked="1">
Saving...
				</div>
				<div id="PRO-loading-icn" class="opt-loading-icn" style="display: none;" bis_skin_checked="1">
					<img width="16" id="PRO-loading-icn-image" src="http://s.ytimg.com/yt/img/pixel-vfl73.gif" image="http://s.ytimg.com/yt/img/icn_loading_animated-vfl24663.gif">
				</div>
				<div class="clear" bis_skin_checked="1"></div>
			</div>
		</div>
	</div>
		<div id="PRO-data" class="feedmodule-data" bis_skin_checked="1">
						<div class="feedmodule-body grid-view" bis_skin_checked="1">
		<div class="clearL" bis_skin_checked="1">
		<?php 
		if(!isset($_GET['deleted'])) {
			if(!isset($_GET['new'])) {
				$vids=mysqli_query($sql, "SELECT * FROM `video` WHERE DELETED = 0 ORDER BY `views` DESC LIMIT 16");
			}else{
				$vids=mysqli_query($sql, "SELECT * FROM `video` WHERE DELETED = 0 ORDER BY `id` DESC LIMIT 16");
			}
		}else{
			if(!isset($_GET['new'])) {
				$vids=mysqli_query($sql, "SELECT * FROM `video` ORDER BY `views` DESC LIMIT 16");
			}else{
				$vids=mysqli_query($sql, "SELECT * FROM `video` ORDER BY `id` DESC LIMIT 16");
			}
		}
		while($vid=mysqli_fetch_array($vids)) { ?>
		<!-- VIDEO START -->
		<div class="video-cell" style="width:24.6%" bis_skin_checked="1">
	<div class="video-entry" bis_skin_checked="1">
			<div class="v120WideEntry" bis_skin_checked="1"><div class="v120WrapperOuter" bis_skin_checked="1"><div class="v120WrapperInner" bis_skin_checked="1"><a id="video-url-EhnLzvc1W2w" href="/watch?v=<?php echo htmlspecialchars($vid['id']) ?>" onmousedown="urchinTracker('/Events/Home/PersonalizedHome/PRO/Logged_Out');" rel="nofollow"><img title="<?php echo htmlspecialchars($vid['title']) ?>" src="<?= $site_cdn ?>/thumb/<?php echo htmlspecialchars($vid['thumb']) ?>.jpg" class="vimg120" qlicon="EhnLzvc1W2w" alt="<?php echo htmlspecialchars($vid['title']) ?>"></a>
</div></div></div>
		<div class="video-main-content" id="video-main-content-EhnLzvc1W2w" bis_skin_checked="1">
			<div class="video-title " bis_skin_checked="1">
				<div class="video-short-title" bis_skin_checked="1">
						<a id="video-short-title-EhnLzvc1W2w" href="/watch?v=<?php echo htmlspecialchars($vid['id']) ?>" onmousedown="urchinTracker('/Events/Home/PersonalizedHome/PRO/Logged_Out');" title="<?php echo htmlspecialchars($vid['title']) ?>" rel="nofollow"><?php echo htmlspecialchars($vid['title']) ?></a>
				</div>
			</div>
			<div class="video-facets" bis_skin_checked="1">

					<span id="video-average-rating-EhnLzvc1W2w" class="video-rating-list ">
					</span>
					<?php  if($vid['deleted'] == '1') { ?><span id="video-added-time-EhnLzvc1W2w" class="video-date-added">DELETED</span><?php } ?>
					<span id="video-added-time-EhnLzvc1W2w" class="video-date-added">0 seconds ago</span>
					<span id="video-num-views-EhnLzvc1W2w" class="video-view-count"><?php echo htmlspecialchars($vid['views']) ?> views</span>
					<span class="video-username"><a id="video-from-username-EhnLzvc1W2w" class="hLink" href="/user/<?php echo htmlspecialchars($vid['author']) ?>"><?php echo htmlspecialchars($vid['author']) ?></a></span>
			</div>	
		</div>	
	</div>	
</div>
<!-- VIDEO FINISH --><?php } ?>	</div>
		</div>
	</div>
	<div class="clear" bis_skin_checked="1"></div>
		</div>
