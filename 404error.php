<?php
if(!isset($sql)) {
	require 'config.inc.php';
}
$error = '404: Not found';
header("HTTP/1.0 404 Not Found");
require 'module/home_page.php';
die();
