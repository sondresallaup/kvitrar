<?php
$submit = $_POST['submit'];

$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);

$password = strip_tags($_POST['password']);
$repeatpassword = strip_tags($_POST['repeatpassword']);
	//check that all fields are input
	if($name&&$email&&$password&&$repeatpassword){
		//check if email exists
		include 'phpmyadmin_connect.php';
		$emailquery = mysql_query("SELECT * FROM users WHERE email = '$email'");
		$numemail = mysql_num_rows($emailquery);
		if($numemail!=0){echo "Dette brukernavnet er oppdatt";}
		else{

			if(strlen($password)>30||strlen($password)<6){echo "Passordet må være mellom 6 og 30 tegn";}
			else{
			$password = md5($password);
			$repeatpassword = md5($repeatpassword);

			if($password==$repeatpassword){
				$regquery = mysql_query("INSERT INTO users VALUES ('','$email','$password')");

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