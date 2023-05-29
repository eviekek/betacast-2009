<?php 
if(!empty($user['featuredvid'])) { 
	$videoid = $sql->real_escape_string($user['featuredvid']); 
	$vids=mysqli_query($sql, "SELECT * FROM `video` WHERE id = '$videoid' ORDER BY `id` DESC LIMIT 1");
}else{
	$videoid = $sql->real_escape_string($user['username']); 
	$vids=mysqli_query($sql, "SELECT * FROM `video` WHERE author = '$videoid' AND deleted = 0 ORDER BY `id` DESC LIMIT 1");
}
while($vidseos=mysqli_fetch_array($vids)) { ?>
<div class="profile-box profileEmbedVideoInfo" style="margin: 10px 0px 15px 0px;" bis_skin_checked="1">
			<iframe height="320px" width="640px" src="/player/lolplayer.php?filename=<?php echo htmlspecialchars($vidseos['mp4']); ?>"></iframe>
				<div class="box-body" bis_skin_checked="1">
					<div class="box-fg" bis_skin_checked="1">
						<div class="vtitle" bis_skin_checked="1">
							<strong>
								<a href="/watch?v=<?php echo htmlspecialchars($vidseos['id']); ?>">
									<?php echo htmlspecialchars($vidseos['title']); ?>
								</a>
							</strong>
						</div>
						<div class="vfacets" bis_skin_checked="1">
							From:
							<a href="/user/<?php echo htmlspecialchars($vidseos['author']); ?>" title="<?php echo htmlspecialchars($vidseos['author']); ?>"><?php echo htmlspecialchars($vidseos['author']); ?></a>
							<br>
							Views: <?php echo htmlspecialchars($vidseos['views']) ?>
							<br>
							Added: <?php echo htmlspecialchars(time_elapsed_string($vidseos['date'])) ?>
							<br>
						</div>
					</div>
					<div class="box-bg" bis_skin_checked="1"></div>
				</div>
			</div>
<?php } ?>
