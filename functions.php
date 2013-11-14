<?php
/**
 * Filename......: functions.php
 * Author........: Justin Scott
 * Created.......: 11/13/13 10:51am
 * Description...: This is all the functions used within this project.
 */
require_once('config.php');

function DbConnection($query){

    $DB_User = constant('dbUser');
    $DB_Password = constant('dbPass');
    $DB_Host = constant('dbHost');
    $DB_Name = constant('dbname');
    $copperrun = mysqli_connect($DB_Host, $DB_User, $DB_Password, $DB_Name);
    $result = mysqli_query($copperrun, $query);
    mysqli_close($copperrun);
    return $result;
}