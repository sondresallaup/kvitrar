<?php
class User{
    public $user_id;
    public $username;
    public $name;
    public $email;
    public $password;
    public $date;
    
    public function __construct($user_id) {
        $this->user_id = $user_id;
        $constructQueryofUsers = mysql_query("SELECT * FROM users WHERE user_id = '$user_id'");
        while($constructRowofUsers = mysql_fetch_assoc($constructQueryofUsers)){
            $this->email = $constructRowofUsers['email'];
            $this->password = $constructRowofUsers['password'];
        }
        $constructQueryofUser_info = mysql_query("SELECT * FROM user_info WHERE user_id = '$user_id'");
        while($constructRowofUser_info = mysql_fetch_assoc($constructQueryofUser_info)){
            $this->name = $constructRowofUser_info['name'];
            $this->date = $constructRowofUser_info['date'];
            $this->username = $constructRowofUser_info['username'];
        }
    }
    
    public function register() {
        $usersquery = mysql_query("INSERT INTO users VALUES ('','$email','$password')");
	$user_infoquery = mysql_query("INSERT INTO user_info VALUES ('','$name','$date','$username')");
        
    }
    
    public function login() {
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
    
    public function editUsername($newUsername) {
        mysql_query("UPDATE user_info SET username = '$newUsername' WHERE user_id = '$this->user_id'");
    }
    
    public function editEmail($newEmail) {
        mysql_query("UPDATE users SET email = '$newEmail' WHERE user_id = '$this->user_id'");
    }
    
    public function editName($newName) {
        mysql_query("UPDATE user_info SET name = '$newName' WHERE user_id = '$this->user_id'");
    }
    
    public function editPassword($newPassword) {
        mysql_query("UPDATE users SET password = '$newPassword' WHERE user_id = '$this->user_id'");
    }
}

?>