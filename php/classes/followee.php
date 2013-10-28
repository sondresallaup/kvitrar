<?php
class Followee {
    public $follower_id;
    public $followee_id;
    public $time;

    public function __construct($follower_id,$followee_id) {
        $this->follower_id = $follower_id;
        $this->followee_id = $followee_id;
        $this->time = currentTime();
    }
    
    public function isFollowing() {
        $isSavedQuery = mysql_query("SELECT * FROM follow WHERE follower_id ='$this->follower_id' AND followee_id = '$this->followee_id'");
        $numFollowRows = mysql_num_rows($isSavedQuery);
        if($numFollowRows != 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function follow() {
        mysql_query("INSERT INTO follow VALUES ('','$this->follower_id','$this->followee_id','$this->time') ");
        $follownotification = new Notification();
        $follownotification->byUser_idandType($this->followee_id, "FOLLOW", '');
        $follownotification->saveInDb();
    }
    
    public function unfollow() {
        mysql_query("DELETE FROM follow WHERE follower_id ='$this->follower_id' AND followee_id = '$this->followee_id'");
    }
    
   
}

?>
