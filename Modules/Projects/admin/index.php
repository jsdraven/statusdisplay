<?php


//develop list of active projects
$sql = "SELECT DISTINCT uName FROM projects WHERE status = 'Active'";

$names = DbConnection($sql);

$projects = array();
$options = '';
foreach ($names as $key => $value) {
	# code...
	$name = $value['uName'];
	$sql = "SELECT * FROM projects WHERE uName = '$name' AND status = 'Active'";
	$results = DbConnection($sql);
	$projectsCount = '';
	$uNameSample = '';
	while ($row = mysqli_fetch_object($results)) {
		# code...]
		$name = $row->uName;

		$projects[$name][] = <<<FORM
		<td>
		<form action='' method='POST'>
		<input type="hidden" name='set' value="Projects" />
		<input type="hidden" name='part' value="adjust" />
		<input type='hidden' name="id" value="$row->id" />
		$row->pName
		</td>
		<td>
		$row->pStartDate
		</td>
		<td>
		$row->pEndDate
		</td>
		<td>
		<details>
		<summary>Actions</summary>
		<input type="submit" name="action" value="Edit" />
		&nbsp;
		<input type="submit" name="action" value="Delete" />
		&nbsp;
		<input type="submit" name="action" value="Complete" />
		</details>
		</form>
		</td>
		</tr>
FORM;

	}
	$options .=<<<HTML

<option value="$name">$name</option>
		

HTML;

}


if (isset($_POST['submit']) || isset($_POST['action'])) {
	# code...
	require "form.php";
}


require "view.php";
