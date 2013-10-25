<?php
class Like{
    public $like_id;
    public $liker_id;
    public $status_id;
    
    public function withLike_id($like_id) {
        $this->like_id = $like_id;
        $constructLikeQuery = mysql_query("SELECT * FROM like WHERE like_id = ''$this->like_id''");
        while($likeRow = mysql_fetch_assoc($constructLikeQuery)){
            $this->liker_id = $likeRow['liker_id'];
            $this->status_id = $likeRow['status_id'];
        }
    }
    
    public function withStatus_id($status_id){
        $this->liker_id = loggedInUsersId();
        $this->status_id = $status_id;
    }
    
    public function likeStatus(){
        mysql_query("INSERT INTO likes VALUES ('','$this->liker_id','$this->status_id')");
        $likenotification = new Notification();
        $status = new Status();
        $status->withStatus_id($this->status_id);
        $likenotification->byUser_idandType($status->user_id,"LIKE",$this->status_id);
        $likenotification->saveInDb();
        
    }
    
    public function unlikeStatus(){
        mysql_query("DELETE FROM likes WHERE liker_id = '$this->liker_id' AND status_id = '$this->status_id'");
        
    }
    
    public function isLikedbyUser(){
        $isLikedQuery = mysql_query("SELECT status_id FROM likes WHERE liker_id = '$this->liker_id'");
        if(mysql_num_rows($isLikedQuery) != 0 ){
            while($isLikedRow = mysql_fetch_assoc($isLikedQuery)){
                $dbstatus_id = $isLikedRow['status_id'];
                if($dbstatus_id == $this->status_id){
                return TRUE;
            }
            }
            
        }
        else{
            return FALSE;
        }
    }
    
   
}
?>