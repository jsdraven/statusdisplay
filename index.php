<?php

/**
 * Filename......: index.php
 * Author........: Justin Scott
 * Created.......: 11/13/13 10:51am
 * Description...: This project is designed to show Exchange Calendar events, Projects, and other weekly office information.
 * This file will only act as an information passthrough. I am calling the needed files to make this project run. I will
 * also be checking for all modules.
 */
require 'Protected/functions.php';
//require 'Modules/Exchange/index.php';
if (isset($_POST['reset'])) {
    # code...
    session_destroy();
}


if (strlen(constant('displayIP')) > 0 && constant('displayIP') != $_SERVER['LOCAL_ADDR']) {

    $displayIP = constant('displayIP');

}else{

    $displayIP = $_SERVER['LOCAL_ADDR'];

    //var_dump($_SERVER);

}
if ($_SERVER['REMOTE_ADDR'] != $displayIP){

	require 'admin/index.php';
	
}else{
$source = 'testFeed';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script>
            function loadXMLDoc()
            {
                var xmlhttp;
                xmlhttp=new XMLHttpRequest();
          
                xmlhttp.onreadystatechange=function()
                  {
                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
                        }
                  }
                xmlhttp.open("GET","feed.php?feed=testFeed",true);
                xmlhttp.send();
            }
            setInterval("loadXMLDoc();", 1000);
        </script>

    </head>
    <body>
    <form action='' method="POST">
        <input type="submit" name="reset" value="Reset" />
        </form>
        <div id='myDiv'>
            <p>Waiting to load all the stuff you know you love.</p>
        </div>
    </body>
</html>
<?php
}
?>
