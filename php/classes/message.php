<?php
class Message{
    public $message_id;
    public $conversation_id;
    public $from_id;
    public $message;
    public $time;
    
    public function withMessage_id($message_id){
        $this->message_id = $message_id;
        $withmessage_idQuery = mysql_query("SELECT * FROM messages WHERE message_id = '$this->message_id'");
        while ($withmessage_idRow = mysql_fetch_assoc($withmessage_idQuery)){
            $this->conversation_id = $withmessage_idRow['conversation_id'];
            $this->from_id = $withmessage_idRow['from_id'];
            $this->message = $withmessage_idRow['message'];
            $this->time = $withmessage_idRow['time'];
        }
    }
    
    public function withMessageandConversation_id($message,$conversation_id){
        $this->message = $message;
        $this->conversation_id = $conversation_id;
        $this->time = currentTime();
        $this->from_id = loggedInUsersId();
    }
    
    public function saveInDb(){
        mysql_query("INSERT INTO messages VALUES('','$this->conversation_id','$this->from_id','$this->message','$this->time')");
    }
}
?>