<?php
$loggeduser = $_SESSION['username'];// actual update code (very messy not easy to understand)
// Check if user is part of an MCN.
if($loggedu['partner'] == "1") {
// redirect
if(isset($_POST['isvalid'])) { 
$redirect = $sql->real_escape_string($_POST['redirect']); $sql->query("UPDATE `users` SET `redirect` = '$redirect' WHERE `users`.`username` = '$loggeduser';"); $loggedu['redirect'] = $redirect; $updateyes = true; }

// featuredvid
if(!empty($_POST['featuredvid'])) { 
$featuredvid = $sql->real_escape_string($_POST['featuredvid']); $sql->query("UPDATE `users` SET `featuredvid` = '$featuredvid' WHERE `users`.`username` = '$loggeduser';"); $loggedu['featuredvid'] = $featuredvid; $updateyes = true; }
}?>
<?php if(isset($updateyes)) { ?><div style="border: 3px solid green;padding: 6px;margin-top: 6px;margin-bottom: 6px;text-align: center;font-weight: bold;font-size: 14px;color: green;"> Your <a href="profile?user=<?php echo $loggedu['username'] ?>">Channel</a> has been updated successfully!</div><?php } ?>
<?php if($loggedu['partner'] == "1") { ?>
				<div>
					<!--<td width="33%"><form method="post" action="">
						<h1><a>Channel Redirect</a></h1>
							betacast.cc/<input name="redirect" placeholder="Channel Redirect" value="<?php echo $loggedu['redirect'] ?>"><br><input type="submit" name="isvalid" value="Update">
					</form></td><br>-->
					<td width="33%"><form method="post" action="">
						<h1><a>Channel Vanity</a></h1>
							<?php if(empty($loggedu['vanity'])) { ?>Contact your MCN to get a vanity applied.<?php } ?>
							<?php if(!empty($loggedu['vanity'])) { ?><?= $site_domain ?>/<?= $loggedu['vanity'] ?><?php } ?>
					</form></td><br>
					<td width="33%">
						<form action="bannerupload" method="post" enctype="multipart/form-data">
							<h1><a>Channel Banner</a></h1>
									Select banner to upload:
								<input type="file" name="fileToUpload" id="fileToUpload">
								<input type="submit" value="Upload Image" name="submit">
						</form>
					</td><br>
					<td width="34%"><form method="post" action="">
						<h1><a>Featured Video</a></h1>
							<input name="featuredvid" placeholder="Featured Video ID" maxlength="6" value="<?php echo $loggedu['featuredvid'] ?>">	<br><input type="submit" value="Update">		
					</form></td>
				</div>
<?php } else{ echo 'Only partners and members of an MCN can view this page.'; } ?>
	
