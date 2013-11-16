<?php
createContainer();
createRow();
include $_SERVER['DOCUMENT_ROOT'] . '/php/profile/profilenavigation.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/profile/statuses.php';
if($profile_id == loggedInUsersId()){

}
endBox();
?>