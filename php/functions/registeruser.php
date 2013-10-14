<?php
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
		
		if(!(checkIfEmailExists($email))){echo "Dette brukernavnet er oppdatt";}
		else{

			if(!(checkPasswordLength($password))){echo checkPasswordLength($password);}
			else{
			$password = cryptatePassword($password);
			$repeatpassword = cryptatePassword($repeatpassword);

			if($password==$repeatpassword){
				insertUserIntoDB($email,$password,$name,$username);

				echo "Du er blitt registrert!";
			}
			else
			echo "Passordene samsvarer ikke";
		}
}

}
else
	echo "Fyll ute alle felt!";
?>