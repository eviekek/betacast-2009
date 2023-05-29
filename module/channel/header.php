<table class="channelMastheadTable" cellpadding="0" cellspacing="0">
		<tbody><tr>
			<td width="104" valign="absmiddle"><a href="/"><img id="smallMastheadLogo" src="http://s.ytimg.com/yt/img/pixel-vfl73.gif"></a></td>
			<td valign="top" nowrap="">
				<span class="yt-menulink yt-menulink-primary" id="small-masthead-language-menulink" style=""><a class="yt-menulink-btn yt-button yt-button-primary" href="#" onclick="return false;">English</a><a class="yt-menulink-arr" href="#" onclick="return false;"></a>  </span>
				<div id="small-masthead-tabs" bis_skin_checked="1">
					<a class="masthead" href="<?= $site_domain ?>/browse">Videos</a> |
					<a class="masthead" href="<?= $site_domain ?>/members">Channels</a> |
					<a class="masthead" href="<?= $site_domain ?>/groups">Community</a> |
					<a href="<?= $site_domain ?>/upload_video" class="masthead">Upload</a>
				</div>
			</td>
			<td valign="top" width="100%">
				<div width="100%" class="alignR floatR" bis_skin_checked="1">
	<div id="util-links" class="small-utility-links" bis_skin_checked="1">
		<?php if(!isset($_SESSION['loggedin'])) { ?>
			<span class="util-item first"><b><a class="hLink" href="<?= $site_domain ?>/signup">Sign Up</a></b></span>
			<span class="util-item"><a class="hLink" href="<?= $site_domain ?>/discord" onmousedown="urchinTracker('/Events/Header/UtilLinks/Help');">Help</a></span>
			<span class="util-item"><a class="hLink" href="<?= $site_domain ?>/login">Sign In</a></span>
		<?php } else{ 
			$loggedname = $sql->real_escape_string($_SESSION['username']); $ok = $sql->query("SELECT * FROM users WHERE username='$loggedname'");
			$loggedu = mysqli_fetch_assoc($ok);?>
			<span class="util-item first">
			<span class="yt-menulink yt-menulink-primary" onmouseenter="this.className += ' yt-menulink-primary-hover';" onmouseleave="this.className = this.className.replace(' yt-menulink-primary-hover', '');">
				<a class="yt-menulink-btn yt-button yt-button-primary" href="/user/<?php echo htmlspecialchars($_SESSION['username']) ?>"><?php echo htmlspecialchars($_SESSION['username']) ?></a>
				<a class="yt-menulink-arr" href="<?= $site_domain ?>/user/<?php echo htmlspecialchars($_SESSION['username']) ?>"></a>
				<ul class="yt-menulink-menu">
					<li><a href="<?= $site_domain ?>/account">Account</a></li>
					<li><a href="<?= $site_domain ?>/my_videos">My Videos</a></li>
					<li><a href="<?= $site_domain ?>/account?m=ps">Profile Setup</a></li>
					<?php if($loggedu['super_admin'] == '1') { echo ' <li><a href="/admin">Old Admin Panel</a></li>'; } ?>
				</ul>  
			</span></span>
			<span class="util-item"><a class="hLink" href="/account" onmousedown="urchinTracker('/Events/Header/UtilLinks/Help');">My Account</a></span>
			<span class="util-item"><a class="hLink" href="/discord" onmousedown="urchinTracker('/Events/Header/UtilLinks/Help');">Help</a></span>
			<span class="util-item"><a class="hLink" href="/logout" onmousedown="urchinTracker('/Events/Header/UtilLinks/Help');">Logout</a></span>
		<?php } ?>
	</div>
		<div class="searchDiv" style="padding-top:1px; clear: right; float: right" bis_skin_checked="1">
	<form autocomplete="&quot;off&quot;" name="searchForm" id="searchForm" method="get" action="/results">
		<input tabindex="10000" type="text" onkeyup="&quot;top.goog.i18n.bidi.setDirAttribute(event,this)&quot;" name="search_query" maxlength="128" class="searchField" value="">
		<a class="yt-button" id="" style="" href="#" onclick="document.searchForm.submit(); return false;"><span>Search</span></a>
	</form>
		</div>
				</div>
			</td>
		</tr>
	</tbody></table>
<div class="clear" bis_skin_checked="1"><img id="smallMastheadBottom" src="http://s.ytimg.com/yt/img/pixel-vfl73.gif"></div>
<br id="mastheadBreak">
<?php $filename = "vi/banners/".$username.".jpg";
if(file_exists($filename)) { ?><center>
<div class="advertiserBanner" bis_skin_checked="1"><a href="" bis_skin_checked="1" bis_size="{&quot;x&quot;:514,&quot;y&quot;:114,&quot;w&quot;:875,&quot;h&quot;:17,&quot;abs_x&quot;:514,&quot;abs_y&quot;:114}">
	<img src="<?= $site_domain ?>/vi/banners/<?php echo $username ?>.jpg" width="875" height="140" bis_size="{&quot;x&quot;:514,&quot;y&quot;:53,&quot;w&quot;:875,&quot;h&quot;:75,&quot;abs_x&quot;:514,&quot;abs_y&quot;:53}" bis_id="bn_gpz1ts4mqti8n8qd0br2au"></a>
</div>
</center><br><?php } ?>
<div class="profileTitleLinks" bis_skin_checked="1">
			<div id="profileSubNav" bis_skin_checked="1">
				<a href="<?= $site_domain ?><?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>">Channel</a><span class="delimiter">|</span>
				<a href="<?= $site_domain ?><?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>/videos">Videos</a><span class="delimiter">|</span>
				<a href="<?= $site_domain ?><?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>/favorites">Favorites</a><span class="delimiter">|</span>
				<a href="<?= $site_domain ?><?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>/playlists">Playlists</a><span class="delimiter">|</span>
				<a href="<?= $site_domain ?><?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>/subscribers">Subscribers</a><span class="delimiter">|</span>
				<a href="<?= $site_domain ?><?php if(empty($user['vanity'])) { echo "/user/".htmlspecialchars($username); } else{ echo "/".$user['vanity']; } ?>/subscriptions">Subscriptions</a></div>
			</div>
<style>
body {
	background-color: #ffffff;
	margin-top: 0px;
	margin-height: 0px;<?php $filename = "vi/bg/".$username.".jpg";
	if(file_exists($filename)) { ?>
	background: url("<?= $site_cdn  ?>/bg/<?= $username ?>.jpg") no-repeat;
    background-size: cover;
    background-repeat: repeat-y;<?php } ?>
}</style>
