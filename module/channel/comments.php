<div class="profile-box" id="user_comments" bis_skin_checked="1">
	<div class="box-head" bis_skin_checked="1">
	<div class="box-fg" bis_skin_checked="1">
			<?php
				$name = $user['username']; 
				$count_comments=mysqli_query($sql, "SELECT COUNT(touser) AS `value_occurrence` FROM profilecomments WHERE touser = '$name' ORDER BY `value_occurrence` DESC");
				$commentcount=mysqli_fetch_array($count_comments);
				$commentcount=$commentcount['value_occurrence'];
				if($commentcount < 10 || isset($videolimit)) { $shown_comments = $commentcount; }else{ $shown_comments = 10; }
			?>
			<div class="headerTitleRight floatR" bis_skin_checked="1">
				<span>
					Showing <?= $shown_comments ?> of <?= $commentcount ?> comments
				</span>
			</div>
			<div class="headerTitle  channel-box-title" id="user_comments-head" bis_skin_checked="1">
				Channel Comments (<a href="/user/<?php echo htmlspecialchars($username) ?>/comment_all" bis_skin_checked="1"><?= $commentcount ?></a>)
			</div>
			<div class="clear" bis_skin_checked="1"></div>
	</div>
	<div class="box-bg" bis_skin_checked="1"></div>
	</div>
			<div class="box-body" id="user_comments-body" bis_skin_checked="1">
				<div class="box-fg" bis_skin_checked="1">
	<table border="0" cellspacing="0" cellpadding="0" id="profile_comments_table" class="commentsTableFull">

	<?php
		if($videolimit == 1) {
			$comments=mysqli_query($sql, "SELECT * FROM `profilecomments` WHERE touser = '$name' ORDER BY `id` DESC");
		} else{
			$comments=mysqli_query($sql, "SELECT * FROM `profilecomments` WHERE touser = '$name' ORDER BY `id` DESC LIMIT 10");
		}	
		$count_comments=mysqli_query($sql, "SELECT COUNT(touser) AS `value_occurrence` FROM profilecomments WHERE touser = '$name' ORDER BY `value_occurrence` DESC");
		$commentcount=mysqli_fetch_array($count_comments);
		$commentcount=$commentcount['value_occurrence'];
		while($comment=mysqli_fetch_array($comments)) {
		$commenter = $sql->real_escape_string($comment['fromuser']);
		$commentersql = $sql->query("SELECT * FROM users WHERE username='$commenter'");
		$commenter = mysqli_fetch_assoc($commentersql);		
	?>
	<tbody>
	<tr class="commentsTableFull" style="">
				<td valign="top" width="60" style="padding-bottom: 15px;">
			  <div class="user-thumb-medium" bis_skin_checked="1"><div bis_skin_checked="1">
			<a href="<?php if(!empty($commenter['username'])) { ?><?php if(empty($commenter['vanity'])) { echo "/user/".htmlspecialchars($comment['fromuser']); } else{ echo "/".$commenter['vanity']; } } ?>" bis_skin_checked="1">
				<img id="" src="<?= $site_cdn  ?>/thumb/<?php echo $commenter['channelicon'] ?>.jpg" alt="<?php if(!empty($commenter['username'])) { ?><?php if(empty($commenter['vanity'])) { echo "/user/".htmlspecialchars($comment['fromuser']); } else{ echo "/".$commenter['vanity']; } } ?>">
			</a>
  </div></div>
		</td>
		<td valign="top" style="padding-bottom: 15px;">
			<div style="float:left; margin-bottom: 5px;" bis_skin_checked="1">
				<a name="profile-comment-username" href="<?php if(!empty($commenter['username'])) { ?><?php if(empty($commenter['vanity'])) { echo "/user/".htmlspecialchars($comment['fromuser']); } else{ echo "/".$commenter['vanity']; } } ?>" style="font-size: 12px;" bis_skin_checked="1"><b><?php if(!empty($commenter['username'])) {  echo htmlspecialchars($commenter['username']); } else{ echo 'Deleted user'; }?></b></a>
				<span class="profile-comment-time-created">(<?php echo date("M d, Y", strtotime($comment['date'])); ?>)</span>
			</div>
				<div style="float:right; margin-bottom: 5px" bis_skin_checked="1">
				</div>
			<div class="profile-comment-body" style="clear:both;" bis_skin_checked="1"><?php echo htmlspecialchars($comment['text']) ?>
			</div>
		</td>
	</tr>
	</tbody><?php } ?></table>
		<div id="user-comments-login-add-comment" style="font-size: 12px; margin-top: 10px" class="alignC" bis_skin_checked="1">
			<a href="/profile_add_comment?user=<?php echo htmlspecialchars($username) ?>" bis_skin_checked="1">
				Add Comment
			</a>
			<?php if($videolimit !== 1) { ?> | <a href="/user/<?php echo htmlspecialchars($username) ?>/comment_all" bis_skin_checked="1">
				All Comments
			</a><?php } ?>
		</div>
					<div class="clear" bis_skin_checked="1"></div>
				</div>
				<div class="box-bg" bis_skin_checked="1"></div>
			</div>
</div>
