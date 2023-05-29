<div class="profile-box" id="user_connect" bis_skin_checked="1">
	<div class="box-head" bis_skin_checked="1">
	<div class="box-fg" bis_skin_checked="1">
			<div class="headerTitleRight floatR" bis_skin_checked="1">
			</div>
			<div class="headerTitle  channel-box-title" id="user_connect-head" bis_skin_checked="1">
				Connect with <?php echo htmlspecialchars($username) ?>
			</div>
			<div class="clear" bis_skin_checked="1"></div>
	</div>
	<div class="box-bg" bis_skin_checked="1"></div>
	</div>
			<div class="box-body" id="user_connect-body" bis_skin_checked="1">
				<div class="box-fg" bis_skin_checked="1">
	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="connectTable">
		<tbody><tr>
			<td align="right" width="110" valign="middle">
			</td>
						<td align="left" valign="top">
							<table class="actionsTable">
								<tbody><tr class="actionsTable">
									<td class="actionsTable">
										<div class="smallText" bis_skin_checked="1">
										<a id="aProfileSendMsg" href="/inbox?to=<?php echo htmlspecialchars($username) ?>"><img src="http://s.ytimg.com/yt/img/pixel-vfl73.gif" id="profileSendMsg" class="icnProperties" alt="Send Message">Send Message</a>
										</div>
										<div class="smallText" bis_skin_checked="1">
											<a id="aProfileAddComment" href="/profile_comment_post?user=<?php echo htmlspecialchars($username) ?>" onclick="urchinTracker('/Events/Channels/UserConnectAddComment');"><img src="http://s.ytimg.com/yt/img/pixel-vfl73.gif" id="profileAddComment" class="icnProperties" alt="Add Comment">Add Comment</a>
										</div>

										<div class="smallText" bis_skin_checked="1">
											<a id="aProfileFwdMember" href="#" onclick="toggleDisplay('sharing_opt'); return false;"><img src="http://s.ytimg.com/yt/img/pixel-vfl73.gif" id="profileFwdMember" class="icnProperties" alt="Share Channel">Share Channel</a>
										</div>
										<div class="smallText" bis_skin_checked="1">
											
										</div>

									
									</td>
								</tr>
							</tbody></table>
						</td>
					</tr>

					<tr>
						<td colspan="2">
							<div class="alignC" style="font-size: 12px; margin-bottom: 3px" bis_skin_checked="1"><a id="user-connect-vanity-url" href="<?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>">https://www.betacast.cc<?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?></a></div>
						</td>
					</tr>
					<tr>
</tbody></table>
					<div class="clear" bis_skin_checked="1"></div>
				</div>
				<div class="box-bg" bis_skin_checked="1"></div>
			</div>
</div>
