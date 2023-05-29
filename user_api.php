<?php
require ('../config.inc.php');
if(isset($_GET['username'])) {
$name = $sql->real_escape_string($_GET['username']);
$name = preg_replace('/[\/\\\]/', '', $name);
$ok = $sql->query("SELECT * FROM users WHERE username='$name'");
$user = mysqli_fetch_assoc($ok);
}
if(isset($_GET['id'])) {
$name = $sql->real_escape_string($_GET['id']);
$name = preg_replace('/[\/\\\]/', '', $name);
$ok = $sql->query("SELECT * FROM users WHERE id='$name'");
$user = mysqli_fetch_assoc($ok);
}
if(!isset($user['id'])) {
	die("null");
}
$myObj->username = $user['username'];
$myObj->created = strtotime($user['created_at']);
$myObj->lastlogin = $user['lastlogin'];
$myObj->bio = $user['bio'];
$myObj->subs = $user['subs'];
$myObj->vanity = $user['vanity'];
$myObj->mcn = $user['mcn'];

$myJSON = json_encode($myObj);

echo $myJSON;
?>
