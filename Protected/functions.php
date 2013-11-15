<?php
session_start();

//testing session usage


/**
 * Filename......: functions.php
 * Author........: Justin Scott
 * Created.......: 11/13/13 10:51am
 * Description...: This is all the functions used within this project.
 */
require_once('Protected/config.php');


//This is a one stop shop for SQL queries. 
function DbConnection($query){

    $DB_User = constant('mysql_UserName');
    $DB_Password = constant('mysql_Password');
    $DB_Host = constant('mysql_Host');
    $DB_Name = constant('mysql_DBName');
    $copperrun = mysqli_connect($DB_Host, $DB_User, $DB_Password, $DB_Name);
    $result = mysqli_query($copperrun, $query);
    mysqli_close($copperrun);
    return $result;

}

//We will use this one to build list of feeds to cycle

function FeedList(){
	$list = array();
	$id = 0;
	foreach (scandir('Modules') as $key => $value) {
    # code...
    if (strlen($value) < 3 || $value == 'template') {
        # code...
    }elseif (file_exists('Modules/'.$value.'/index.php')) {
        $list[$id] = $value;
        $id++;
    }
}
return $list;
}