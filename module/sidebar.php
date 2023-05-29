<div id="standardSidebar" style="width: 175px;">
	<?php if(isset($_SESSION['loggedin'])) { ?>
	<div class="headerRCBox">
	<b class="rch">
	<b class="rch1"><b></b></b>
	<b class="rch2"><b></b></b>
	<b class="rch3"></b>
	<b class="rch4"></b>
	<b class="rch5"></b>
	</b>
	<div class="content">		
		<div style="text-align: center;">
			<span class="headerTitle">Hi, <?php echo htmlspecialchars($_SESSION['username']) ?></span>
		</div>
	</div>
	</div>
	<div class="contentBox" style="text-align: center; margin-bottom: 15px;">
		<!--
		<div id="set_of_links"><a href="javascript:;"><strong>New Video Watch Page</strong><span>Just choose the video you want to see, and then click on "Watch this video on our new Video Watch Page" link in the top right corner to see how it will look with the new design.</span></a><br />Check out the new design&#8212;we'd love your feedback!</div> 
		-->
		<?php $name = $sql->real_escape_string($_SESSION['username']);
		$ok = $sql->query("SELECT * FROM users WHERE username='$name'");
		$logged = mysqli_fetch_assoc($ok); ?><?php echo $logged['subs'] ?> subscribers
		<span class="largeText"><br><strong><a href="profile?user=<?php echo htmlspecialchars($logged['username']) ?>">Your Profile</a></strong></span>
		<?php if($logged['admin'] == '1') { ?><span class="largeText"><br><strong><a href="admin">Admin Panel</a></strong></span><?php } ?>
	</div><?php } ?>
<div class="headerRCBox">
	<b class="rch">
	<b class="rch1"><b></b></b>
	<b class="rch2"><b></b></b>
	<b class="rch3"></b>
	<b class="rch4"></b>
	<b class="rch5"></b>
	</b>
	<div class="content">		
		<div style="text-align: center;">
			<img src="img/new_features.gif" border="0" />
		</div>
	</div>
</div>
	<div class="contentBox" style="text-align: center; margin-bottom: 15px;">
		<!--
		<div id="set_of_links"><a href="javascript:;"><strong>New Video Watch Page</strong><span>Just choose the video you want to see, and then click on "Watch this video on our new Video Watch Page" link in the top right corner to see how it will look with the new design.</span></a><br />Check out the new design&#8212;we'd love your feedback!</div> 
		-->
		<b><a href="/blog">Welcome to BetaCast</a></b><br/>
		Check out the new site&#8212;we'd love your feedback!
		<span class="largeText"><br><strong><a href="discord">Discord</a></strong></span>
	</div>
	
	<div class="contentBox" style="text-align: center; margin-bottom:  15px;">
		<span class="largeText"><strong><a href="browse">Explore</a></strong></span>
	</div>
</div>
