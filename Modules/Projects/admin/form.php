<?php
$check = '';
$error = array();

if (isset($_POST['name']) && strlen($_POST['name']) > 2) {
	# code...
	$name = $_POST['name'];
	echo "uName is set";
	$check++;

}elseif (isset($_POST['nameO']) && strlen($_POST['nameO']) > 2) {
	# code...
	$name = $_POST['nameO'];
	$check++;

}else{

	$error['uName'] = "Please Select or input a name.";
}
if (isset($_POST['jobtitle']) && strlen($_POST['jobtitle']) > 2) {
	# code...
	$title = $_POST['jobtitle'];
	$check++;

}else{

	$error['pName'] = "We need a Job Title";

}
if (isset($_POST['startDate'])) {
	# code...
	$start = $_POST['startDate'];

}
if (isset($_POST['endDate'])) {
	# code...
	$end = $_POST['endDate'];

}


