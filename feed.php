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
$list = FeedList();
if (!isset($_SESSION['timer'])) {
	# code...
	$_SESSION['timer'] = date('U');
	$_SESSION['feedID'] = 0;
	echo $_SESSION['feedID'];
}

$countDown = date('U') - $_SESSION['timer'];

if ($countDown > ($moduleCycle - 1)) {
	# code...
	$idSample = $_SESSION['feedID'] + 1;
	if (array_key_exists($idSample, $list)) {
		# code...
		$_SESSION['feedID'] = $idSample;
		

	}else{
		
		$_SESSION['feedID'] = 0;
	}
	$_SESSION['timer'] = date('U');

}


// If there is an HTTP request for "feed" then we start the clock and feed cycle.
if (isset($_GET['feed'])) {
	# code...
	$path = 'Modules/'.$list[$_SESSION['feedID']];
	if (is_dir($path) && file_exists($path.'/index.php')) {
	        require $path.'/index.php';
	    }
}
