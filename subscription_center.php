<?php require ('config.inc.php');$hwat = $_SESSION['username']; if(isset($_GET['add_user']) && isset($_POST['adding'])) {
	  
	  if(!isset($_SESSION['loggedin'])) { header('Location: login'); die('sign in betch'); }
	  ini_set('display_startup_errors', 1);
	  ini_set('display_errors', 1);
	  if(strtolower($_GET['add_user']) == strtolower($_SESSION['username'])) { die('You cannot subscribe to yourself!'); }
	  $towho = $_GET['add_user'];
	  if(!isset($_SESSION['loggedin'])) { header('location: login'); die('sign in'); }
	  $hwat = $_SESSION['username'];
	  $vids=mysqli_query($sql, "SELECT * FROM `subs` WHERE fromwho = '$hwat' AND towho = '$towho'");
	  while($vid=mysqli_fetch_array($vids)) {
			mysqli_query($sql, "DELETE FROM `subs` WHERE fromwho = '$hwat' AND towho = '$towho'");
			$isdelete = true;
	  }
		 $vids=mysqli_query($sql, "SELECT * FROM `users` WHERE username = '$towho'");
	     while($vid=mysqli_fetch_array($vids)) {
		    $sqlled = "INSERT INTO subs(fromwho, towho) 
                   VALUES('$hwat', '$towho')";
			if(!isset($isdelete)) {
				mysqli_query($sql, $sqlled);
			}
			$vids=mysqli_query($sql, "SELECT * FROM `subs` WHERE towho = '$towho'");
			$totalcount = 0;
			while($vid=mysqli_fetch_array($vids)) {
				$totalcount = $totalcount + 1;
			}
			mysqli_query($sql, "UPDATE `users` SET `subs` = '$totalcount' WHERE `users`.`username` = '$towho'");
			$_SESSION['justsubbed'] = true;
			if($isdelete) { $_SESSION['unsub']  = true; }else{ $_SESSION['unsub'] = false; }
			header("location: /user/".$towho);
	  }
} else{
if(isset($_GET['add_user'])) { ?>
<?php require 'module/pagestart.php'; ?>
<?php require 'module/2009_header.php'; ?>
<form action="" id="rec" method="post">
    <td><textarea style="display: none;" maxlength="500" name="adding" cols="66" rows="6"><?php echo $username; ?></textarea></td>
</form>
<?php require 'module/settings/subscribe.php'; } else{ header("Location: /profile_subscriptions"); } }?>
