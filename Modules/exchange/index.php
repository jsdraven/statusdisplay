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

$ews = new ExchangeWebServices($exDomain, $userName, $password, ExchangeWebServices::VERSION_2010);

$request = new EWSType_FindItemType();
$request->Traversal = EWSType_ItemQueryTraversalType::SHALLOW;

$request->ItemShape = new EWSType_ItemResponseShapeType();
$request->ItemShape->BaseShape =
        EWSType_DefaultShapeNamesType::DEFAULT_PROPERTIES;

$request->CalendarView = new EWSType_CalendarViewType();
$request->CalendarView->StartDate = date('c', strtotime($startDate.' -00'));
$request->CalendarView->EndDate = date('c', strtotime($endDate.' -00'));

$request->ParentFolderIds = new EWSType_NonEmptyArrayOfBaseFolderIdsType();
$request->ParentFolderIds->DistinguishedFolderId =
        new EWSType_DistinguishedFolderIdType();
$request->ParentFolderIds->DistinguishedFolderId->Id =
        EWSType_DistinguishedFolderIdNameType::CALENDAR;

        print_r($request->ParentFolderIds->DistinguishedFolderId->Id);