<?php
session_start();
include 'phpmyadmin_connect.php';
include 'userfunctions.php';
include 'passwordfunctions.php';

$email = strtolower(strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);
//check that all fields are input
if($email&&$password){
if(checkIfEmailExists($email)){
	if(checkIfCorrectPassword($email,$password)){
		$id = findUser_idByEmail($email);
		loginUser($id);
	}
	else {$_SESSION['loginmsg']="Ikkje korrekt kodeord";}
}
else {$_SESSION['loginmsg']="Epost finnes ikkje";}
}
else {$_SESSION['loginmsg']="Vær vennleg og fyll ut alle felt";}
header('Location: http://sondresallaup.com');

?>