<div id="commentsDiv">
		<div id="recent_comments">
			<table><tbody><tr>
			<td><h2 class="commentHeading">Comments</h2></td>
			</tr></tbody></table>
			<?php $videoid = $video['id'];
			$comments=mysqli_query($sql, "SELECT * FROM `comments` WHERE touser = '$videoid' ORDER BY `id` DESC");
			while($comment=mysqli_fetch_array($comments)) {
			$commenter = $sql->real_escape_string($comment['fromuser']);
			$commentersql = $sql->query("SELECT * FROM users WHERE username='$commenter'");
			$commenter = mysqli_fetch_assoc($commentersql);		
			?>
			<div id="div_main_comment2"></div>
				<div> <!-- comment_div_id -->
				<a></a>
				<div class="commentEntry">
					<div class="commentHead">
						<b><a href="<?= $site_domain ?><?php if(!empty($commenter['username'])) { ?><?php if(empty($commenter['vanity'])) { echo "/user/".htmlspecialchars($comment['fromuser']); } else{ echo "/".$commenter['vanity']; } } ?>"><?php if(!empty($commenter['username'])) {  echo htmlspecialchars($commenter['username']); } else{ echo 'Deleted user'; }?></a></b>
						<span class="smallText"> (<?php echo date("M d, Y", strtotime($comment['date'])); ?>)</span>
					</div>
				<div class="commentBody">
					<?php echo htmlspecialchars($comment['text']) ?><br><br> 
				</div>
					<div class="commentAction smallText">
						<div class="commentAction smallText" style="display: none"></div>
					</div>
			</div>
			</div><?php } ?> <!-- comment_div_id -->
		</div> <!-- end recent_comments -->
			<?php if(!isset($_SESSION['username'])) { ?>
			<h2 class="commentHeading">Would you like to Comment?</h2>
			<div style="margin-top: 8px;">
			<a href="<?= $site_domain ?>/signup">Join BetaCast</a> for a free account, or
			<a href="<?= $site_domain ?>/login">Login</a> if you are already a member.
			</div>
		<?php } else{ ?>
			<form action="<?= $site_domain ?>/watch?v=<?php echo $_GET['v']; ?>" method="POST">
			<table cellpadding="4px" style="position:relative;right:4px">
			<tbody><tr>
				<td><textarea maxlength="500" name="msg" cols="66" rows="6"></textarea></td>
				<td><textarea style="display: none;" maxlength="500" name="touser" cols="66" rows="6"><?php echo $_GET['v']; ?></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" name="post_comment" value="Post Comment"></td>
			</tr>
		</tbody></table></form><?php } ?>
		<div id="div_main_comment"></div>
	</div>
