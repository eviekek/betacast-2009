<!DOCTYPE HTML>
<?php require ('config.inc.php');
	  $pagetitle = $sitetitle.' - Channel Settings';
	  $index = true;
	  if(!isset($_SESSION['loggedin'])) { header('location: ./login'); die(); } else{ 
	  $name = $sql->real_escape_string($_SESSION['username']); $ok = $sql->query("SELECT * FROM users WHERE username='$name'");
	  $logged = mysqli_fetch_assoc($ok); } $loggeduser = $_SESSION['username'];
	  if(empty($logged['ownsmcn'])) { die(); }
// actual update code (very messy not easy to understand)
// Add am ember
$myownmcn = $logged['ownsmcn'];
if(!empty($_POST['addname'])) { 
$memberdata = $sql->real_escape_string($_POST['addname']); $ok = $sql->query("SELECT * FROM users WHERE username='$memberdata'");
$memberadd = mysqli_fetch_assoc($ok);
if(!empty($memberadd['mcn'])) { die("This member is already part of an MCN!"); }
if(empty($memberadd['username'])) { die("No user found"); }
$whoshallbeaddedtothoumcn = $memberadd['username'];
$sql->query("UPDATE `users` SET `mcn` = '$myownmcn' WHERE `users`.`username` = '$whoshallbeaddedtothoumcn';"); 
$sql->query("UPDATE `users` SET `partner` = '1' WHERE `users`.`username` = '$whoshallbeaddedtothoumcn';"); }
?>
<html>
<head>
	<title><?php echo $pagetitle ?></title>
	<link rel="stylesheet" href="./styles.css" type="text/css">
	<link rel="stylesheet" href="./base.css" type="text/css">
	<link rel="stylesheet" href="./watch.css" type="text/css">
	<script language="javascript" type="text/javascript">
		onLoadFunctionList = new Array();
		function performOnLoadFunctions()
		{
			for (var i in onLoadFunctionList)
			{
				onLoadFunctionList[i]();
			}
		}
	</script>
</head>
<body onLoad="performOnLoadFunctions();">
<div id="baseDiv"><?php require 'module/yt_header.php'; ?><script type="text/javascript" src="/js/video_bar.js"></script>
<?php if(isset($updaterr)) { ?><div class="errorBox"> <?php echo $updaterr ?></div><?php } ?>
<?php if(isset($updateyes)) { ?><div class="yesBox"> <a href="profile?user=<?php echo $memberadd['username'] ?>">This user</a> has been added successfully!</div><?php } ?>
<div id="standardContent" style="width: 660px;">
<div class="headerRCBox">
	<b class="rch">
	<b class="rch1"><b></b></b>
	<b class="rch2"><b></b></b>
	<b class="rch3"></b>
	<b class="rch4"></b>
	<b class="rch5"></b>
	</b>
	<div class="content">		
		<div class="headerTitle">
			<span>Channel options (MCN)</span>
		</div>
	</div>
</div>
	<div class="contentListBox" style="margin-bottom: 15px;">
		<div class="contentListStandard">
		<form method="post" action="">
			<div class="vDetailEntry">
				<table cellpadding="0" cellspacing="0">
				<table cellpadding="6" cellspacing="0" border="0">
					<?php if($logged['ownsmcn'] !== "") { ?>
					<td width="60%">
						<h1><a>MCN Details</a></h1><?php
							$mcnname = $sql->real_escape_string($logged['ownsmcn']); $ok = $sql->query("SELECT * FROM mcn WHERE name='$mcnname'");
							$mcndata = mysqli_fetch_assoc($ok);  ?>
							Name: <?php echo $mcndata['name']; ?><br>
							Created: <?php echo $mcndata['created']; ?><br>
							ID: <?php echo $mcndata['id']; ?><br>
					</td>
					<td width="40%">
						<h1><a>MCN Members</a></h1>
							<input name="addname" placeholder="Username">			
							<center><input type="submit" value="Add member"></center>
					</td><?php } else{ echo 'Only partners and members of an MCN can view this page.'; } ?>
				</table>
				</table>
			</div>
		</form>
		</div>
	</div>
</div>
<ul id="subnavSidebar">
	<li class="navItem"><a href="/channel_settings">Channel Settings</a></li>
	<li class="navItem"><a href="/channel_theme">Channel Theme</a></li>
	<li class="navItem"><a href="/account_settings">Account Settings</a></li>
	<?php if($logged['partner'] == "1") { ?><li class="navItem"><a href="/partner_options">MCN Settings</a></li><?php } ?>
	<?php if(!empty($logged['ownsmcn'])) { ?><li class="navItemHighlight"><a href="/mcn_manage">MCN Management</a></li><?php } ?>
</ul>
<div id="footerDiv"><?php require 'module/betacast_foot.php' ?></div></div>
</body>
</html>
