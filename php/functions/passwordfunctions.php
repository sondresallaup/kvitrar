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

function generateNewPassword(){
	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function editPassword($id,$newPassword){
	$editPasswordQuery = mysql_query("UPDATE users SET password = '$newPassword' WHERE user_id ='$id'");
}
?>