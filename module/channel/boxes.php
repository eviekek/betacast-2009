<div id="profile-side-content" bis_skin_checked="1">
	<?php 
		if($user['profile'] == "l") { require 'module/channel/profile.php'; }
		require 'module/channel/connect.php';
		require 'module/channel/recent.php'; 
		if($user['subscriptions'] == "l") { require 'module/channel/channelswatching.php'; }
		if($user['subsbox'] == "l") { require 'module/channel/subsright.php'; }
		if($user['comments'] == "l") { require 'module/channel/comments.php'; }
		if($user['fvid'] == "l") { require 'module/channel/featured.php'; }
	?>
</div>
<div id="profile-main-content" bis_skin_checked="1">
	<?php 
		if($user['profile'] == "r") { require 'module/channel/profile.php'; }
		if($user['fvid'] == "r") { require 'module/channel/featured.php'; }
		require 'module/channel/videosbox.php'; 
		require 'module/channel/favs.php'; 
		if($user['subscriptions'] == "r") { require 'module/channel/channelswatching.php'; }
		if($user['subsbox'] == "r") { require 'module/channel/subsright.php'; }
		if($user['comments'] == "r") { require 'module/channel/comments.php'; }
	?>
</div>
