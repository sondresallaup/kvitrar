<?php
session_start();
include 'php/header.php';
$profile_id = $_GET['i'];
include 'php/profile.php';
include 'php/footer.php';
?>