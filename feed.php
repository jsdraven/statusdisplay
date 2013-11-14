<?php
/**
 * Filename......: feed.php
 * Author........: Justin Scott
 * Created.......: 11/13/13 10:51am
 * Description...: This is the primary page for fetching the rotating content.
 */

// I am calling the functions page for the different modules to use when pulling up content
require_once 'functions.php';

// If there is an HTTP request for "feed" then we start the clock and feed cycle.
if (isset($_GET['feed'])) {
	# code...
	$path = 'Modules/'.$_GET['feed'];
	if (is_dir($path)) {
	        require $path.'/index.php';
	    }
}
