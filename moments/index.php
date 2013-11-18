<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';

echo "<br>";

if(!(isLoggedIn())){include $_SERVER['DOCUMENT_ROOT'] . '/php/signin.php';}
if(isLoggedIn()){include $_SERVER['DOCUMENT_ROOT'] . '/moments/moments.php';}
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';

?>