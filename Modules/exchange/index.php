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
$userName = constant('exchange_User');
$password = constant('exchange_password');
$exDomain = constant('exchange_domain');
$calenLoc = constant('exchange_calendar');
$Sample = date("U");

$startDate = date("m/d/Y", ($Sample - 1209600));
$endDate = date("m/d/Y", ($Sample + 1209600));
$date = date("m/d/Y", $Sample);

$today = Date("Y-m-d");
$host = 'https://webmail.fosterdairyfarms.com/EWS/Exchange.asmx';
$username = 'ittemp@fosterdairyfarms.com';
$password = 'Flarflovin43';
$localTZ = 'America/Los_Angeles';
$daysahead = '7'; // Today Only
$EWScalendar = 'ittemp@fosterdairyfarms.com';
$ews = new ExchangeWebServices ($host, $username, $password);
$request = new EWSType_FindItemType();
$request->Traversal = EWSType_ItemQueryTraversalType::SHALLOW;
$request->ItemShape = new EWSType_ItemResponseShapeType();
$request->ItemShape->BaseShape = EWSType_DefaultShapeNamesType::DEFAULT_PROPERTIES;
$request->CalendarView = new EWSType_CalendarViewType();
$request->CalendarView->StartDate = date ('c',strtotime("$today"));
$request->CalendarView->EndDate = date ('c',strtotime("$today + $daysahead days"));
$request->ParentFolderIds = new EWSType_NonEmptyArrayOfBaseFolderIdsType();
$request->ParentFolderIds->DistinguishedFolderId = new EWSType_DistinguishedFolderIdType();
$request->ParentFolderIds->DistinguishedFolderId->Id = EWSType_DistinguishedFolderIdNameType::CALENDAR;
$mailBox = new EWSType_EmailAddressType();
$mailBox->EmailAddress = "$EWScalendar";
$request->ParentFolderIds->DistinguishedFolderId->Mailbox = $mailBox;
$response = $ews->FindItem($request);
$TotalItemCount = $response->ResponseMessages->FindItemResponseMessage->RootFolder->TotalItemsInView;
// LOOP through the Event Data and Parse each item
/*for ( $ItemID = 0; $ItemID < $TotalItemCount; $ItemID++) {
//--do something with item data--
$subject = $response->ResponseMessages->FindItemResponseMessage->RootFolder->Items->CalendarItem[$ItemID]->Subject;
}*/
echo '<!--';
echo 'Raw Data Captured<br><pre>';
print_r($response);
echo '</pre> ';
echo '-->';