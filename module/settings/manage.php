<?php
$loggeduser = $loggedu['username'];// actual update code (very messy not easy to understand)

if(!empty($_POST['email'])) { 
if(empty($loggedu['email'])) { 
$email = $sql->real_escape_string($_POST['email']); 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	die("Invalid email");
}
$sql->query("UPDATE `users` SET `email` = '$email' WHERE `users`.`username` = '$loggeduser';"); $loggedu['email'] = $email; $updateyes = true; 
}else{ die('In order to change your email, please contact support.'); } }?>
<?php if(isset($updateyes)) { ?><div style="border: 3px solid green;padding: 6px;margin-top: 6px;margin-bottom: 6px;text-align: center;font-weight: bold;font-size: 14px;color: green;"> Your account has been updated successfully!</div>
<?php } ?>
				<div>
					<td width="33%"><form method="post" action="">
						<h1><a>E-MAIL</a></h1>
							<span>WARNING: YOU CANNOT CHANGE THIS ONCE IT IS SET</span><br>
							<input <?php if(!empty($loggedu['email'])) { echo 'disabled'; } ?> name="email" placeholder="email@email.com" value="<?php echo $loggedu['email'] ?>"><br><input type="submit" name="isvalid" value="Update">
					</form></td><br>
				</div>
	
