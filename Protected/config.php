<?php

/* Bellow is a list of settings that need to be set for this server.
*/


//MySQL Settings
define('mysql_UserName', '');
define('mysql_Password', '');
define('mysql_DBName', '');



//Exchange Usser Info
define('exchange_User', '');
define('exchange_password', '');
define('exchange_domain', '');
define('exchange_calendar', '');
require_once('Modules/Exchange/ExchangeSrvReadCalendar_class.php');

/*Environment Var*/
//Real path to the site EX: "C:\wamp\www\statusdisplay"
//cycle rate in second between Modules after pages cycled through
define('moduleCycleRate', '30');
// cycle rate inbetween pages within the modules.
// Example Project list is greater than one page
define('pageCycleRate', '15');
