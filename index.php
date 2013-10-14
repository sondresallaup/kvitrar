<?php
session_start();

include 'php/header.php';

if(!($_SESSION['loggedin'])){include 'php/signin.php';}
if($_SESSION['loggedin']){include 'php/newsfeed.php';}
include 'php/footer.php';

?>