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
    
    public function contructWithoutUser_id($username,$name,$email,$password,$date){
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->date = $date;
        $queryofUsernames = mysql_query("SELECT * FROM user_info WHERE username = '$username'");
        while($rowofUsersfromUsername = mysql_fetch_assoc($queryofUsernames)){
            $this->user_id = $rowofUsersfromUsername['user_id'];
        }
    }


    public function register() {
        $usersquery = mysql_query("INSERT INTO users VALUES ('','$email','$password')");
	$user_infoquery = mysql_query("INSERT INTO user_info VALUES ('','$name','$date','$username')");
        
    }
    
    public function login() {
                $_SESSION['user_id'] = $this->user_id;
		$_SESSION['email'] = $this->email;
		$_SESSION['name'] = $this->name;
		$_SESSION['date'] = $this->date;
		$_SESSION['username'] = $this->username;
		$_SESSION['loggedin'] = TRUE;
    }
    
    public function getProfilePicture($picturesize){
        if(is_readable("userfolders/$this->user_id/pictures/profilepicture.jpg")){
            echo '<img src="userfolders/'.$this->user_id.'/pictures/profilepicture.jpg" border=0 with="'.$picturesize.'" height="'.$picturesize.'">';}
        else{
             echo '<img src="php/profile/img/defaultprofilepicture.jpg" border=0 with="'.$picturesize.'" height="'.$picturesize.'">';}
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
    
    public function isCorrectPassword($password) {
        $cryptatedPassword = cryptatePassword($password);
        if($cryptatedPassword == $this->password){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function getNumberStatuses(){
        $queryofstatuses = mysql_query("SELECT * FROM status WHERE user_id = '$this->user_id'");
        $numberofstatuses = mysql_num_rows($queryofstatuses);
        return $numberofstatuses;
    }
    
    public function getNumberFollowees(){
        $queryoffollowees = mysql_query("SELECT * FROM follow WHERE follower_id = '$this->user_id'");
        $numberoffollowees = mysql_num_rows($queryoffollowees);
        return $numberoffollowees;
    }
    
    public function getNumberFollowers(){
        $queryoffollowers = mysql_query("SELECT * FROM follow WHERE followee_id = '$this->user_id'");
        $numberoffollowers = mysql_num_rows($queryoffollowers);
        return $numberoffollowers;
    }
}

?>