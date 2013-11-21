<?php
createContainer();
createRow();
include $_SERVER['DOCUMENT_ROOT'] . '/php/profile/profilenavigation.php';
$friend = new Friend();
$friend->withUserTwoOrUserOneAndUseIsLoggedIn($profile_user->user_id);
if($friend->isFriends()){
include $_SERVER['DOCUMENT_ROOT'] . '/php/profile/statuses.php';
}
endBox();
?>