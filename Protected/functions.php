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
require_once('Plugins/php-ews/EWSType.php');

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

function RotationTimer($feedList, $pages = NULL){

    $pageCycle = constant('pageCycleRate');
    $moduleCycle = constant('moduleCycleRate');

    
    if (!isset($_SESSION['mTimer'])) {
        # code...
        $_SESSION['mTimer'] = date("U");
    }
    if (!isset($_SESSION['pTimer'])) {
        # code...
        $_SESSION['pTimer'] = date("U");
    }


    if (!isset($_SESSION['feedID'])) {
        # code...
        $_SESSION['feedID'] = 0;
        $mTimer = date("U");
        $pTimer = date("U");
    }

    if ($pages != NULL) {

        $_SESSION['case'] = 'pages';
       
    }else {
        # code...
        $_SESSION['case'] = 'none';
        $_SESSION['pageID'] = NULL;
    }

    switch ($_SESSION['case']) {
        case 'pages':
            # code...
            $pTimeSample = date("U") - $_SESSION['pTimer'];
            echo $pTimeSample;
            if ($_SESSION['pageID'] === NULL) {
                # code...
                $_SESSION['pageID'] = 0;
                $_SESSION['pTimer'] = date("U");
            }elseif ($pTimeSample > ($pageCycle - 1) && $_SESSION['pageID'] < $pages) {
                # code...
                $_SESSION['pageID']++;
                $_SESSION['pTimer'] = date("U");
            }elseif ($pTimeSample > ($pageCycle - 1) && $_SESSION['pageID'] >= $pages) {
                # code...
                $newFeed = $_SESSION['feedID'] + 1;
                

                    if (array_key_exists($newFeed, $feedList)) {
                        # code...
                        $_SESSION['feedID'] = $newFeed;
                            

                    }else{
                        
                        session_destroy();
                    }
            }






            break;
        
        case "none":
            # code...

            $mTimeSample = date("U") - $_SESSION['mTimer'];
            echo $mTimeSample;
            if ($mTimeSample > ($moduleCycle - 1)) {
                # code...
                $newFeed = $_SESSION['feedID'] + 1;
                if (array_key_exists($newFeed, $feedList)) {
                    # code...
                    $_SESSION['feedID'] = $newFeed;
                    $_SESSION['mTimer'] = date("U");
                }else{
                    session_destroy();
                }
            }

            break;
    }
}