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
    
    public function contructWithoutUser_id($username,$name,$email,$password){
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->date = currentTime();
        $queryofUsernames = mysql_query("SELECT * FROM user_info WHERE username = '$username'");
        while($rowofUsersfromUsername = mysql_fetch_assoc($queryofUsernames)){
            $this->user_id = $rowofUsersfromUsername['user_id'];
        }
    }
    
    public function withUsername($username){
        $this->username = $username;
        $withUsernameQuery_user_info = mysql_query("SELECT * FROM user_info WHERE username = '$this->username");
        while($withUsernameRow_user_info = mysql_fetch_assoc($withUsernameQuery_user_info)){
            $this->user_id = $withUsernameRow_user_info['user_id'];
            $this->name = $withUsernameRow_user_info['name'];
            $this->date = $withUsernameRow_user_info['date'];
        }
        $withUsernameQuery_users = mysql_query("SELECT * FROM users WHERE user_id = '$this->user_id'");
        while($withUsernameRow_users = mysql_fetch_assoc($withUsernameQuery_users)){
            $this->email = $withUsernameRow_users['email'];
            $this->password = $withUsernameRow_users['password'];
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
    
    public function getMessageContacts(){
        $getmessagecontactsQuery = mysql_query("SELECT * FROM conversations WHERE user_one = '$this->user_id' OR user_two = '$this->user_id'");
        while($getmessagecontactsRow = mysql_fetch_assoc($getmessagecontactsQuery)){
            if($getmessagecontactsRow['user_one']!=  loggedInUsersId()){
                $contact_id = $getmessagecontactsRow['user_one'];
            }
            else if($getmessagecontactsRow['user_two']!=  loggedInUsersId()){
                $contact_id = $getmessagecontactsRow['user_two'];
            }
            $contact = new User($contact_id);
            $getmessagecontactsString = '<li><a href="#'.$contact_id.'" data-toggle="tab">'.$contact->name.'</a></li>';
            echo $getmessagecontactsString;
        }
        
    }
    
    public function getMessages(){
        $getmessagesQuery = mysql_query("SELECT * FROM conversations WHERE user_one = '$this->user_id' OR user_two = '$this->user_id'");
        while($getmessagesRow = mysql_fetch_assoc($getmessagesQuery)){
            if($getmessagesRow['user_one']!=  loggedInUsersId()){
                $contact_id = $getmessagesRow['user_one'];
            }
            else if($getmessagesRow['user_two']!=  loggedInUsersId()){
                $contact_id = $getmessagesRow['user_two'];
            }
            $conversation_id = $getmessagesRow['conversation_id'];
            $conversation = new Conversation();
            $conversation->withConversation_id($conversation_id);
            $contact = new User($contact_id);
            echo '<div class="tab-pane" id="'.$contact_id.'">';
            createContentBoxtoRight();
            echo '<br><br>';
             echo '<div class="well">';
            echo '<h3> '.$contact->name.'</h3><hr>';
            $conversation->printMessages();
             echo '<form action="php/functions/newmessage.php" method="POST">';
            echo '<input type="hidden" name="to_user" value="'.$contact->username.'">';
            include 'php/messages/newmessageinputbox.php';
            
            echo '</div></div></div>';
        }
    }
}

?>