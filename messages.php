<?php
session_start();
include 'php/header.php';
$user_id = loggedInUsersId();
$user = new User($user_id);
$to_user_id = $_GET['i'];

createContainer();
createRow();
include 'php/messages/messages.php';
endBox();
include 'php/footer.php';
?>