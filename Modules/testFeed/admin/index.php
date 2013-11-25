<?php

$choice = 0;
if (isset($_GET['formOp'])) {
	# code...
	$choice = $_GET['formOp'];
}else{
$choice = 0;
}

if (isset($_POST['submit'])) {
	# code...
	require "form.php";
}
	switch ($choice) {
		case '1':
			# code...
			$name =<<<HTML
			<select name="name" id="name">
			<option value="Justin">Justin</option>
			</select>

HTML;

			break;
		
		default:
			# code...
$name =<<<HTML
<input type="text name="name" id="name" />
HTML;

			break;
	}

require "view.php";
