<?php
class Status{
    public $status_id;
    public $user_id;
    public $status;
    public $time;
    
    public function __construct($status) {
        $this->status = $status;
        $this->user_id = loggedInUsersId();
        $this->time = date("Y-m-d-h-m-s");
        }
        
    public function saveInDb() {
        mysql_query("INSERT INTO status VALUES ('','$this->user_id','$this->status','$this->time')");
    }
        
    }

?>