<?php
session_start();
include 'statusfunctions.php';
include 'userfunctions.php';

$newstatus = $_POST['status'];

if($newstatus){
    $user_id = loggedInUsersId();
    createNewStatus($user_id,$newstatus);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>