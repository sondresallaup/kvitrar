<?php
class Notification{
    public $notification_id;
    public $from_user_id;
    public $to_user_id;
    public $notification_type;
    public $type_id;
    public $time;
    
    public function byUser_idandType($to_user_id,$notification_type,$type_id) {
        $this->from_user_id = loggedInUsersId();
        $this->to_user_id = $to_user_id;
        $this->notification_type = $notification_type;
        $this->type_id = $type_id;
    }
    
    public function byNotification_id($notification_id){
        $this->notification_id = $notification_id;
        $notificationsbyidQuery = mysql_query("SELECT * FROM notifications WHERE notification_id = '$this->notification_id'");
        while($notificationsbyidRow = mysql_fetch_assoc($notificationsbyidQuery)){
            $this->from_user_id = $notificationsbyidRow['from_user_id'];
            $this->to_user_id = $notificationsbyidRow['to_user_id'];
            $this->notification_type = $notificationsbyidRow['notification_type'];
            $this->type_id = $notificationsbyidRow['type_id'];
            $this->time = $notificationsbyidRow['time'];
        }
    }
    
    public function saveInDb(){
        $this->time = date("Y-m-d-h-m-s");
        if(!$this->isFromandToUserTheSame() && !$this->isAlreadyNotified()){
        $saveNotificationindbQuery = mysql_query("INSERT INTO notifications VALUES ('','$this->from_user_id','$this->to_user_id','$this->notification_type','$this->type_id','$this->time')");
        }
    }
    
    public function printNotification(){
        $fromUser = new User($this->from_user_id);
        $printNotificationString = $fromUser->getProfilePicture(50);
        $printNotificationString = $printNotificationString." <b>".$fromUser->name."</b> ".$this->getNotificationHeader();
        $printNotificationString = $printNotificationString."<br>".$this->getNotificationIcon();
        $printNotificationString = $printNotificationString." <i>".$this->getNotificationBody()."</i>";
        echo $printNotificationString ."<hr>";
        
        
    }
    
public function getNotificationHeader(){
    if($this->notification_type == "LIKE"){
        return "liker din status";
    }
    else if($this->notification_type == "DISLIKE"){
        return "liker ikke din status";
    }
    else if($this->notification_type == "COMMENT"){
        return "kommenterte din status";
    }
    else if($this->notification_type == "FOLLOW"){
        return "følger nå deg";
    }
}

public function getNotificationBody(){
    if($this->notification_type == "LIKE"){
        $status = new Status();
        $status->withStatus_id($this->type_id);
        return $status->status;
    }
    else if($this->notification_type == "DISLIKE"){
        $status = new Status();
        $status->withStatus_id($this->type_id);
        return $status->status;
    }
    else if($this->notification_type == "COMMENT"){
        $comment = new Comment();
        $comment->withComment_id($this->type_id);
        return $comment->comment;
    }
}

public function getNotificationIcon(){
    if($this->notification_type == "LIKE"){
        return '<span class="glyphicon glyphicon-thumbs-up"></span>';
    }
    else if($this->notification_type == "DISLIKE"){
        return '<span class="glyphicon glyphicon-thumbs-down"></span>';
    }
    else if($this->notification_type == "COMMENT"){
        return '<span class="glyphicon glyphicon-comment"></span>';
    }
    else if($this->notification_type == "FOLLOW"){
        return '<span class="glyphicon glyphicon-book"></span>';
    }
}


    public function isFromandToUserTheSame(){
        if($this->from_user_id == $this->to_user_id){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function isAlreadyNotified(){
        $isalreadynotifiedQuery = mysql_query("SELECT * FROM notifications WHERE from_user_id = '$this->from_user_id' AND to_user_id = '$this->to_user_id' AND notification_type = '$this->notification_type' AND type_id = '$this->type_id'");
        if(mysql_num_rows($isalreadynotifiedQuery) != 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
}