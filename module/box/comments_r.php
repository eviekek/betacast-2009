<div class="headerRCBox">
	<b class="rch">
	<b class="rch1"><b></b></b>
	<b class="rch2"><b></b></b>
	<b class="rch3"></b>
	<b class="rch4"></b>
	<b class="rch5"></b>
	</b><div class="content">
	<div class="headerTitle">
		<div class="headerTitleRight"></div>
		<span>Comments</span>
	</div></div>
</div>
<div class="scrollerBox basicBoxes">
	<table class="commentsTable">
		<?php $name = $user['username']; $comments=mysqli_query($sql, "SELECT * FROM `profilecomments` WHERE touser = '$name' ORDER BY `id` DESC LIMIT 5");
		while($comment=mysqli_fetch_array($comments)) {
		$commenter = $sql->real_escape_string($comment['fromuser']);
		$commentersql = $sql->query("SELECT * FROM users WHERE username='$commenter'");
		$commenter = mysqli_fetch_assoc($commentersql);		
		?>
		<tr class="commentsTableFull">
		<td valign="top" style="padding-left: 10px; padding-top: 8px; width: 100px; padding-right: 10px;">
			<center><a <?php if(!empty($commenter['username'])) { ?>href="<?php if(empty($commenter['vanity'])) { echo "/user/".htmlspecialchars($comment['fromuser']); } else{ echo "/".$commenter['vanity']; } ?>"<?php } ?>><img src="/vi/thumb/<?php echo $commenter['channelicon'] ?>.jpg" width="90px" class="imgBrdr" /></a></center>	
		</td>
		<td valign="top" style="padding-left: 8px; border-right: none; padding-top: 8px;">
			<strong><a href="<?php if(!empty($commenter['username'])) { ?><?php if(empty($commenter['vanity'])) { echo "/user/".htmlspecialchars($comment['fromuser']); } else{ echo "/".$commenter['vanity']; } } ?>"><?php if(!empty($commenter['username'])) {  echo htmlspecialchars($commenter['username']); } else{ echo 'Deleted user'; }?></a> <span class="labels">| <?php echo date("M d, Y", strtotime($comment['date'])); ?></span></strong>
			<br />
			<br />
                <?php echo htmlspecialchars($comment['text']) ?>
		</td>
		</tr><?php } ?>

		<tr class="commentsTable">
			<td colspan="2">
				<center>
					<span class="smallText"><a href="/user/<?php echo htmlspecialchars($username) ?>/comment_all">See All Comments</a> | 
					<a href="/profile_comment_post?user=<?php echo htmlspecialchars($username) ?>">Add Comment</a></span>
				</center>
			</td>
		</tr>
	</table>
</div>
