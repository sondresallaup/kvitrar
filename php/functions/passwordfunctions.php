<?php
function checkPasswordLength($password){
	if(strlen($password)>30){return "Passordet må være mindre enn 30 tegn.";}
		else if(strlen($password)<6){return "Passordet må være større enn 6 tegn.";}
			else
				return "TRUE";
}
function cryptatePassword($password){
	return md5($password);
}

function checkIfCorrectPassword($email,$password){
	$checkIfCorrectPasswordQuery = mysql_query("SELECT * FROM users WHERE email='$email'");
	while($checkIfCorrectPasswordRow = mysql_fetch_assoc($checkIfCorrectPasswordQuery)){
		$dbpassword = $checkIfCorrectPasswordRow['password'];
	}
	if(md5($password)==$dbpassword){return TRUE;}
	else {return FALSE;}
}
?>