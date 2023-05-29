<?php if($isdelete) { ?> <div id="watch-video-response" bis_skin_checked="1">
Favorite removed!
</div><?php } ?>
<?php if($hasbeenaddedtofavs) { ?> <div id="watch-video-response" bis_skin_checked="1">
Favorite added!
</div><?php } ?>
	<form id="fav" style="display:none" action="/watch?v=<?php echo $_GET['v']; ?>" method="POST">
			<table cellpadding="4px" style="position:relative;right:4px">
			<tbody><tr>
				<td><textarea maxlength="500" name="fav" cols="66" rows="6">this</textarea></td>
			</tr>
			<tr>
				<td><input type="submit" name="post_comment" value="Post Comment"></td>
			</tr>
		</tbody></table></form>
<div id="watch-ratings-views" bis_skin_checked="1">
	<div id="watch-rating-div" bis_skin_checked="1">
		<script language="javascript">
		document.getElementById('watch-rating-div').onmouseover = function() { hideDiv('defaultRatingMessage'); showDiv('hoverMessage'); };
		document.getElementById('watch-rating-div').onmouseout = function() { showDiv('defaultRatingMessage'); hideDiv('hoverMessage'); };
		</script>
			<div id="ratingWrapper" bis_skin_checked="1"><div class="floatL" onclick="urchinTracker('/Events/VideoWatch/Rated');" bis_skin_checked="1"><div id="ratingStars" class="floatL" bis_skin_checked="1">
				<!--<button class="master-sprite ratingL ratingL-4.5" title="4.5"></button></div><div id="ratingMessage" bis_skin_checked="1"><div id="defaultRatingMessage" bis_skin_checked="1" class="" style=""><span class="smallText">7,916 ratings</span></div><div id="hoverMessage" style="width: 100%; display: none;" class="hid" bis_skin_checked="1"><a href="/web/20090802183845/https://www.youtube.com/login?next=/watch%3Fv%3DWfYyBp4Ln2s">Sign in</a> to rate</div>--></div></div></div>
			</div>
		<div id="watch-views-div" bis_skin_checked="1">
				<span id="watch-views"><span id="watch-view-count"><?php echo htmlspecialchars($video['views']) ?></span> views</span>
		</div>
		<div class="clear" bis_skin_checked="1"></div>
	</div>
