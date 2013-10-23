<?php
session_start();

include 'php/header.php';

echo "<br>";

if(!(isLoggedIn())){include 'php/signin.php';}
if(isLoggedIn()){include 'php/newsfeed.php';}
include 'php/footer.php';

?>