<?php
session_start();
include 'userfunctions.php';
include 'passwordfunctions.php';
include 'phpmyadmin_connect.php';
include 'datefunctions.php';

$submit = $_POST['submit'];

$name = strip_tags($_POST['name']);
$username = strtolower(strip_tags($_POST['username']));
$email = strtolower(strip_tags($_POST['email']));

$password = strip_tags($_POST['password']);
$repeatpassword = strip_tags($_POST['repeatpassword']);
	//check that all fields are input
	if($name&&$email&&$password&&$repeatpassword&&$username){
		
		if(checkIfEmailExists($email)){$_SESSION['registermsg'] = "Eposten er opptatt";}
		else{
		if(!(check_email_address($email))){$_SESSION['registermsg'] = "Eposten er ugyldig";}
		else{
			if(checkIfUsernameExists($username)){$_SESSION['registermsg'] = "Brukernamnet er opptatt";}
			else{
			if(!(checkPasswordLength($password)=="TRUE")){$_SESSION['registermsg'] = checkPasswordLength($password);}
			else{
			$password = cryptatePassword($password);
			$repeatpassword = cryptatePassword($repeatpassword);

			if($password==$repeatpassword){
                            
                            
				insertUserIntoDB($email,$password,$name,$username);
                                
                                $_SESSION['registermsg'] = "Du er nå registrert";
                                				
			}
			else
			$_SESSION['registermsg'] = "Passordene samsvarer ikkje";
		}
}
}
}}
else
	$_SESSION['registermsg'] = "Fyll ute alle felt!";

		header('Location: ../../registrer.php');

?>