<?php
class Friend{
    public $friend_id;
    public $user_one_id;
    public $user_two_id;
    public $time;
    
    public function withFriend_id($friend_id){
        $this->friend_id = $friend_id;
        $withFriend_idQuery = mysql_query("SELECT * FROM friends WHERE friend_id = '$this->friend_id'");
        while($withFriend_idRow = mysql_fetch_assoc($withFriend_idQuery)){
            $this->user_one_id = $withFriend_idRow['user_one_id'];
            $this->user_two_id = $withFriend_idRow['user_two_id'];
            $this->time = $withFriend_idRow['time'];
        }
    }
    
    public function withUserTwoOrUserOneAndUseIsLoggedIn($user){
        $loggedinuser_id = loggedInUser()->user_id;
        $withUserTwoOrUserOneAndUseIsLoggedInQuery = mysql_query("SELECT * FROM friends WHERE user_one_id = '$user' AND user_two_id = '$loggedinuser_id'");
        if(mysql_num_rows($withUserTwoOrUserOneAndUseIsLoggedInQuery) == 1){
            while($withUserTwoOrUserOneAndUseIsLoggedInRow = mysql_fetch_assoc($withUserTwoOrUserOneAndUseIsLoggedInQuery)){
                $this->friend_id = $withUserTwoOrUserOneAndUseIsLoggedInRow['friend_id'];
                $this->user_one_id = $withUserTwoOrUserOneAndUseIsLoggedInRow['user_one_id'];
                $this->user_two_id = $withUserTwoOrUserOneAndUseIsLoggedInRow['user_two_id'];
            }
            return;
        }
        else{
           $withUserTwoOrUserOneAndUseIsLoggedInQuery = mysql_query("SELECT * FROM friends WHERE user_one_id = '$loggedinuser_id' AND user_two_id = '$user'"); 
        
           if(mysql_num_rows($withUserTwoOrUserOneAndUseIsLoggedInQuery) == 1){
            while($withUserTwoOrUserOneAndUseIsLoggedInRow = mysql_fetch_assoc($withUserTwoOrUserOneAndUseIsLoggedInQuery)){
                $this->friend_id = $withUserTwoOrUserOneAndUseIsLoggedInRow['friend_id'];
                $this->user_one_id = $withUserTwoOrUserOneAndUseIsLoggedInRow['user_one_id'];
                $this->user_two_id = $withUserTwoOrUserOneAndUseIsLoggedInRow['user_two_id'];
            }
            return;
        }
           
        }
    }
    
    public function newFriend($user_one_id,$user_two_id){
        $this->friend_id = "";
        $this->user_one_id = $user_one_id;
        $this->user_two_id = $user_two_id;
        $this->time = currentTime();
    }
    
    public function saveInDb(){
        mysql_query("INSERT INTO friends VALUES ('$this->friend_id','$this->user_one_id','$this->user_two_id','$this->time')");
    }
    
    public function deleteFriend(){
        mysql_query("DELETE FROM friends WHERE friend_id = '$this->friend_id'");
    }
    
    public function isFriends(){
        $isFriendsQuery = mysql_query("SELECT * FROM friends WHERE user_one_id = '$this->user_one_id' AND user_two_id = '$this->user_two_id'");
        if(mysql_num_rows($isFriendsQuery) == 1){
            return TRUE;
        }
        $isFriendsQuery = mysql_query("SELECT * FROM friends WHERE user_one_id = '$this->user_two_id' AND user_two_id = '$this->user_one_id'");
        if(mysql_num_rows($isFriendsQuery) == 1){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
}

?>