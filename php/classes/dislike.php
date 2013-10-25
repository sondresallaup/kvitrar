<?php
class Dislike{
    public $dislike_id;
    public $disliker_id;
    public $status_id;
    
    public function withDislike_id($dislike_id) {
        $this->dislike_id = $dislike_id;
        $constructDislikeQuery = mysql_query("SELECT * FROM dislikes WHERE dislike_id = ''$this->dislike_id''");
        while($dislikeRow = mysql_fetch_assoc($constructDislikeQuery)){
            $this->disliker_id = $dislikeRow['disliker_id'];
            $this->status_id = $dislikeRow['status_id'];
        }
    }
    
    public function withStatus_id($status_id){
        $this->disliker_id = loggedInUsersId();
        $this->status_id = $status_id;
    }
    
    public function dislikeStatus(){
        mysql_query("INSERT INTO dislikes VALUES ('','$this->disliker_id','$this->status_id')");
        $dislikenotification = new Notification();
        $status = new Status();
        $status->withStatus_id($this->status_id);
        $dislikenotification->byUser_idandType($status->user_id,"DISLIKE",  $this->status_id);
        $dislikenotification->saveInDb();
        
    }
    
    public function undislikeStatus(){
        mysql_query("DELETE FROM dislikes WHERE disliker_id = '$this->disliker_id' AND status_id = '$this->status_id'");
        
    }
    
    public function isdislikedbyUser(){
        $isdislikedQuery = mysql_query("SELECT status_id FROM dislikes WHERE disliker_id = '$this->disliker_id'");
        if(mysql_num_rows($isdislikedQuery) != 0 ){
            while($isdislikedRow = mysql_fetch_assoc($isdislikedQuery)){
                $dbstatus_id = $isdislikedRow['status_id'];
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