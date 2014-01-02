<?php

$sql = "SELECT * FROM projects";
$listing = DbConnection($sql);

$uSql = "SELECT DISTINCT uName FROM projects";
$uNameList = DbConnection($uSql);


$today = date('U');
$completeList = array();
$pages = $uNameList->num_rows - 1;
if (!isset($_SESSION['pageID'])) {
	# code...
	$pageID = 0;
}else{
	$pageID = $_SESSION['pageID'];
}
while ($row = mysqli_fetch_object($listing)) {
	# code...
	$sample = $today - $row->completed;
	if ($sample >= 259200 && $sample != $today) {
		# code...
		$sql = "DELETE FROM projects WHERE id='$row->id'";
		//$endResult = DbConnection($sql);
		DbConnection($sql);
	}else{
		# code...
		if ($row->status == "Complete") {
			# code...
			$completeList[$row->uName][] =<<<HTML
<li><del>$row->pName</del> Status: $row->status</li>
HTML;
		}else{
		$completeList[$row->uName][] =<<<HTML
<li>$row->pName Status: $row->status</li>
HTML;
		}	
	}
}
require 'view.php';