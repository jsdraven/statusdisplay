<?php

/* Bellow is a list of settings that need to be set for this server.
*/


//MySQL Settings
define('mysql_Host', 'localhost');
define('mysql_UserName', 'root');
define('mysql_Password', '');
define('mysql_DBName', 'display');



//Exchange Usser Info
define('exchange_User', 'ittemp@fosterdairyfarms.com');
define('exchange_password', 'Flarflovin43');
define('exchange_domain', 'webmail.fosterdairyfarms.com');
define('exchange_calendar', 'helpdesk');

/*Environment Var*/
//Real path to the site EX: "C:\wamp\www\statusdisplay"
//cycle rate in second between Modules after pages cycled through
define('moduleCycleRate', '30');
// cycle rate inbetween pages within the modules.
// Example Project list is greater than one page
define('pageCycleRate', '15');

//Incase you would like to show the info on a system other than the host.
//If left blank it will use the default of 127.0.0.1 or localhost.
define('displayIP', '');
