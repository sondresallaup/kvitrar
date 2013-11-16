<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';
$profile_id = findUser_idByUsername($profile_username);

$profile_user = new User($profile_id);

$user_id = loggedInUsersId();
$followee = new Followee($user_id,$profile_id);
createContainer();
createRow();
include $_SERVER['DOCUMENT_ROOT'] . '/php/profile/profilenavigation.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/profile/followers.php';
endBox();

include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
 

?>