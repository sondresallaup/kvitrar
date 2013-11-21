<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/userfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/phpmyadmin_connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/datefunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/friend_request.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/friend.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/user.php';

$user_two_id = $_GET['i'];

if(isset($user_two_id)){
    $friend = new Friend();
    $friend->withUserTwoOrUserOneAndUseIsLoggedIn($user_two_id);
    $friend->deleteFriend();
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>