<?php
session_start();
include 'php/header.php';
$user_id = loggedInUsersId();
$user = new User($user_id);

include 'php/connect.php';
include 'php/footer.php';
?>