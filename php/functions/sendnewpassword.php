<?php
session_start();
include 'phpmyadmin_connect.php';
include 'passwordfunctions.php';
include 'userfunctions.php';
include 'emailfunctions.php';
$email_or_username = strtolower($_POST['email-or-username']);

if($email_or_username){

	if(!(checkIfEmailExists($email_or_username)) && !(checkIfUsernameExists($email_or_username))){
		$_SESSION['newpasswordmsg']="Hverken epost eller brukernavn eksisterer";
		header("location: ../../forgottenpassword.php");}

	if(checkIfEmailExists($email_or_username)){
		$user_id = findUser_idByEmail($email_or_username);
		$email = $email_or_username;
	}
	else if(checkIfUsernameExists($email_or_username)){
		$user_id = findUser_idByUsername($email_or_username);
		$email = findEmailById($user_id);
	}

		$generatedPassword = generateNewPassword();
		$cryptatedNewPassword = cryptatePassword($generatedPassword);

		editPassword($user_id,$cryptatedNewPassword);
		
		sendEmailWithNewPassword($email,$generatedPassword);

		$_SESSION['newpasswordmsg']="Epost med nytt kodeord er sendt";
		header("location: ../../forgottenpassword.php");
	}	

else{
	$_SESSION['newpasswordmsg']="Vennligst skriv inn et brukernavn eller en epost";
		header("location: ../../forgottenpassword.php");
}
?>