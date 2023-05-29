	<div id="logoTagDiv">
		<a href="./"><img src="img/logo.jpg" alt="<?php echo $sitetitle; ?>" width="250" height="48" border="0"></a>
	</div>
	<div id="utilDiv">
	<?php if(!isset($_SESSION['loggedin'])) { ?>
			<a href="signup"><strong>Sign Up</strong></a>
			<span class="utilDelim">|</span>
			<a href="login">Log In</a>
			<span class="utilDelim">|</span>
			<a href="discord">Help</a>
	<?php } else{ 
			$name = $sql->real_escape_string($_SESSION['username']); $ok = $sql->query("SELECT * FROM users WHERE username='$name'");
			$loggedu = mysqli_fetch_assoc($ok);?>
			Hi, <a href="profile?user=<?php echo htmlspecialchars($_SESSION["username"]); ?>"><strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong></a>
			<span class="utilDelim">|</span>
			<a href="inbox" <?php if($loggedu['unreadmsg'] == '1') { ?> style='color: red;' <?php } ?>>Messages</a>
			<span class="utilDelim">|</span>
			<a href="channel_settings">Account</a>
			<span class="utilDelim">|</span>
			<a href="discord">Help</a>
			<span class="utilDelim">|</span>
			<a href="logout">Log Out</a>
	<?php } ?>
	<?php if($loggedu['banned'] == '1') { header("Location: /logout"); die("You have been banned!"); } ?>
	</div>

	<div id="searchDiv">
		<form name="searchForm" id="searchForm" method="get" action="/results">
			<input tabindex="1" type="text" name="search" maxlength="128" id="searchField" value="">&nbsp;
			<select name="search_type">
				<option value="yes" 	
 >Everything</option>
			</select>
			<input type="submit" name="search" value="Search">
		</form>
	</div>

	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td>
				<div id="gNavDiv">
						<div class="ltab">
						<b class="rc<?php if(isset($index)) { ?>s<?php } ?>">
						<b class="rcs1"><b></b></b>
						<b class="rcs2"><b></b></b>
						<b class="rcs3"></b>
						<b class="rcs4"></b>
						<b class="rcs5"></b>
						</b> <div class="tabContent<?php if(isset($index)) { ?> selected<?php } ?>">
						<a href="./">Home</a>
						</div>
						</div>
						
						<div class="tab">
						<b class="rc<?php if(isset($video)) { ?>s<?php } ?>">
						<b class="rc1"><b></b></b>
						<b class="rc2"><b></b></b>
						<b class="rc3"></b>
						<b class="rc4"></b>
						<b class="rc5"></b>
						</b> <div class="tabContent<?php if(isset($video)) { ?> selected<?php } ?>">
						<a href="browse">Videos</a>
						</div>
						</div>
						
						<div class="tab">
						<b class="rc<?php if(isset($cats)) { ?>s<?php } ?>">
						<b class="rc1"><b></b></b>
						<b class="rc2"><b></b></b>
						<b class="rc3"></b>
						<b class="rc4"></b>
						<b class="rc5"></b>
						</b> <div class="tabContent<?php if(isset($cats)) { ?> selected<?php } ?>">
						<a href="categories">Categories</a>
						</div>
						</div>
						
						<div class="tab">
						<b class="rc<?php if(isset($group)) { ?>s<?php } ?>">
						<b class="rc1"><b></b></b>
						<b class="rc2"><b></b></b>
						<b class="rc3"></b>
						<b class="rc4"></b>
						<b class="rc5"></b>
						</b> <div class="tabContent<?php if(isset($group)) { ?> selected<?php } ?>">
						<a href="groups">Groups</a>
						</div>
						</div>
						
						<div class="tab">
						<b class="rc<?php if(isset($users)) { ?>s<?php } ?>">
						<b class="rc1"><b></b></b>
						<b class="rc2"><b></b></b>
						<b class="rc3"></b>
						<b class="rc4"></b>
						<b class="rc5"></b>
						</b> <div class="tabContent<?php if(isset($users)) { ?> selected<?php } ?>">
						<a href="members">Members</a>
						</div>
						</div>
						
						<div class="rtab">
						<b class="rc<?php if(isset($upload)) { ?>s<?php } ?>">
						<b class="rc1"><b></b></b>
						<b class="rc2"><b></b></b>
						<b class="rc3"></b>
						<b class="rc4"></b>
						<b class="rc5"></b>
						</b> <div class="tabContent<?php if(isset($upload)) { ?> selected<?php } ?>">
						<a href="my_videos_upload">Upload</a>
						</div>
						</div>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="gSubNavDiv">&nbsp;
						<a href="my_videos" >My Videos</a>
								<span style="padding: 0px 8px;">|</span>
						<a href="my_favorites" >My Favorites</a>
								<span style="padding: 0px 8px;">|</span>
						<a href="inbox" >My Messages</a>
								<span style="padding: 0px 8px;">|</span>
						<a href="subscription_center" >My Subscriptions</a>
								<span style="padding: 0px 8px;">|</span>
						<a href="my_playlists" >My Playlists</a>
								<span style="padding: 0px 8px;">|</span>
						<a href="my_groups" >My Groups</a>
								<span style="padding: 0px 8px;">|</span>
						<a href="profile" >My Profile</a>
					&nbsp;
				</div>
			</td>
		</tr>
	</table>
<?php if(isset($error)) { $_SESSION['error'] = $error; } if(isset($yes)) { $_SESSION['yes'] = $error; } ?>
<?php if(isset($_SESSION['error'])) { ?><div class="errorBox">		<?php echo $_SESSION['error']; unset($_SESSION['error']);?></div><?php } ?>
<?php if(isset($_SESSION['yes'])) { ?><div class="yesBox">		<?php echo $_SESSION['yes']; unset($_SESSION['yes']);?></div><?php } ?>
