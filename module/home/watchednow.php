<div id="feedmodule-POP" class="feedmodule-anchor" bis_skin_checked="1">
				<div class="feedmodule-modheader" onmousedown="bootstrapHomepage()" id="POP-titlebar" bis_skin_checked="1">

			<div id="feed_popular" bis_skin_checked="1">
		<div class="fm2-title-border-box-gray yt-rounded" bis_skin_checked="1">
			<div class="fm2-title" bis_skin_checked="1">
				<img class="img_feed_popular master-sprite fm2-icon" src="http://s.ytimg.com/yt/img/pixel-vfl73.gif">
				<span class="fm2-titleText" id="feed_popular-titleText">Featured Videos</span>
			</div>


		</div>
	</div>


	</div>

	<div class="clear feedmodule-border-gray yt-rounded" id="feed_popular-content" bis_skin_checked="1">

		<div id="POP-data" class="feedmodule-data" bis_skin_checked="1">


						<div class="feedmodule-body bigthumb-view" bis_skin_checked="1">




			<?php $vids=mysqli_query($sql, "SELECT * FROM `video` WHERE featured = '1' AND DELETED = 0 ORDER BY `id` DESC LIMIT 1");
			while($vid=mysqli_fetch_array($vids)) { ?>
			<div class="feeditem-bigthumb super-large-video " bis_skin_checked="1">
				<div style="font-size: 12px;" class="floatL" bis_skin_checked="1">
					<div class="feedmodule-thumbnail" bis_skin_checked="1">
						<div class="v220WideEntry" bis_skin_checked="1"><div class="v220WrapperOuter" bis_skin_checked="1"><div class="v220WrapperInner" bis_skin_checked="1">
						<a id="video-url-lho-EdO4sSY" href="<?= $site_domain ?>/watch?v=<?php echo htmlspecialchars($vid['id']); ?>" rel="nofollow">
							<img width="220px" height="132px" title="<?php echo htmlspecialchars($vid['title']); ?>" src="<?= $site_cdn  ?>/thumb/<?php echo htmlspecialchars($vid['thumb']); ?>.jpg" qlicon="lho-EdO4sSY" alt="video 1">
						</a>
					</div></div></div>
					</div>
				</div>
				
	<div class="feedmodule-singleform-info" bis_skin_checked="1">

		<div class="video-title" bis_skin_checked="1">
			<a href="/watch?v=<?php echo htmlspecialchars($vid['id']); ?>" title="video 1"><?php echo htmlspecialchars($vid['title']); ?></a>
		</div>
		<div bis_skin_checked="1"><?php echo htmlspecialchars($vid['views']); ?> views</div>
		<div bis_skin_checked="1">
			<nobr>
			<a href="<?= $site_domain ?>/user/<?php echo htmlspecialchars($vid['author']); ?>"><?php echo htmlspecialchars($vid['author']); ?></a>
			</nobr>
		</div>
		
	</div><?php } ?>

				<div class="spacer" bis_skin_checked="1">&nbsp;</div>
			</div>
			<?php $vids=mysqli_query($sql, "SELECT * FROM `video` WHERE featured = '1' AND DELETED = 0 ORDER BY `id` DESC LIMIT 1, 3");
			while($vid=mysqli_fetch_array($vids)) { ?>
			<!-- VIDEO START -->
			<div class="feeditem-bigthumb normal-size-video " bis_skin_checked="1">
				<div style="font-size: 12px;" class="floatL" bis_skin_checked="1">
					<div class="feedmodule-thumbnail" bis_skin_checked="1">
						<div class="v120WideEntry" bis_skin_checked="1"><div class="v120WrapperOuter" bis_skin_checked="1"><div class="v120WrapperInner" bis_skin_checked="1">
						<a id="video-url-vfxCnZ4Dp3c" href="<?= $site_domain ?>/watch?v=<?php echo htmlspecialchars($vid['id']); ?>" onmousedown="urchinTracker('/Events/Home/PersonalizedHome/POP/Logged_Out');" rel="nofollow">
							<img title="video 2" src="<?= $site_domain ?>/vi/thumb/<?php echo htmlspecialchars($vid['thumb']); ?>.jpg" class="vimg120" qlicon="vfxCnZ4Dp3c" alt="video 2">
						</a>
						</div></div></div>
					</div>
				</div>
			<div class="feedmodule-singleform-info" bis_skin_checked="1">

				<div class="video-title" bis_skin_checked="1">
					<a href="<?= $site_domain ?>/watch?v=<?php echo htmlspecialchars($vid['id']); ?>" onmousedown="urchinTracker('/Events/Home/PersonalizedHome/POP/Logged_Out');" title="Hammer Pants Dance (HD)"><?php echo htmlspecialchars($vid['title']); ?></a>
				</div>
				<div bis_skin_checked="1"><?php echo htmlspecialchars($vid['views']); ?> views</div>
				<div bis_skin_checked="1">
					<nobr>
					<a href="<?= $site_domain ?>/user/<?php echo htmlspecialchars($vid['author']); ?>"><?php echo htmlspecialchars($vid['author']); ?></a>
					</nobr>
				</div>
				
			</div>
				<div class="spacer" bis_skin_checked="1">&nbsp;</div>
			</div><?php } ?>
			<div class="spacer" bis_skin_checked="1">&nbsp;</div>
	</div>
		</div>
	</div>
	<div class="clear" bis_skin_checked="1"></div>
</div><!-- VIDEO END -->