<div id="watch-main-area" bis_skin_checked="1">
		<div id="watch-actions-area" bis_skin_checked="1">
			<div class="watch-tabs master-sprite" bis_skin_checked="1">
				<div id="watch-tab-favorite" class="watch-tab" onclick="document.getElementById('fav').submit();" bis_skin_checked="1">
					<a id="watch-action-favorite-link" href="#" class="watch-action-link" onclick="return false;">
						<button id="watch-action-favorite" class="master-sprite" title="Favorite"></button>
						<span class="watch-action-text"><?php $adsasaasasd=mysqli_query($sql, "SELECT * FROM `favorites` WHERE userid = '$loggedinuserid' AND video = '$videoid'");
						while($vidasdsadsaasdsa=mysqli_fetch_array($adsasaasasd)) { echo 'Remove '; }?>Favorite</span>
					</a>
					<button class="master-sprite watch-tab-arrow" title=""></button></div>
				<div id="watch-tab-share" onclick="if (hasClass(this, 'watch-tab-sel') &amp;&amp; !isDisplayed('watch-share-video-div')) {urchinTracker('/Events/VideoWatch/ShareTab/OpensMore/fr_FR');processShareVideo('WfYyBp4Ln2s','watch-share-video-div', 'all');} else { resetSharing(); } watchSelectTab(this);" class="watch-tab watch-tab-sel" bis_skin_checked="1">
					<a id="watch-action-share-link" href="#" class="watch-action-link" onclick="return false;">
						<button id="watch-action-share" class="master-sprite" title="Share"></button>
						<span class="watch-action-text">Share</span>
					</a>
					<button class="master-sprite watch-tab-arrow" title=""></button></div>
				<div id="watch-tab-playlists" class="watch-tab" onclick="addToPlaylist('WfYyBp4Ln2s');" bis_skin_checked="1">
					<a id="watch-action-playlists-link" href="#" class="watch-action-link" onclick="return false">
						<button id="watch-action-playlists" class="master-sprite" title="Add to Playlists"></button>
						<span class="watch-action-text">Playlists</span>
					</a>
					<button class="master-sprite watch-tab-arrow" title=""></button></div>
				<div id="watch-tab-flag" class="watch-tab " onclick="if (!hasClass(this, 'disabled')) { reportConcern('WfYyBp4Ln2s'); }" title="Report video as inappropriate" bis_skin_checked="1">
					<a id="watch-action-flag-link" href="#" class="watch-action-link" onclick="return false">
						<button id="watch-action-flag" class="master-sprite" title="Report video as inappropriate"></button>
						<span class="watch-action-text">Flag</span>
					</a>
					<button class="master-sprite watch-tab-arrow" title=""></button></div>
				<div class="clear" bis_skin_checked="1"></div>
			</div>

			<div class="watch-tab-contents" bis_skin_checked="1">
				<div id="watch-tab-share-body" class="watch-tab-body watch-tab-sel" bis_skin_checked="1">
					<div id="aggregationServicesDiv" bis_skin_checked="1">
						<div id="watch-sharetab-options" bis_skin_checked="1">
							<div id="more-options" bis_skin_checked="1"><a href="#" class="eLink" onclick="urchinTracker('/Events/VideoWatch/Share/MoreOptions/fr_FR');processShareVideo('WfYyBp4Ln2s','watch-share-video-div', 'all'); return false;" rel="nofollow">(more share options)</a></div>
							
							<div style="display: none;" id="fewer-options" bis_skin_checked="1"><a href="#" class="eLink" onclick="resetSharing(); return false;" rel="nofollow">fewer share options</a></div>
						</div>

						<div id="watch-share-services-collapsed" bis_skin_checked="1">
										<div class="watch-recent-shares-div" bis_skin_checked="1">
				<div class="watch-recent-share" bis_skin_checked="1">

						<a href="#" target="_blank" onclick="recordServiceUsage('SKYBLOG', 'WfYyBp4Ln2s', 'fr_FR');openPopup('https://web.archive.org/web/20090802183845/http://skyrock.com/m/blog/share-widget.php?idp=10&amp;idm=WfYyBp4Ln2s&amp;title=Doin%27%20Your%20Mom%20%28song%29', 'YouTube', 650, 1024, true);urchinTracker('/Events/VideoWatch/ShareAggr/Skyrock/fr_FR');return false;">
							<span>Skyrock</span>
						</a>

				</div>
			</div>
			<div class="watch-recent-shares-div" bis_skin_checked="1">
				<div class="watch-recent-share" bis_skin_checked="1">

						<a href="#" target="_blank" onclick="recordServiceUsage('FACEBOOK', 'WfYyBp4Ln2s', 'fr_FR');openPopup('https://web.archive.org/web/20090802183845/http://www.facebook.com/sharer.php?u=http%3A//www.youtube.com/watch%3Fv%3DWfYyBp4Ln2s&amp;t=Doin%27%20Your%20Mom%20%28song%29', 'YouTube', 440, 620, true);urchinTracker('/Events/VideoWatch/ShareAggr/Facebook/fr_FR');return false;">
							<span>Facebook</span>
						</a>

				</div>
			</div>
			<div class="watch-recent-shares-div" bis_skin_checked="1">
				<div class="watch-recent-share" bis_skin_checked="1">

						<a href="#" target="_blank" onclick="recordServiceUsage('MYSPACE', 'WfYyBp4Ln2s', 'fr_FR');openPopup('https://web.archive.org/web/20090802183845/http://www.myspace.com/Modules/PostTo/Pages/?t=Doin%27%20Your%20Mom%20%28song%29&amp;c=%3Cobject%20width%3D%22425%22%20height%3D%22355%22%3E%3Cparam%20name%3D%22movie%22%20value%3D%22http%3A//www.youtube.com/v/WfYyBp4Ln2s%26hl%3Den%26rel%3D0%22%3E%3C/param%3E%3Cembed%20src%3D%22http%3A//www.youtube.com/v/WfYyBp4Ln2s%26hl%3Den%26rel%3D0%22%20type%3D%22application/x-shockwave-flash%22%20width%3D%22425%22%20height%3D%22355%22%3E%3C/embed%3E%3C/object%3E&amp;u=http%3A//www.youtube.com/watch%3Fv%3DWfYyBp4Ln2s&amp;l=1', 'YouTube', 650, 1024, true);urchinTracker('/Events/VideoWatch/ShareAggr/MySpace/fr_FR');return false;">
							<span>MySpace</span>
						</a>

				</div>
			</div>


							<div class="clear" bis_skin_checked="1"></div>
						</div>
				</div> 					<div id="addToBlogResult" class="watch-action-result" style="display: none;" bis_skin_checked="1">This video will appear on your blog shortly.</div>
					<div id="watch-share-video-div" class="watch-more-action" style="display: none;" bis_skin_checked="1">Loading...</div>
					<div id="shareVideoEmailDiv" class="watch-more-action martT0" style="display: none;" bis_skin_checked="1">Loading...</div>
					<div id="shareMessageQuickDiv" class="watch-more-action" style="display: none;" bis_skin_checked="1">Loading...</div>
					<div id="watch-share-blog-quick" class="watch-more-action" style="display: none;" bis_skin_checked="1">Loading...</div>
					<div id="shareVideoResult" class="watch-action-result" style="display: none;" bis_skin_checked="1">Thank you for sharing this video!</div>
				</div>					<div id="watch-tab-favorite-body" class="watch-tab-body" bis_skin_checked="1">
				</div>
			</div> 			<div class="clear" bis_skin_checked="1"></div>
		</div> 
	</div>
