<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/userfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/phpmyadmin_connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/datefunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/friend_request.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/friend.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/user.php';

$user_two_id = $_GET['i'];

if(isset($user_two_id)){
    $friend_request = new Friend_request();
    $friend_request->withTo_user_idWhereFromUserIsLoggedIn($user_two_id);
    $friend_request->deleteFriend_request();
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>