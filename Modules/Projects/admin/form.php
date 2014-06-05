<?php
$check = '';
$error = array();

if (isset($_POST['name'])) {
	# code...
	$name = $_POST['name'];
	$check++;

}elseif (isset($_POST['nameO'])) {
	# code...
	$name = $_POST['nameO'];
	$check++;

}else{

	$error[] = "Please Select or input a name.";
}
if (isset($_POST['jobtitle'])) {
	# code...
	$title = $_POST['jobtitle'];
	$check++;

}else{

	$error[] = "We need a Job Title";

}
if ($_POST['startDate']) {
	# code...
	$start = $_POST['startDate'];

}
if ($_POST['endDate']) {
	# code...
	$end = $_POST['endDate'];

}


