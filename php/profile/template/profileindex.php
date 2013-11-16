<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';
$profile_id = findUser_idByUsername($profile_username);

$profile_user = new User($profile_id);

$user_id = loggedInUsersId();
$followee = new Followee($user_id,$profile_id);
include $_SERVER['DOCUMENT_ROOT'] . '/php/profile/profile.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
 

?>