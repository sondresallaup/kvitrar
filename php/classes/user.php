<?php
class User{
    public $user_id;
    public $username;
    public $name;
    public $email;
    public $password;
    public $date;
    public $user_type;
    
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
            $this->user_type = $constructRowofUser_info['user_type'];
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
            $this->user_type = $withUsernameRow_user_info['user_type'];
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
        echo '<img src="/'.$this->username.'/pictures/profilepicture.jpg" border=0 width="'.$picturesize.'" height="'.$picturesize.'" class="img-circle">';
    }
    
    public function getUserAdress(){
        $user_adress = new User_adress();
        $user_adress->getAdressByUser_id($this->user_id);
        return $user_adress;
    }
    
    public function editUsername($newUsername) {
        mysql_query("UPDATE user_info SET username = '$newUsername' WHERE user_id = '$this->user_id'");
        rename(($_SERVER['DOCUMENT_ROOT'] .'/'.$this->username), ($_SERVER['DOCUMENT_ROOT'] .'/'.$newUsername));
        rename(($_SERVER['DOCUMENT_ROOT'] .'/messages/'.$this->username), ($_SERVER['DOCUMENT_ROOT'] .'/messages/'.$newUsername));
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
    
    public function getNumberFriends(){
        $queryoffriends = mysql_query("SELECT * FROM friends WHERE user_one_id = '$this->user_id' OR user_two_id = '$this->user_id'");
        $numberoffriends = mysql_num_rows($queryoffriends);
        return $numberoffriends;
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
            $getmessagecontactsString = '<li';
            if('/messages/'.$contact->username.'/index.php' == findCurrentPage()){$getmessagecontactsString = $getmessagecontactsString . ' class="active"';}
            $getmessagecontactsString = $getmessagecontactsString . '><a href="/messages/'.$contact->username.'">'.$contact->name.'</a></li>';
            echo $getmessagecontactsString;
        }
        
    }
    
    public function getMessages($usertwo_id){
        $getmessagesQuery = mysql_query("SELECT * FROM conversations WHERE (user_one = '$this->user_id' AND user_two = '$usertwo_id') OR (user_one = '$usertwo_id' AND user_two = '$this->user_id')");
        if(mysql_num_rows($getmessagesQuery) == 0){
            $contact = new User($usertwo_id);
            createContentBoxtoRight();
            echo '<div class="tab-pane" id="'.$usertwo_id.'">';
             echo '<div class="well">';
            echo '<h3><a href="/'.$contact->username.'"> '.$contact->name.'</a></h3><hr>';
             echo '<form action="/php/functions/newmessage.php" method="POST">';
            echo '<input type="hidden" name="to_user" value="'.$contact->username.'">';
            include $_SERVER['DOCUMENT_ROOT'] . '/php/messages/newmessageinputbox.php';
            
            echo '</div></div></div>';
        }
        else{
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
            createContentBoxtoRight();
            echo '<div class="tab-pane" id="'.$contact_id.'">';
             echo '<div class="well">';
            echo '<h3><a href="/'.$contact->username.'"> '.$contact->name.'</a></h3><hr>';
            $conversation->printMessages();
             echo '<form action="/php/functions/newmessage.php" method="POST">';
            echo '<input type="hidden" name="to_user" value="'.$contact->username.'">';
            include $_SERVER['DOCUMENT_ROOT'] . '/php/messages/newmessageinputbox.php';
            
            echo '</div></div></div>';
        }
        }
    }
    
    public function isVerified(){
        if($this->user_type == 'VERIFIED'){
            return TRUE;
        }
    else{
        return FALSE;
    }
    }
    
    public function isAdmin(){
      if($this->user_type == 'ADMIN'){
            return TRUE;
        }
    else{
        return FALSE;
    }  
    }
    
    public function verify(){
        if(!$this->isVerified()){
            mysql_query("UPDATE user_info SET user_type = 'VERIFIED' WHERE user_id = '$this->user_id'");
        }
    }
    
    public function hasAdress(){
        $user_adress = $this->getUserAdress();
        if($user_adress->isExisting()){
            return TRUE;
        }
        return FALSE;
    }
    
    public function setWallet(){
        $wallet = new Wallet($this->user_id);
        return $wallet;
    }
    
    public function getWalletValue(){
        return $this->setWallet()->amount;
    }

    public function getUserTypeIcon($iconSize){
        if($this->isVerified()){
            return '  <img src="/php/profile/img/verifiedaccount.png" alt="Vertifisert" height="'.$iconSize.'" width="'.$iconSize.'" title="Vertifisert">';
        }
        else if($this->isAdmin()){
            return '  <img src="/php/profile/img/adminaccount.png" alt="Administrator" height="'.$iconSize.'" width="'.$iconSize.'" title="Administrator">'; 
        }
    }
        
    public function getNumberUnSeenNotifications(){
    $unseennotificationsquery = mysql_query("SELECT seen FROM notifications WHERE to_user_id = '$this->user_id' AND seen = 'FALSE'");
    $numberunseennotifications = mysql_num_rows($unseennotificationsquery);
    return $numberunseennotifications;
}

    public function setAllNotificationsToUserToSeen(){
    $setseennotificationsquery = mysql_query("SELECT seen FROM notifications WHERE to_user_id = '$this->user_id' AND seen = 'FALSE'");
    while($setseennotificationsRow = mysql_fetch_assoc($setseennotificationsquery)){
        $notification_id = $setseennotificationsRow['notification_id'];
        $notification = new Notification();
        $notification->byNotification_id($notification_id);
        $notification->setAsSeen();
    }
    }
    
    public function getNotificationsInDropdown(){
        $numberNotificationLimit = 10;
        $getNotificationsInDropdownQuery = mysql_query("SELECT notification_id FROM notifications WHERE to_user_id = '$this->user_id' ORDER BY notification_id DESC");
        while($getNotificationsInDropdownRow = mysql_fetch_assoc($getNotificationsInDropdownQuery)){
            $notification_id = $getNotificationsInDropdownRow['notification_id'];
            $notification = new Notification();
            $notification->byNotification_id($notification_id);
            
            echo '<li><a href="/connect">'.$notification->printShortNotification().'</a></li>';
            
            
            
            if(++$i > $numberNotificationLimit){
                break;
            }
        }
    }
    
    public function getPictureURL($picture){
        return '/' . $this->username . '/pictures/' . $picture;
    }
}

?>