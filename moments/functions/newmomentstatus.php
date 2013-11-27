<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/phpmyadmin_connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/userfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/datefunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/moments/classes/Moment_status.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/hashtag.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/user.php';

$newmomentstatus = $_POST['momentstatus'];
$moment_id = $_POST['moment_id'];

if($newmomentstatus){
    $momentstatus = new Moment_status();
    $momentstatus->withMoment_statusAndMoment_id($newmomentstatus, $moment_id);
    $momentstatus->saveInDb();
    $momentstatus->getLastInsertedId();
    $hashtags = new Hashtag();
    $hashtags->newHashtagFromMoment_status($momentstatus->moment_status, $momentstatus->moment_status_id);
    $hashtags->saveInDb();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>