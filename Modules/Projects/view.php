<?php

$body = '';
if (isset($completeList)) {
	# code...
	foreach ($completeList as $name => $list) {
		# code...
		$pageID = $_SESSION['pageID'];
		$uNameList->data_seek($pageID);
		$curentUname = $uNameList->fetch_row();

		$lastID = $_SESSION['pageID'] -1;
		$uNameList->data_seek($lastID);
		$lastUname = $uNameList->fetch_row();

		if ($name == $curentUname[0] || $name == $lastUname[0]) {
			# code...
			$details = "<details open>";

		}else{
			# code...
			$details = "<details>";
		}
		$body .= "$details<summary>$name</summary>";
		$body .= "<ul>";
		foreach ($list as $item) {
			# code...
			$body .= $item;
		}
		$body .="</ul></details>";
	}
}else{
	$body .= "There are no active projects at this time";
}

echo $body;
