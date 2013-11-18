<?php
class Conversation{
    public $conversation_id;
    public $user_one;
    public $user_two;
    
    public function withConversation_id($conversation_id){
        $this->conversation_id = $conversation_id;
        $withconversation_idQuery = mysql_query("SELECT * FROM conversations WHERE conversation_id = '$this->conversation_id'");
        while($withconversation_idRow = mysql_fetch_assoc($withconversation_idQuery)){
            $this->user_one = $withconversation_idRow['user_one'];
            $this->user_two = $withconversation_idRow['user_two'];
        }
    }
    
    public function withUser_two($user_two){
        $this->user_one = loggedInUsersId();
        $this->user_two = $user_two;
    }
    
    public function saveInDb(){
        mysql_query("INSERT INTO conversations VALUES ('','$this->user_one','$this->user_two')");
        $findconversation_idQuery = mysql_query("SELECT conversation_id FROM conversation WHERE user_one = '$this->user_one' AND user_two = '$this->user_two'");
        while($findconversation_idRow = mysql_fetch_assoc($findconversation_idQuery)){
            $this->conversation_id = $findconversation_idRow['conversation_id'];
        }
    }
    
    public function isExisting(){
        $isExisistingQuery = mysql_query("SELECT * FROM conversations WHERE (user_one = '$this->user_one' AND user_two = '$this->user_two') OR (user_one = '$this->user_two' AND user_two = '$this->user_one')");
        if(mysql_num_rows($isExisistingQuery) != 0){
            return TRUE;
    }
    else{
        return FALSE;
    }
    }
    
    public function setConversation_id(){
        $setConversation_idQuery = mysql_query("SELECT * FROM conversations WHERE (user_one = '$this->user_one' AND user_two = '$this->user_two') OR (user_one = '$this->user_two' AND user_two = '$this->user_one')");
        while($setConversation_idRow = mysql_fetch_assoc($setConversation_idQuery)){
            $this->conversation_id = $setConversation_idRow['conversation_id'];
        }
    }
    
    public function printMessages(){
        $printmessagesQuery = mysql_query("SELECT * FROM messages WHERE conversation_id = '$this->conversation_id' ORDER BY message_id ASC");
        while($printmessagesRow = mysql_fetch_assoc($printmessagesQuery)){
            $from_id = $printmessagesRow['from_id'];
            $message_id = $printmessagesRow['message_id'];
            $message = new Message();
            $message->withMessage_id($message_id);
            $from_user = new User($from_id);
            $from_user->getProfilePicture(40);
            echo '<b> '.$from_user->name.'</b>';
            echo '<p>'.$message->message.'</p>';
            echo '<i>'.timeSince($message->time).'</i><hr>';
        }
    }
    
    }
?>