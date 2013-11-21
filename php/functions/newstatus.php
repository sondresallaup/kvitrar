<?php
session_start();
include 'statusfunctions.php';
include 'userfunctions.php';
include 'datefunctions.php';
include '../classes/status.php';
include '../classes/hashtag.php';

$newstatus = $_POST['status'];

if($newstatus){
    $status = new Status();
    $status->withStatus($newstatus);
    $status->saveInDb();
    $status->getLastInsertedId();
    $hashtags = new Hashtag();
    $hashtags->newHashtagFromStatus($status->status, $status->status_id);
    $hashtags->saveInDb();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>