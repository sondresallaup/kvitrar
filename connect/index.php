<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';
if(!isLoggedIn()){
exit();
}
$user_id = loggedInUsersId();
$user = new User($user_id);

createContainer();
createRow();
include $_SERVER['DOCUMENT_ROOT'] . '/php/connect/connectnavigation.php';
endBox();
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
?>