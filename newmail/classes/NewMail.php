<?php
class NewMail{
    public $newmail_id;
    public $picture;
    public $picture_text;
    public $from_user_id;
    public $to_user_id;
    public $to_adress;
    public $time;
    public $printed;
    
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
            $this->printed = $withNewmail_idRow['printed'];
        }
    }
    
    public function constructWithUser_id($picture, $picture_text, $to_user_id){
        $this->picture = $picture;
        $this->picture_text = $picture_text;
        $this->from_user_id = loggedInUser()->user_id;
        $this->to_user_id = $to_user_id;
        $this->time = currentTime();
        $this->printed = 'FALSE';
    }
    
    public function constructWithAdress($picture, $picture_text, $to_adress){
        $this->picture = $picture;
        $this->picture_text = $picture_text;
        $this->from_user_id = loggedInUser()->user_id;
        $this->to_adress = $to_adress;
        $this->time = currentTime();
        $this->printed = 'FALSE';
    }
    
    public function saveInDb(){
        mysql_query("INSERT INTO newmail VALUES ('','$this->picture','$this->picture_text','$this->from_user_id','$this->to_user_id','$this->to_adress','$this->time','$this->printed')");
    }
    
    public function isPrinted(){
        if($this->printed == 'TRUE'){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function setAsPrinted(){
        mysql_query("UPDATE newmail SET printed = 'TRUE' WHERE newmail_id = '$this->newmail_id'");
    }
    
    public function getSender_user(){
        $sender_user = new User($this->from_user_id);
        return $sender_user;
    }
    
    public function getReceiver_user(){
        $receiver_user = new User($this->to_user_id);
        return $receiver_user;
    }
    
    public function isReceiverRegistered(){
        if($this->to_user_id){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function getAdress(){
        if($this->isReceiverRegistered()){
            $receiver_user = $this->getReceiver_user();
            $receiver_adress = $receiver_user->getUserAdress();
            return $receiver_adress->getWholeAdress();
        }
    }
    
    public function getPicture($height,$width){
        $sender_user = $this->getSender_user();
        $imgurl = $sender_user->getPictureURL($this->picture);
        return '<img src="'.$imgurl.'" height="'.$height.'" width="'.$width.'">';
    }
    
    public function printHead(){
        echo '<a href="#'.$this->newmail_id.'">';
        echo $this->newmail_id;
        echo '</a>';
    }
    
    public function printBody(){
        $sender_user = $this->getSender_user();
        echo '<div id="'.$this->newmail_id.'">';
        echo '<input type="radio" name="newmail_id" value="'.$this->newmail_id.'">';
        echo '<b>' . $this->newmail_id . '</b><br>';
        echo $this->getPicture(300,300);
        echo '<br>Receiver:<br><i>';
        echo $this->getAdress();
        echo '</i></div>';
    }
    
    
}


?>
