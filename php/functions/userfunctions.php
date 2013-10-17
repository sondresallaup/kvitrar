<?php //userfunctions
session_start();

function findNameById($id){
	$findNameByIdQuery = mysql_query("SELECT * FROM user_info WHERE user_id = '$id'");
	while($findNameByIdRow = mysql_fetch_assoc($findNameByIdQuery)){
		$name = $findNameByIdRow['name'];
	}
	return $name;
}

function findUsernameById($id){
	$findUsernameByIdQuery = mysql_query("SELECT * FROM user_info WHERE user_id = '$id'");
	while($findUsernameByIdRow = mysql_fetch_assoc($findUsernameByIdQuery)){
		$username = $findUsernameByIdRow['username'];
	}
	return $username;
}

function findEmailById($id){
	$findEmailByIdQuery = mysql_query("SELECT * FROM users WHERE user_id = '$id'");
	while($findEmailByIdRow = mysql_fetch_assoc($findEmailByIdQuery)){
		$email = $findEmailByIdRow['email'];
	}
	return $email;
}

function loggedInUsersId(){
    return $_SESSION['user_id'];
}

function loggedInUsersName(){
    return $_SESSION['name'];
}

function loggedInUsersEmail(){
    return $_SESSION['email'];
}

function loggedInUsersRegistrationDate(){
    return $_SESSION['date'];
}

function loggedInUsersUsername(){
    return $_SESSION['username'];
}

function isLoggedIn(){
    return $_SESSION['loggedin'];
}

function checkIfEmailExists($email){
$emailquery = mysql_query("SELECT * FROM users WHERE email = '$email'");
$numemail = mysql_num_rows($emailquery);
	if($numemail==1){return TRUE;}
	else {return FALSE;}
}

function checkIfUsernameExists($username){
$usernamequery = mysql_query("SELECT * FROM user_info WHERE username = '$username'");
$numusername = mysql_num_rows($usernamequery);
	if($numusername==1){return TRUE;}
	else {return FALSE;}
}

function insertUserIntoDB($email,$password,$name,$username){
	$usersquery = mysql_query("INSERT INTO users VALUES ('','$email','$password')");
	$date = date("Y-m-d");
	$user_infoquery = mysql_query("INSERT INTO user_info VALUES ('','$name','$date','$username')");
}

function findUser_idByEmail($email){
	$findUser_idByEmailQuery = mysql_query("SELECT * FROM users WHERE email = '$email'");
	while($findUser_idByEmailRow = mysql_fetch_assoc($findUser_idByEmailQuery)){
		$user_id = $findUser_idByEmailRow['user_id'];
	}
	return $user_id;
}

function findUser_idByUsername($username){
	$findUser_idByUsernameQuery = mysql_query("SELECT * FROM user_info WHERE username = '$username'");
	while($findUser_idByUsernameRow = mysql_fetch_assoc($findUser_idByUsernameQuery)){
		$user_id = $findUser_idByUsernameRow['username'];
	}
	return $user_id;
}

function loginUser($id){
	$loginUserEmailQuery = mysql_query("SELECT * FROM users WHERE user_id = '$id'");
	while($loginUserEmailRow = mysql_fetch_assoc($loginUserEmailQuery)){
                $_SESSION['user_id'] = $loginUserEmailRow['user_id'];
		$_SESSION['email'] = $loginUserEmailRow['email'];
	}
	$loginUserInfoQuery = mysql_query(("SELECT * FROM user_info WHERE user_id = '$id'"));
	while($loginUserInfoRow = mysql_fetch_assoc($loginUserInfoQuery)){
		$_SESSION['name'] = $loginUserInfoRow['name'];
		$_SESSION['date'] = $loginUserInfoRow['date'];
		$_SESSION['username'] = $loginUserInfoRow['username'];
	}
		$_SESSION['loggedin'] = TRUE;
}

function check_email_address($email) { //http://stackoverflow.com/questions/6232846/best-email-validation-function-in-general-and-specific-college-domain
        // First, we check that there's one @ symbol, and that the lengths are right
        if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
            // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
            return false;
        }
        // Split it into sections to make life easier
        $email_array = explode("@", $email);
        $local_array = explode(".", $email_array[0]);
        for ($i = 0; $i < sizeof($local_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
                return false;
            }
        }
        if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
            $domain_array = explode(".", $email_array[1]);
            if (sizeof($domain_array) < 2) {
                return false; // Not enough parts to domain
            }
            for ($i = 0; $i < sizeof($domain_array); $i++) {
                if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                    return false;
                }
            }
        }

        return true;
    }
    
   function createNewUserDirectory($id){
       mkdir("./userfolders/$id/", 0777);
   }
   
   function createNewPicturesDirectory($id){
       mkdir("./userfolders/$id/pictures", 0777);
   }
   
   function createUserDirectoriesForAllUsers(){
       $queryForAllUsers = mysql_query("SELECT * FROM users WHERE 1");
	
        while($rowOfAllUsers = mysql_fetch_assoc($queryForAllUsers)){

        $user_id = $rowOfAllUsers['user_id'];
        
        createNewUserDirectory($user_id);
        createNewPicturesDirectory($user_id);
  
        }	
   }
   
   function findProfilePicture($id){
       return "userfolders/$id/pictures/profilepic.jpg";
   }
   
   function findCurrentPage(){
       return basename($_SERVER['PHP_SELF']);
   }

   function editUsersName($id,$newName){
       mysql_query("UPDATE user_info SET name = '$newName' WHERE user_id = '$id'");
   }
   
   function editUsersUsername($id,$newUsername){
       mysql_query("UPDATE user_info SET username = '$newUsername' WHERE user_id = '$id'");
   }
   
   function editUsersEmail($id,$newEmail){
       mysql_query("UPDATE users SET email = '$newEmail' WHERE user_id = '$id'");
   }
?>