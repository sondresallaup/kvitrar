<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/userfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/phpmyadmin_connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/datefunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/friend_request.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/user.php';


$to_user_id = $_GET['i'];
if(isset($to_user_id)){
    $friend_request = new Friend_request();
    $friend_request->newFriend_request(loggedInUser()->user_id, $to_user_id);
    $friend_request->saveInDb();
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>