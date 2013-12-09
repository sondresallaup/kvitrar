<?php
class NewMail{
    public $newmail_id;
    public $picture;
    public $picture_text;
    public $from_user_id;
    public $to_user_id;
    public $to_adress;
    public $time;
    
    public function withNewmail_id($newmail_id){
        $withNewmail_idQuery = mysql_query("SELECT * FROM newmail WHERE newmail_id = '$newmail_id'");
        while($withNewmail_idRow = mysql_fetch_assoc($withNewmail_idQuery)){
            $this->newmail_id = $withNewmail_idRow['newmail_id'];
            $this->picture = $withNewmail_idRow['picture'];
            $this->picture_text = $withNewmail_idRow['picture_text'];
            $this->from_user_id = $withNewmail_idRow['from_user_id'];
            $this->to_user_id = $withNewmail_idRow['to_user_id'];
            $this->to_adress = $withNewmail_idRow['to_adress'];
            $this->time = $withNewmail_idRow['time'];
        }
    }
    
    public function constructWithUser_id($picture, $picture_text, $to_user_id){
        $this->picture = $picture;
        $this->picture_text = $picture_text;
        $this->from_user_id = loggedInUser()->user_id;
        $this->to_user_id = $to_user_id;
        $this->time = currentTime();
    }
    
    public function constructWithAdress($picture, $picture_text, $to_adress){
        $this->picture = $picture;
        $this->picture_text = $picture_text;
        $this->from_user_id = loggedInUser()->user_id;
        $this->to_adress = $to_adress;
        $this->time = currentTime();
    }
    
    public function saveInDb(){
        mysql_query("INSERT INTO newmail VALUES ('','$this->picture','$this->picture_text','$this->from_user_id','$this->to_user_id','$this->to_adress','$this->time')");
    }
    
    
}


?>
