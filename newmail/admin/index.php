<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';

echo "<br>";

if(!(isLoggedIn())){include $_SERVER['DOCUMENT_ROOT'] . '/php/signin.php';}
if(isLoggedIn()){include $_SERVER['DOCUMENT_ROOT'] . '/newmail/admin/primary.php';}
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';

?>