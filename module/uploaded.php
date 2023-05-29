<?php $author = $_SESSION['username']; ?><div class="yesBox"> Your video was uploaded successfully!<br><center><?php $vids=mysqli_query($sql, "SELECT * FROM `video` WHERE author = '$author' ORDER BY `id` DESC LIMIT 1");
while($vid=mysqli_fetch_array($vids)) { ?><div class="vDetailEntry">
<table cellpadding="0" cellspacing="0"><tr valign="top"><td>
							<table class="image" cellpadding="0" cellspacing="0">
								<tr>
									<td><a href="watch?v=<?php echo $vid['id'] ?>"><img src="/vi/thumb/<?php echo $vid['thumb'] ?>.jpg" class="vimg" style="margin-left: 6px;" /></a></td>
								</tr>
							</table></td><td>
							<div class="vListInfo1Still">
								<div class="title">
									<b><a href="watch?v=<?php echo $vid['id'] ?>"><?php echo htmlspecialchars($vid['title']) ?></a></b><br/>
								</div>
								<div class="desc"><?php echo htmlspecialchars($vid['description']) ?></div>
								<div class="facets">
									<span class="grayText">Added:</span> <?php echo $vid['date'] ?> <br/>
									<span class="grayText">From:</span> <a href="profile?user=<?php echo htmlspecialchars($vid['author']) ?>" class="dg"><?php echo htmlspecialchars($vid['author']) ?></a><br/>
									<span class="grayText">Views:</span> 0
								</div>
							</div></td></tr></table></div></center></div><?php } ?>