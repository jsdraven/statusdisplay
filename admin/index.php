<?php

$body = "";

//print_r($_POST);

//the page with the collection of functions so to be used globally if needed.


if (isset($_POST['set'])){
		$choice = $_POST['set'];
		$adminModule = "Modules/$choice/admin/index.php";
	}else{
		$adminModule = 'admin/landing.php';
	}

$views = "";
foreach (scandir('Modules') as $key => $value) {
    # code...
    if (strlen($value) < 3 || $value == 'template' || $value == 'dataPanel') {
        # code...
    }elseif (is_dir('Modules/'.$value.'/admin')) {
        $views .= "<input type='submit' name='set' value='$value' />\n";
    }
}




//$testing = raceCatArray();
//print_r($testing);
    $body .="
	<table border=1 >
		<tr>
			<td>
				<form action='' method='POST'>
					$views
				</form>
			</td>

	</table>
";

require $adminModule;
require 'view.php';

