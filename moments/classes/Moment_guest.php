<?php
class Moment_guest{
    public $moment_guest_id;
    public $moment_id;
    public $user_id;
    public $host;
    
    public function withMoment_guest_id($moment_guest_id){
        $this->moment_guest_id = $moment_guest_id;
        $withMoment_guest_idQuery = mysql_query("SELECT * FROM moment_guest WHERE moment_guest_id = '$this->moment_guest_id'");
        while($withMoment_guest_idRow = mysql_fetch_assoc($withMoment_guest_idQuery)){
            $this->moment_id = $withMoment_guest_idRow['moment_id'];
            $this->user_id = $withMoment_guest_idRow['user_id'];
            $this->host = $withMoment_guest_idRow['host'];
        }
    }
    
    public function newMoment_guest($moment_id,$user_id,$host){
        $this->moment_guest_id = '';
        $this->moment_id = $moment_id;
        $this->user_id = $user_id;
        $this->host = $host;
    }
    
    public function setMomentCreatorAsHost($moment_id){
        $this->moment_guest_id = '';
        $this->moment_id = $moment_id;
        $this->user_id = loggedInUser()->user_id;
        $this->host = 'TRUE';
    }
    
    public function saveInDb(){
        mysql_query("INSERT INTO moment_guest VALUES ('$this->moment_guest_id','$this->moment_id','$this->user_id','$this->host')");
    }
    
    public function getMoment_guest_id(){
        $this->moment_guest_id = mysql_insert_id();
    }
    
    
}

?>
