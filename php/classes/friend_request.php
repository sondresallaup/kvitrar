<?php
class Friend_request{
    public $friend_request_id;
    public $from_user_id;
    public $to_user_id;
    public $time;
    
    public function withFriend_request_id($friend_request_id){
        $this->friend_request_id = $friend_request_id;
        $withFriend_request_idQuery = mysql_query("SELECT * FROM friend_requests WHERE friend_request_id = '$this->friend_request_id'");
        while($withFriend_request_idRow = mysql_fetch_assoc($withFriend_request_idQuery)){
            $this->from_user_id = $withFriend_request_idRow['from_user_id'];
            $this->to_user_id = $withFriend_request_idRow['to_user_id'];
            $this->time = $withFriend_request_idRow['time'];
        }
    }
    
    public function withTo_user_idWhereFromUserIsLoggedIn($to_user_id){
        $this->to_user_id = $to_user_id;
        $this->from_user_id = loggedInUser()->user_id;
        $withTo_user_idWhereFromUserIsLoggedInQuery = mysql_query("SELECT * FROM friend_requests WHERE from_user_id = '$this->from_user_id' AND to_user_id = '$this->to_user_id'");
        while($withTo_user_idWhereFromUserIsLoggedInRow = mysql_fetch_assoc($withTo_user_idWhereFromUserIsLoggedInQuery)){
            $this->friend_request_id = $withTo_user_idWhereFromUserIsLoggedInRow['friend_request_id'];
            $this->time = $withTo_user_idWhereFromUserIsLoggedInRow['time'];
        }
        
    }
    
    public function newFriend_request($from_user_id,$to_user_id){
        $this->friend_request_id = "";
        $this->from_user_id = $from_user_id;
        $this->to_user_id = $to_user_id;
        $this->time = currentTime();
    }
    
    public function saveInDb(){
        mysql_query("INSERT INTO friend_requests VALUES ('$this->friend_request_id','$this->from_user_id','$this->to_user_id','$this->time')");
    }
    
    public function deleteFriend_request(){
        mysql_query("DELETE FROM friend_requests WHERE friend_request_id = '$this->friend_request_id'");
    }
    
    public function hasSentFriend_request(){
        $hasSentFriend_requestQuery = mysql_query("SELECT * FROM friend_requests WHERE from_user_id = '$this->from_user_id' AND to_user_id = '$this->to_user_id'");
        if(mysql_num_rows($hasSentFriend_requestQuery) == 1){
            return TRUE;
        }
        
        else{
            return FALSE;
        }
    }
    
    public function hasReceivedFriend_request(){
        $hasReceivedFriend_requestQuery = mysql_query("SELECT * FROM friend_requests WHERE from_user_id = '$this->to_user_id' AND to_user_id = '$this->from_user_id'");
        if(mysql_num_rows($hasReceivedFriend_requestQuery) == 1){
            return TRUE;
        }
        
        else{
            return FALSE;
        }
    }
}

?>