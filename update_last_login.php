<?php
require 'config.inc.php';
if(isset($_SESSION['loggedin'])) { $loggedname = $_SESSION['username'];
$last = strtotime(date('Y/m/d H:i:s'));
mysqli_query($sql, "UPDATE `users` SET `lastlogin` = '$last' WHERE `users`.`username` = '$loggedname'"); }
header('Location: https://www.'.$site_domain.'/');
