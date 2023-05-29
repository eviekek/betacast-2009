<?php require 'config.inc.php'; ?>
<?php require 'module/pagestart.php'; ?>
<?php require 'module/2009_header.php'; ?><div id="baseDiv" class="video-info " bis_skin_checked="1"><?php if(isset($_SESSION['error'])) { echo '<div class="errorBox" bis_skin_checked="1">'.$_SESSION['error'].'</div>'; unset($_SESSION['error']); } ?>
<div id="homepage-main-content" class="homepage-non-interactive" bis_skin_checked="1"><div id="feedmodule-POP" class="feedmodule-anchor" bis_skin_checked="1">
<form action="/upload.php" method="post" enctype="multipart/form-data"><?php require 'module/upload09.php'; ?></form></div></div>
<?php require 'module/home/sidebar.php'; ?>
<?php require 'module/footer.php'; ?>
