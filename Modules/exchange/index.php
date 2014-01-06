<?php
/**
 * Filename......: Exchange Module index.php
 * Author........: Justin Scott
 * Created.......: 11/13/13 10:51am
 * Description...: This project is designed to show Exchange Calendar events, Projects, and other weekly office information.
 * This file will only act as an information passthrough. I am calling the needed files to make this project run. I will
 * also be checking for all modules.
 */
//require "ExchangeSrvReadCalendar_class.php";
$username = constant('exchange_User');
$password = constant('exchange_password');
$host = constant('exchange_domain');
$calenLoc = constant('exchange_calendar');
$Sample = date("U");

$startDate = date("m/d/Y", ($Sample - 1209600));
$endDate = date("m/d/Y", ($Sample + 1209600));
$date = date("m/d/Y", $Sample);

$today = Date("Y-m-d");
/*
$host = 'webmail.fosterdairyfarms.com';
$username = 'ittemp@fosterdairyfarms.com';
$password = 'Flarflovin43';
*/
$localTZ = 'America/Los_Angeles';
$ews = new ExchangeWebServices($host, $username, $password, ExchangeWebServices::VERSION_2010);



$request = new EWSType_GetUserAvailabilityRequestType();
$request->TimeZone = new EWSType_SerializableTimeZone();
$request->TimeZone->Bias = '480';
$request->TimeZone->StandardTime = new EWSType_SerializableTimeZoneTime();
$request->TimeZone->StandardTime->Bias = '0';
$request->TimeZone->StandardTime->Time = '02:00:00';
$request->TimeZone->StandardTime->DayOrder = '5';
$request->TimeZone->StandardTime->Month = '1';
$request->TimeZone->StandardTime->DayOfWeek = 'Sunday';
//$request->TimeZone->DaylightTime->Bias = '-60';
$request->TimeZone->DaylightTime->Time = '02:00:00';
$request->TimeZone->DaylightTime->DayOrder = '1';
$request->TimeZone->DaylightTime->Month = '4';
$request->TimeZone->DaylightTime->DayOfWeek = 'Sunday';
$request->MailboxDataArray = new EWSType_ArrayOfMailboxData();
$request->MailboxDataArray->MailboxData = new EWSType_MailboxData();
$request->MailboxDataArray->MailboxData->Email = new EWSType_EmailAddress();
$request->MailboxDataArray->MailboxData->Email->Address = $username;
$request->MailboxDataArray->MailboxData->Email->RoutingType = 'SMTP';
$request->MailboxDataArray->MailboxData->AttendeeType = 'Required';
$request->MailboxDataArray->MailboxData->ExcludeConflicts = false;
$request->FreeBusyViewOptions = new EWSType_FreeBusyViewOptionsType();
$request->FreeBusyViewOptions->TimeWindow = new EWSType_Duration();
$request->FreeBusyViewOptions->TimeWindow->StartTime = '2013-02-01T08:00:00';
$request->FreeBusyViewOptions->TimeWindow->EndTime = '2013-03-01T18:00:00';
$request->FreeBusyViewOptions->MergedFreeBusyIntervalInMinutes = '30';
$request->FreeBusyViewOptions->RequestedView = 'Detailed';


var_dump($request);
$response = $ews->GetUserAvailability($request);
print_r($response,true);