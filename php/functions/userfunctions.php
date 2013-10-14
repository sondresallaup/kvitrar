<?php //userfunctions

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

?>