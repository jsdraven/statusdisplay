<?php
/**
 * Filename......: Exchange Module index.php
 * Author........: Justin Scott
 * Created.......: 11/13/13 10:51am
 * Description...: This project is designed to show Exchange Calendar events, Projects, and other weekly office information.
 * This file will only act as an information passthrough. I am calling the needed files to make this project run. I will
 * also be checking for all modules.
 */
require "ExchangeSrvReadCalendar_class.php";
$userName = constant('exchange_User');
$password = constant('exchange_password');
$exDomain = constant('exchange_domain');
$calenLoc = constant('exchange_calendar');
$Sample = date("U");

$startDate = date("m/d/Y", ($Sample - 1209600));
$endDate = date("m/d/Y", ($Sample + 1209600));
$date = date("m/d/Y", $Sample);

$obj = new ExchangeSrvReadCalendar($exDomain, $calenLoc, $userName, $password);
$obj->setDateTimeStart($startDate); // Start Date
$obj->setDateTimeEnd($endDate);   // End Date

echo "Exchange Feed Here startDate = $startDate and endDate = $endDate";
