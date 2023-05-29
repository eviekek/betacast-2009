<div>
	<table align="center" cellpadding="0" cellspacing="0" border="0" class="profileSubLinks">
		<tr>
			<td>
					<span class="profileSubLinks"><a href="<?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>">Channel</a></span>
			</td>
			<td style="padding: 0px 5px 0px 5px;"><span class="profileSubLinks">|</span></td>
			<td>
					<span class="profileSubLinks"><a href="<?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>/videos">Videos</a></span>
			</td>
			<td style="padding: 0px 5px 0px 5px;"><span class="profileSubLinks">|</span></td>
			<td>
					<span class="profileSubLinks"><a href="<?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>/favorites">Favorites</a></span>
			</td>
			<td style="padding: 0px 5px 0px 5px;"><span class="profileSubLinks">|</span></td>
			<td>
						<span class="profileSubLinks"><a href="<?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>/playlist">Playlists</a></span>
			</td>
			<td style="padding: 0px 5px 0px 5px;"><span class="profileSubLinks">|</span></td>
			<td>
					<span class="profileSubLinks"><a href="<?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>/subscribers">Subscribers</a></span>
			</td>
			<td style="padding: 0px 5px 0px 5px;"><span class="profileSubLinks">|</span></td>
			<td>
						<span class="profileSubLinks"><a href="<?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>/subscriptions">Subscriptions</a></span>
			</td>
			<td style="padding: 0px 5px 0px 5px;"><span class="profileSubLinks">|</span></td>
			<td>
						<span class="profileSubLinks"><a href="<?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>/comment_all">Comments</a></span>
			</td>
		</tr>
	</table>
</div>
