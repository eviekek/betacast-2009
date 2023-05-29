<?php require 'module/pagestart.php'; ?>
<?php require 'module/2009_header.php'; ?><div id="baseDiv" class="video-info " bis_skin_checked="1"><?php if(isset($_SESSION['error'])) { echo '<div class="errorBox" bis_skin_checked="1">'.$_SESSION['error'].'</div>'; unset($_SESSION['error']); } ?>
<?php if(isset($error)) { echo '<div class="errorBox" bis_skin_checked="1">'.$error.'</div>'; } ?>
<div id="homepage-main-content" class="homepage-non-interactive" bis_skin_checked="1"><div id="feedmodule-POP" class="feedmodule-anchor" bis_skin_checked="1">
<?php if($loggedu['unreadmsg'] == "1") {?> <div style="border: 1px solid green;padding: 12px;margin-top: 6px;margin-bottom: 8px;text-align: center;font-weight: bold;font-size: 14px;color: green;" bis_skin_checked="1"><a href="/inbox">You have unread messages.</a></div><?php } ?>
<?php if(!isset($loggedu['email']) && isset($loggedu['id'])) {?> <div style="border: 1px solid green;padding: 12px;margin-top: 6px;margin-bottom: 8px;text-align: center;font-weight: bold;font-size: 14px;color: green;" bis_skin_checked="1">It seems you have not set up a recovery email. Click <a href="/account?m=manage">HERE</a> to set one up.</div><?php } ?>
<!--<div id="feedmodule-POP" class="feedmodule-anchor" bis_skin_checked="1">
				<div class="errorBox" bis_skin_checked="1">This site is private.</div>
</div>-->
<?php require 'module/home/watchednow.php'; ?>
<?php require 'module/newvids.php'; ?></div></div></div>
<?php require 'module/home/sidebar.php'; ?>
<?php require 'module/footer.php'; ?>
