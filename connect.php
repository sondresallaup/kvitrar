<?php
session_start();
include 'php/header.php';
$user_id = loggedInUsersId();
$user = new User($user_id);

createContainer();
createRow();
include 'php/connect/connectnavigation.php';
endBox();
include 'php/footer.php';
?>