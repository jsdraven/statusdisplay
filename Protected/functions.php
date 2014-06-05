<?php
//session_start();
//testing session usage

date_default_timezone_set('America/Los_Angeles');
/**
 * Filename......: functions.php
 * Author........: Justin Scott
 * Created.......: 11/13/13 10:51am
 * Description...: This is all the functions used within this project.
 */
$basePath = 'Plugins/php-ews/';
$protectedPath = 'Protected/';
$protectedDB = $protectedPath.'db/';
require_once($protectedPath.'config.php');
require_once($basePath.'EWSType.php');
require_once($basePath.'ExchangeWebServices.php');
require_once($basePath.'EWS_Exception.php');


class MyDB extends SQLite3{
    function __construct(){
        $this->open('Protected/db/myDB.db');
    }
}


/*
if (!isset($db)) {
    # code..
    if (!file_exists($protectedDB.'myDB.db')) {
        # code...
        $db = new MyDB()
        $sql =<<<EOF
CREATE TABLE projects
    (ID INT PRIMARY KEY NOT NULL,
     tittle     text    NOT NULL,
     group      text,
     date       CHAR(50),
     expEnd     CHAR(50));
EOF;

        $db->exec("CREAT TABLE projects ('id' init, 'title' varchar(255), 'disc' varchar(255), 'group' varchar(255))");
        if (!$db) {
            # code...
            echo $db->lastErrorMsg();
        }else{
            echo "DB Connected\n";
        }
    }else{
        $db = new MyDB();
         if (!$db) {
            # code...
            echo $db->lastErrorMsg();
        }else{
            echo "DB Connected\n";
        }       
    }
    
}*/


spl_autoload_register(
        function ($class) {
            $class = explode('_', $class);
            $basePath = 'Plugins/php-ews/';
            if ($class[0] == 'EWSType' || $class[0] == 'NTLMSoapClient'){
                $classPath = $basePath.$class[0].'/'.$class[1].'.php';
                require_once ($classPath);
            }
        }
);



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