<?php
$videoid = $video['id'];
mysqli_query($sql, 'DELETE FROM comments WHERE fromuser = "";');
	$total_records_per_page = 10;
		if (isset($_GET['p']) && $_GET['p']!="") {
			$page_no = $_GET['p'];
		} else {
			$page_no = 1;
		}
		$offset = ($page_no-1) * $total_records_per_page;
		$previous_page = $page_no - 1;
		$next_page = $page_no + 1;
		$adjacents = "2";
			$comments=mysqli_query($sql, "SELECT * FROM `comments` WHERE touser = '$videoid' ORDER BY `id` DESC");
			$count=mysqli_query($sql, "SELECT * FROM `comments` WHERE touser = '$videoid' ORDER BY `id` DESC");
			$total_records = 0;
			while($commentse=mysqli_fetch_array($count)) {
				$total_records = $total_records + 1;
			}
			$total_no_of_pages = ceil($total_records / $total_records_per_page);
			$second_last = $total_no_of_pages - 1; // total pages minus 1
?>
<div id="watch-comment-panel" class="expand-panel small-expand-panel expanded" onexpanded="watchExpandComments('/watch_ajax?v=WfYyBp4Ln2s&amp;action_get_comments=1&amp;p=1&amp;commentthreshold=-5&amp;commentfilter=0&amp;page_size=10&amp;last_comment_id=', 3282)" oncollapsed="watchCommentsPanelStateChange()" bis_skin_checked="1">
		<div id="watch-comment-post-comment" bis_skin_checked="1">
				<a href="#" class="hLink smallText" onclick="showCommentReplyForm('main_comment2', '', false); urchinTracker('/Events/VideoWatch/PostTextCommentSignin'); return false;" id="post_text_comment_link" rel="nofollow">Sign in to post a Comment</a>
		</div>
		<a href="#" onclick="togglePanel(this.parentNode); this.blur(); return false;" class="expand-header"><button title="" class="master-sprite"></button><span>Text Comments (<?php echo $total_records; ?>)</span></a>&nbsp;&nbsp;
		<div class="clear" bis_skin_checked="1"></div>
		<?php if($_SESSION['commentgotposted'] == 1) { 
		$_SESSION['commentgotposted'] = 0; ?>
		<div id="watch-comments-options" bis_skin_checked="1">
			<div id="watch-comments-options-inner" bis_skin_checked="1">Your comment was posted!</div>
		</div>
		<?php } ?>
		<div class="expand-content" bis_skin_checked="1">
			<div id="div_main_comment2" bis_skin_checked="1"></div>
			<div id="recent_comments" class="comments" bis_skin_checked="1">
				
	<?php 	while($comment=mysqli_fetch_array($comments)) {
			$commenter = $sql->real_escape_string($comment['fromuser']);
			$commentersql = $sql->query("SELECT * FROM users WHERE username='$commenter'");
			$commenter = mysqli_fetch_assoc($commentersql);		
			?>
	<div id="yasQvgZtVQpUCwH2pGFYfBcM6Qnd9KRj-Q89AES1fMY" class="watch-comment-entry" bis_skin_checked="1">
		<div class="watch-comment-head" bis_skin_checked="1">
			<div class="watch-comment-info" bis_skin_checked="1">
				<a class="watch-comment-auth" href="<?php if(!empty($commenter['username'])) { ?><?php if(empty($commenter['vanity'])) { echo "/user/".htmlspecialchars($comment['fromuser']); } else{ echo "/".$commenter['vanity']; } } ?>" rel="nofollow"><?php if(!empty($commenter['username'])) {  echo htmlspecialchars($commenter['username']); } else{ echo 'Deleted user'; }?></a>
				<span class="watch-comment-time"> (<?php echo date("M d, Y", strtotime($comment['date'])); ?>) </span>
				<a id="show_link_yasQvgZtVQpUCwH2pGFYfBcM6Qnd9KRj-Q89AES1fMY" class="watch-comment-head-link" onclick="displayHideCommentLink('yasQvgZtVQpUCwH2pGFYfBcM6Qnd9KRj-Q89AES1fMY')">Show</a>
				<a id="hide_link_yasQvgZtVQpUCwH2pGFYfBcM6Qnd9KRj-Q89AES1fMY" class="watch-comment-head-link" onclick="displayShowCommentLink('yasQvgZtVQpUCwH2pGFYfBcM6Qnd9KRj-Q89AES1fMY')">Hide</a>
			</div>
	<span id="comment_spam_bug_yasQvgZtVQpUCwH2pGFYfBcM6Qnd9KRj-Q89AES1fMY" class="watch-comment-spam-bug">Marked as spam</span>
			<div class="clearL" bis_skin_checked="1"></div>
		</div>
			<div id="comment_body_yasQvgZtVQpUCwH2pGFYfBcM6Qnd9KRj-Q89AES1fMY" bis_skin_checked="1">
				<div class="watch-comment-body" bis_skin_checked="1">
					<div bis_skin_checked="1">
						<?php echo htmlspecialchars($comment['text']) ?>
					</div>
				</div>
				<div id="div_comment_form_id_yasQvgZtVQpUCwH2pGFYfBcM6Qnd9KRj-Q89AES1fMY" bis_skin_checked="1"></div>
			</div>
	</div> <?php } ?><hr>
			<!-- porn <?php echo $_SESSION['username']; ?> -->
			<?php if(!isset($_SESSION['loggedin'])) { ?>
			<h2 class="commentHeading">Would you like to Comment?</h2>
			<div style="margin-top: 8px;">
			<a href="/signup">Join BetaCast</a> for a free account, or
			<a href="/login">Login</a> if you are already a member.
			</div>
		<?php } else{ ?>
			<form action="/watch?v=<?php echo $_GET['v']; ?>" method="POST">
			<table cellpadding="4px" style="position:relative;right:4px">
			<tbody><tr><?php $_SESSION['commentkey'] = random_int(11119, 99999); ?>
				<td><textarea maxlength="500" name="msg" cols="66" rows="6"></textarea></td>
				<td><textarea style="display: none;" maxlength="500" name="touser" cols="66" rows="6"><?php echo $_GET['v']; ?></textarea></td>
				<td><textarea style="display: none;" maxlength="500" name="keys" cols="66" rows="6"><?php echo $_SESSION['commentkey']; ?></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" name="post_comment" value="Post Comment"></td>
			</tr>
		</tbody></table></form><?php } ?>
				<div id="div_main_comment" bis_skin_checked="1"></div>

		</div> 	</div>
