<?php
session_start();
include 'userfunctions.php';
include 'passwordfunctions.php';
include 'phpmyadmin_connect.php';

$submit = $_POST['submit'];

$name = strip_tags($_POST['name']);
$username = strip_tags($_POST['username']);
$email = strip_tags($_POST['email']);

$password = strip_tags($_POST['password']);
$repeatpassword = strip_tags($_POST['repeatpassword']);
	//check that all fields are input
	if($name&&$email&&$password&&$repeatpassword&&$username){
		
		if(checkIfEmailExists($email)){$_SESSION['registermsg'] = "Eposten er opptatt";}
		else{
			if(checkIfUsernameExists($username)){$_SESSION['registermsg'] = "Brukernamnet er opptatt";}
			else{
			if(!(checkPasswordLength($password)=="TRUE")){$_SESSION['registermsg'] = checkPasswordLength($password);}
			else{
			$password = cryptatePassword($password);
			$repeatpassword = cryptatePassword($repeatpassword);

			if($password==$repeatpassword){
				insertUserIntoDB($email,$password,$name,$username);

				$_SESSION['registermsg'] = "Du er blitt registrert!";
			}
			else
			$_SESSION['registermsg'] = "Passordene samsvarer ikkje";
		}
}

}}
else
	$_SESSION['registermsg'] = "Fyll ute alle felt!";

		header('Location: ../../registrer.php');

?>