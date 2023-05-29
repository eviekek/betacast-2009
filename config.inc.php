<?php
//Connect to mysql server
require_once __DIR__.'/db_conn.php';
$sql=mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME) or die('<center><span>Database could not be found</span></center>');

//I might change the site's name later, so this is useful 
$sitetitle = 'BetaCast';
$site_domain = 'http://localhost';
$site_cdn = '/vi/';

//Start sessions
session_start();

//Disable errors (this site has way too many of em)
if(!isset($_GET['debug'])) {
    error_reporting(0);
}

//used for rss lol
$siteroot="https://hwilliams8548.com/";

//print site header
function printheader()
{
	require ('module/header.php');
}

//time elapsed
function elapsed_time($timestamp, $precision = 2) {
  $time = time() - $timestamp;
  $a = array('decade' => 315576000, 'year' => 31557600, 'month' => 2629800, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'min' => 60, 'sec' => 1);
  $i = 0;
  foreach($a as $k => $v) {
    $$k = floor($time/$v);
    if ($$k) $i++;
    $time = $i >= $precision ? 0 : $time - $$k * $v;
    $s = $$k > 1 ? 's' : '';
    $$k = $$k ? $$k.' '.$k.$s.' ' : '';
    @$result .= $$k;
  }
  return $result ? $result.'ago' : '1 sec to go';
}

// time elapsed new
function time_elapsed_string($datetime, $full = false) {
        global $cLang;
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        if(!isset($cLang)) {
            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
        } else {
            $string = array(
                'y' => $cLang['year'],
                'm' => $cLang['month'],
                'w' => $cLang['week'],
                'd' => $cLang['day'],
                'h' => $cLang['hour'],
                'i' => $cLang['minute'],
                's' => $cLang['second'],
            );
        }
    
        if(!isset($cLang)) {
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }
        } else {
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? $cLang['pluralTimeRight'] : '');
                } else {
                    unset($string[$k]);
                }
            }
        }
    
        if(!isset($cLang)) {
            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        } else {
            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode($cLang['agoLeft'], $string) . " " . " " . $cLang['agoRight'] : $cLang['justNow'];
        }
    }

//print site footer
function printfooter()
{
	print "<hr><br>this site is in early alpha atm</tt>";
}

//init page
function pageinit()
{
	echo "<title>".$pagetitle."</title>";
	echo '<link rel="stylesheet" href="./styles.css" type="text/css"><link rel="stylesheet" href="./base.css" type="text/css"><link rel="stylesheet" href="./watch.css" type="text/css">';
}

//print a message
function printmessage($string, $string2)
{
	print "<table border=1 width=345 $string2><tr><td align=center>$string</td></tr></table><br><br>
	";
}
?>
