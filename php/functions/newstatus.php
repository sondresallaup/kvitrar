<?php
session_start();
include 'statusfunctions.php';
include 'userfunctions.php';
include '../classes/status.php';

$newstatus = $_POST['status'];

if($newstatus){
    $status = new Status();
    $status->withStatus($newstatus);
    $status->saveInDb();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>