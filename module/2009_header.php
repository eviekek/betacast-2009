<?php if(isset($_SESSION['loggedin'])) { $loggedname = $_SESSION['username'];
$last = strtotime(date('Y/m/d H:i:s'));
// mysqli_query($sql, "UPDATE `users` SET `lastlogin` = '$last' WHERE `users`.`username` = '$loggedname'"); 
} ?>
<!--<div style="background:#f0f0f0;border-bottom:1px solid #989898;text-align:center;padding:4px 0;margin-bottom:3px" bis_skin_checked="1">BetaCast will be shut down and all data will be transferred to another site in one hour.</div>-->
<div id="masthead" bis_skin_checked="1">
		<div id="masthead-inner" bis_skin_checked="1">
				<a href="<?= $site_domain ?>/" onmousedown="urchinTracker('/Events/Header_3/YouTubeLogo');" id="logo"><button onclick="window.top.location.href='<?= $site_domain ?>'; return false;" class="master-sprite" title=""></button></a>
			<div id="region-and-language-picker-links-wrapper" bis_skin_checked="1">
				<button id="slogan" class="master-sprite" title=""></button>
				<span class="util-item first with-flag"><a href="#" class="region-picker-link hLink" onclick="loadFlagImgs('region-picker-box'); return false;" onmousedown="urchinTracker('/Events/Header/UtilLinks/I18n/text');">Worldwide</a></span>
				<span class="util-item"><a href="#" class="language-picker-link hLink" onclick="loadFlagImgs('language-picker-box'); return false;" onmousedown="urchinTracker('/Events/Header/UtilLinks/I18n/text');">English</a></span>
			</div>
			<div class="user-info" bis_skin_checked="1">
	<div id="util-links" class="normal-utility-links" bis_skin_checked="1">
		<?php if(!isset($_SESSION['loggedin'])) { ?>
				<span class="util-item first"><b><a class="hLink" href="<?= $site_domain ?>/signup" onmousedown="urchinTracker('/Events/Header/UtilLinks/SignUp');">Sign Up</a></b></span>
				<span class="util-item"><a class="hLink" href="<?= $site_domain ?>/discord" onmousedown="urchinTracker('/Events/Header/UtilLinks/Help');">Help</a></span>
				<span class="util-item"><a class="hLink" href="<?= $site_domain ?>/login?next=<?= $site_domain ?>/" onmousedown="urchinTracker('/Events/Header/UtilLinks/SignIn');">Sign In</a></span>
		<?php } else{ 
			$name = $sql->real_escape_string($_SESSION['username']); $ok = $sql->query("SELECT * FROM users WHERE username='$name'");
			$loggedu = mysqli_fetch_assoc($ok); ?>
			<span class="util-item first">
			<span class="yt-menulink yt-menulink-primary" onmouseenter="this.className += ' yt-menulink-primary-hover';" onmouseleave="this.className = this.className.replace(' yt-menulink-primary-hover', '');">
				<a class="yt-menulink-btn yt-button yt-button-primary" href="/user/<?php echo htmlspecialchars($_SESSION['username']) ?>"><?php echo htmlspecialchars($_SESSION['username']) ?></a>
				<a class="yt-menulink-arr" href="/user/<?php echo htmlspecialchars($_SESSION['username']) ?>"></a>
				<ul class="yt-menulink-menu">
					<li><a href="<?= $site_domain ?>/account">Account</a></li>
					<li><a href="<?= $site_domain ?>/my_videos">My Videos</a></li>
					<li><a href="<?= $site_domain ?>/account?m=ps">Profile Setup</a></li>
					<?php if($loggedu['super_admin'] == '1') { echo ' <li><a href="/admin">Old Admin Panel</a></li>'; } ?>
				</ul>  
			</span>
			</span>
			<span class="util-item"><a class="hLink" href="<?= $site_domain ?>/logout">Logout</a></span>
		<?php }?>
	</div>
			</div>
			<div id="masthead-region-and-language-picker-box" style="display: none;" bis_skin_checked="1">Loading...</div>
			<div class="clear" bis_skin_checked="1"></div>
		</div>
		
		<div id="bar" class="master-sprite" bis_skin_checked="1">
			<div id="bar-inner" bis_skin_checked="1">
				<a class="master-sprite nav-item" href="<?= $site_domain ?>/" onmousedown="urchinTracker('/Events/Header_3/MainTabs/HomeTab');">Home</a>
				<a class="master-sprite nav-item" href="<?= $site_domain ?>/browse" onmousedown="urchinTracker('/Events/Header_3/MainTabs/VideosTab');">Videos</a>
				<a class="master-sprite nav-item" href="<?= $site_domain ?>/members" onmousedown="urchinTracker('/Events/Header_3/MainTabs/ChannelsTab');">Channels</a>
				<a class="master-sprite nav-item" href="<?= $site_domain ?>/groups" onmousedown="urchinTracker('/Events/Header_3/MainTabs/CommunityTab');">Community</a>
				<div id="masthead-bar-contents" bis_skin_checked="1">
	<form autocomplete="on" class="search-form" action="<?= $site_domain ?>/results" method="get" name="searchForm">
		<input id="search-type-masthead" name="search_type" type="hidden" value="">
		<input id="masthead-search-term" class="search-term" name="search_query" type="text" tabindex="1" onkeyup="top.goog.i18n.bidi.setDirAttribute(event,this)" value="" maxlength="128" onkeydown="searchBarFocusTest(event);" onfocus="addClass(this, 'search-term-focus')" onblur="removeClass(this, 'search-term-focus')" autocomplete="off">
		<a class="yt-button yt-button-primary" id="" style="" href="#" onclick="document.searchForm.submit(); return false;"><span>Search</span></a>
	<input type="hidden" name="aq" value="f"><input type="hidden" name="oq" value="" disabled=""></form>
		<script>
			_gel('masthead-search-term').focus();
		</script>
			<span class="yt-menubutton-urgent" id="upload-button" style="" onmouseenter="this.className += ' yt-menubutton-urgent-hover';" onmouseleave="this.className = this.className.replace(' yt-menubutton-urgent-hover', '');">
					<a class="yt-menubutton-btn yt-button yt-button-urgent" href="<?= $site_domain ?>/upload_video" onclick="urchinTracker('/Events/Header/UploadButton');">
						<span>Upload</span></a>
					<ul class="yt-menubutton-menu"><li><a href="<?= $site_domain ?>/upload_video">Upload Video File</a></li></ul></span>
				</div>
				<div class="clearL" bis_skin_checked="1"></div>
			</div>	
		</div>	
		<div class="clear" bis_skin_checked="1"></div>
		<?php if($loggedu['banned'] == '1') { header("Location: /logout"); die("You have been banned!"); } ?>
	</div>

	
