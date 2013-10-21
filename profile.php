<?php
session_start();
include 'php/header.php';
$profile_id = $_GET['i'];
$profile_user = new User($profile_id);

$user_id = loggedInUsersId();
$followee = new Followee($user_id,$profile_id);
include 'php/profile/profile.php';
include 'php/footer.php';
?>