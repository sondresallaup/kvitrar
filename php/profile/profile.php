<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
createContainer();
createRow();
include $_SERVER['DOCUMENT_ROOT'] . '/php/profile/profilenavigation.php';
$friend = new Friend();
$friend->withUserTwoOrUserOneAndUseIsLoggedIn($profile_user->user_id);
if($friend->isFriends() || $profile_user == loggedInUser()){
include $_SERVER['DOCUMENT_ROOT'] . '/php/profile/statuses.php';
}
endBox();
?>