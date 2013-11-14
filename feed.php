<?php
if (isset($_GET['feed'])) {
	# code...
	$path = 'plugins/'.$_GET['feed'];
	if (is_dir($path)) {
	        require $path.'/index.php';
	    }
}
