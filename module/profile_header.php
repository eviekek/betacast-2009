		<tr>
			<td width="104" valign="absmiddle"><a href="/"><img style="border: 0px" src="/vi/static/chlogo.jpg" width="104px" height="37px" /></a></td>			
			<td valign="absmiddle" nowrap>
				<div style="text-align: left; padding-top: 15px; padding-left: 5px;">
					<a href="/" class="masthead">Home</a> | 
					<a href="/browse?s=mp" class="masthead">Videos</a> | 
					<a href="/members" class="masthead">Channels</a> |
					<a href="/groups" class="masthead">Groups</a> | 
				 	<a href="/categories" class="masthead">Categories</a> | 
				 	<a href="/my_videos_upload" class="masthead">Upload</a>
				</div>
			</td>
			<td valign="top" style="text-align: right; font-family: Arial, Helvetica, sans-serif;">			
				<div>
						<?php if(!isset($_SESSION['loggedin'])) { ?>
							<a href="/signup" class="headerLink"><strong>Sign Up</strong></a>
							|
							<a href="/login?next=/profile%3Fuser%3D<?php echo $username ?>" class="headerLink">Log In</a>
						<?php } else{ 
							$loggedname = $sql->real_escape_string($_SESSION['username']); $ok = $sql->query("SELECT * FROM users WHERE username='$loggedname'");
							$loggedu = mysqli_fetch_assoc($ok);?>
							<a href="/user/<?php echo htmlspecialchars($_SESSION["username"]); ?>" class="headerLink"><strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong></a>
							|
							<a href="/logout?next=/profile%3Fuser%3D<?php echo $username ?>" class="headerLink">Log Out</a>
						<?php } ?>
						|
						<a href="/channel_settings" class="headerLink">My Account</a>
						|
						<a href="/help" class="headerLink">Help</a>
				</div>
				<form name="logoutForm" method="post" action="/index" style="margin-bottom: 0px;">
					<input type="hidden" name="action_logout" value="1">
				</form>
				<div class="searchDiv">
					<form name="searchForm" id="searchForm" method="get" action="/results">
						<span class="smallLabel">Search for&nbsp;</span>
						<input tabindex="10000" type="text" name="search_query" maxlength="128" id="searchField" value="">&nbsp;
						<input type="submit" name="search" value="Search">
					</form>
				</div>
			</td>		
		</tr>
