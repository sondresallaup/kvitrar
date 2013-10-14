<?php //userfunctions
		include 'phpmyadmin_connect.php';

function findUserById($id,$x){ // $x = 'name' to return name, $x = 'email' to return email. Returns FALSE if user don't exists
	$findUserByIdQuery = mysql_query("SELECT * FROM users WHERE user_id = '$id'");
	$findUserByIdNumRows = mysql_num_rows($findUserByIdQuery);
	if(findUserByIdNumRows==0){return FALSE;}
	else{
		while ($findUserByIdRow = mysql_fetch_assoc($findUserByIdQuery)){
			$dbemail = $findUserByIdRow['email'];
			$dbname = $findUserByIdRow['name'];
		}
		if($x == "name"){return $dbname;}
		if($x == "email"){return $dbname;}
		else
			return FALSE;
	}
}

function checkIfEmailExists($email){
$emailquery = mysql_query("SELECT * FROM users WHERE email = '$email'");
$numemail = mysql_num_rows($emailquery);
	if($numemail==1){return TRUE;}
	else
		return FALSE;
}

function insertUserIntoDB($email,$password,$name,$username){
	$usersquery = mysql_query("INSERT INTO users VALUES ('','$email','$password')");
	$date = date("Y-m-d");
	$user_infoquery = mysql_query("INSERT INTO user_info VALUES ('','$name','$date','$username')");
}

?>