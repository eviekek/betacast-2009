<?php
// I AM TIRED
require 'config.inc.php';
if(isset($_GET['make_admin'])) {
    $adminuser = $_GET['make_admin'];
    mysqli_query($sql, "UPDATE `users` SET admin = 1 WHERE `users`.`username` = '$adminuser'");
    $_SESSION['error'] = "You are now admin";
    header('Location: '.$site_domain.'/');
}
require 'module/pagestart.php'; 
require 'module/2009_header.php';
require 'module/foor.php';

?><div id="baseDiv" class="video-info " bis_skin_checked="1">
<h1>BetaCast setup</h1><br><span><i>only the first account can access this</i></span><hr>
<a href="/bc_setup?make_admin=<?= $loggedu['username'] ?>">Make me admin</a>