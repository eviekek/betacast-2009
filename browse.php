<?php require 'config.inc.php'; ?>
<?php require 'module/pagestart.php'; ?><div id="baseDiv" class="video-info " bis_skin_checked="1">
<?php require 'module/2009_header.php'; ?><?php if(isset($_SESSION['error'])) { echo '<div class="errorBox" bis_skin_checked="1">'.$_SESSION['error'].'</div>'; unset($_SESSION['error']); } ?>
<?php require 'module/newvids1.php'; ?>
<?php require 'module/footer.php'; ?></div>
