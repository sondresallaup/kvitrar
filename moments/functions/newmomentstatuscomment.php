<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/phpmyadmin_connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/userfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/datefunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/moments/classes/Moment_status_comment.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/notification.php';
include $_SERVER['DOCUMENT_ROOT'] . '/moments/classes/Moment_status.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/hashtag.php';

$newmomentstatuscomment = $_POST['momentstatuscomment'];
$momentstatus_id = $_POST['momentstatus_id'];

if($newmomentstatuscomment){
    $momentstatuscomment = new Moment_status_comment();
    $momentstatuscomment->withMoment_status_commentandMoment_status_id($newmomentstatuscomment, $momentstatus_id);
    $momentstatuscomment->saveInDb();
    $hashtags = new Hashtag();
    $hashtags->newHashtagFromMoment_status_comment($momentstatuscomment->moment_status_comment, $momentstatuscomment->moment_status_comment_id);
    $hashtags->saveInDb();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>