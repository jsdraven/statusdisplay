<?php
$errors = "";
if (isset($error)) {
	# code...
	foreach ($error as $key => $value) {
		# code...
		$errors .= $value."<br />";
	}
}
if (isset($_POST['part'])) {
	# code...
	$part = $_POST['part'];
}else{
	$part='';
}
switch ($part) {
	case 'adjust':
		# code...
		switch ($_POST['action']) {
			case 'Delete':
				# code...
				break;
			case 'Complete':
				# code...
				break;
			case 'Edit':
				# code...
			$id = $_POST['id'];
			$sql = "SELECT * FROM projects WHERE id='$id'";
			$aRecord = DbConnection($sql);
			$record = mysqli_fetch_object($aRecord);
			$body .=<<<HTML
<p>$errors</p>
<form action='' method='POST'>
<input type="hidden" name="set" value="Projects" />
<input type="hidden" name="part" value="update" />
<input type='hidden' name='id' value='$id' />
<table border="0">
<tr>
<td>
<lable for='name'>Name:</lable>
<input type="text" name="name" id="name" value="$record->uName" />
</td>
</tr>
<tr>
<td>
<lable for="jobtitle">Job Title:</lable>
<input type="text" name="jobtitle" id="jobtitle" value="$record->pName" />
</td>
</tr>
<tr>
<td>
<lable for="startdate">Start Date</lable>  
<input type="text" name="startDate" id="startDate" value="$record->pStartDate" />
</td>
</tr>
<tr>
<td>
<lable for="endDate">End Date</lable>
<input type="text" name="endDate" id="endDate" value="$record->pEndDate" />
</td>
</tr>
<tr>
<td>
<input type="submit" id="submit" name="submit" value="Submit" />
</td>
</tr>
</table>
</form>
HTML;
				break;
		}
		break;
	
	default:
		# code...
	$body .=<<<HTML
<p>$errors</p>
<form action='' method='POST'>
<input type="hidden" name="set" value="Projects" />
<input type="hidden" name="part" value="insert" />
<table border="0">
<tr>
<td>
<lable for='name'>Name:</lable>
<input type="text" name="name" id="name" />
-- or --
<select name="nameO" id="name">
<option value=''>Select One.</option>
$options
</select>
</td>
</tr>
<tr>
<td>
<lable for="jobtitle">Job Title:</lable>
<input type="text" name="jobtitle" id="jobtitle" />
</td>
</tr>
<tr>
<td>
<lable for="startdate">Start Date</lable>  
<input type="text" name="startDate" id="startDate" />
</td>
</tr>
<tr>
<td>
<lable for="endDate">End Date</lable>
<input type="text" name="endDate" id="endDate" />
</td>
</tr>
<tr>
<td>
<input type="submit" id="submit" name="submit" value="Submit" />
</td>
</tr>
</table>
</form>
HTML;
		break;
}


foreach ($projects as $name => $list) {
	# code...
	$body .= "<details><summary>$name</summary>";
	$body .=<<<HTML

<table border=1>
		<thead>
		<tr>
		<th>Project Name</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>Action</th>
		</tr>
		<tbody>

HTML;
	foreach ($list as $item) {
		# code...
		$body .= $item;
	}
	$body .=<<<HTML
	</tbody>
	</table>
	</details>
HTML;
}

