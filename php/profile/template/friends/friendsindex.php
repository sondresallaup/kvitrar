<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';
$profile_id = findUser_idByUsername($profile_username);

$profile_user = new User($profile_id);

$user_id = loggedInUsersId();
$friend = new Friend;
$friend->withUserTwoOrUserOneAndUseIsLoggedIn($profile_user->user_id);
createContainer();
createRow();
include $_SERVER['DOCUMENT_ROOT'] . '/php/profile/profilenavigation.php';
if($friend->isFriends() || $profile_user == loggedInUser()){
include $_SERVER['DOCUMENT_ROOT'] . '/php/profile/friends.php';
}
endBox();

include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
 

?>