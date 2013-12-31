<?php
$check = 0;
$error = array();
$start = 0;
$end = 0;
if (isset($_POST['name']) && strlen($_POST['name']) > 2) {
	# code...
	$name = $_POST['name'];
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
if ($check === 2 || $_POST['part'] == 'delete' || $_POST['part'] == 'complete') {
	# code...
	switch ($_POST['part']) {
		case 'insert':
			# code...
			echo "insert";
			$sql = "INSERT INTO projects (uName, pName, pStartDate, pEndDate, status) VALUES('$name', '$title', '$start', '$end', 'Active')";
			$endResult = DbConnection($sql);
			break;
		
		case 'update':
			# code...
			echo "UpDate";
			$id = $_POST['id'];
			$sql = "UPDATE projects SET uName='$name', pName='$title', pStartDate='$start', pEndDate='$end' WHERE id='$id";
			break;

		case 'delete':
			#code...
			echo "delete";
			$sql = "DELETE FROM projects WHERE id=$id";
			break;
		case 'complete':
			# code...
			echo "complete";
			$id = $_POST['id'];
			$sql = "UPDATE projects SET status='Completed' WHERE id='$id";
			break;
	}
}
