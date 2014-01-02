<?php

/**
 * Filename......: feed.php
 * Author........: Justin Scott
 * Created.......: 11/13/13 10:51am
 * Description...: This is the primary page for fetching the rotating content.
 */

// I am calling the functions page for the different modules to use when pulling up content
require_once 'protected/functions.php';

$pageCycle = constant('pageCycleRate');
$moduleCycle = constant('moduleCycleRate');
/*print_r($_SESSION);
echo "<br />";*/

$list = FeedList();
$pages = NULL;

if (!isset($_SESSION['feedID'])) {
	# code...
	$feedID = 0;
}else{
	$feedID = $_SESSION['feedID'];
}

// If there is an HTTP request for "feed" then we start the clock and feed cycle.
if (isset($_GET['feed'])) {
	# code...
	$path = 'Modules/'.$list[$feedID];
	if (is_dir($path) && file_exists($path.'/index.php')) {
	        require $path.'/index.php';
	    }
}
//echo $pages;
RotationTimer($list, $pages);