<?php
require ('../config.inc.php');
if(isset($_GET['username'])) {
	$name = $sql->real_escape_string($_GET['username']);
	$name = preg_replace('/[\/\\\]/', '', $name);
	$ok = $sql->query("SELECT * FROM video WHERE author='$name' ORDER BY id DESC");
	$user = mysqli_fetch_assoc($ok);
}
if(isset($_GET['id'])) {
	$name = $sql->real_escape_string($_GET['id']);
	$name = preg_replace('/[\/\\\]/', '', $name);
	$ok = $sql->query("SELECT * FROM video WHERE id='$name'");
	$user = mysqli_fetch_assoc($ok);
}
if(!isset($user['id'])) {
	die("null");
}
$myObj->id = $user['id'];
$myObj->title = $user['title'];
$myObj->description = $user['description'];
$myObj->date = strtotime($user['date']);
$myObj->views = $user['views'];
$myObj->filename = 'https://'.$site_cdn.'/videos/'.$user['mp4'];
$myObj->uploader = $user['author'];

$myJSON = json_encode($myObj);

echo $myJSON;
?>
