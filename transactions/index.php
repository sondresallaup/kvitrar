<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';

echo "<br>";

if(!(isLoggedIn())){include $_SERVER['DOCUMENT_ROOT'] . '/php/signin.php';}
if(isLoggedIn()){include $_SERVER['DOCUMENT_ROOT'] . '/transactions/primary.php';}
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';

?>