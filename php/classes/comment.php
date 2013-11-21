<?php
class Comment{
    public $comment_id;
    public $status_id;
    public $user_id;
    public $comment;
    public $time;
    
    public function withCommentandStatus_id($comment,$status_id) {
        $this->status_id = $status_id;
        $this->comment = $comment;
        $this->ifAttagMakeLink();
        $this->ifHashtagMakeLink();
        $this->user_id = loggedInUsersId();
        $this->time = currentTime();
        }
        
    public function withComment_id($comment_id) {
        $this->comment_id = $comment_id;
        $commentsByIdQuery = mysql_query("SELECT * FROM comments WHERE comment_id = '$this->comment_id'");
        while($commentsByIdRow = mysql_fetch_assoc($commentsByIdQuery)){
            $this->status_id = $commentsByIdRow['status_id'];
            $this->user_id = $commentsByIdRow['user_id'];
            $this->comment = $commentsByIdRow['comment'];
            $this->time = $commentsByIdRow['time'];
        }
    }
        
    public function saveInDb() {
        mysql_query("INSERT INTO comments VALUES ('','$this->status_id','$this->user_id','$this->comment','$this->time')");
        $this->comment_id = mysql_insert_id();
        $commentnotification = new Notification();
        $status = new Status();
        $status->withStatus_id($this->status_id);
        $commentnotification->byUser_idandType($status->user_id,"COMMENT",  $this->status_id);
        $commentnotification->saveInDb();
    }
    
    public function getLastInsertedId(){
        $this->comment_id = mysql_insert_id();
    }
    
    public function printComment() {
        $user = new User($this->user_id);
        
            $profile_id = $this->user_id;
            $profilepicturesize = 25;
            
            echo $user->getProfilePicture($profilepicturesize);
        echo '<b> <a href="/'. $user->username.'">'.$user->name.' '.$user->getUserTypeIcon(10).'</a></b>
                <p>'.  $this->comment.'</p>
               <i class="text-muted">'.  timeSince($this->time).'</i><br>';
    }
    
    public function ifHashtagMakeLink(){
        $this->comment = preg_replace("/#(\w+)/i", "<a href=\"/hashtag/?i=$1\">$0 </a>", $this->comment);
    }
    
    public function ifAttagMakeLink(){
        $this->comment = preg_replace("/@(\w+)/i", "<a href=\"/$1\">$0</a>", $this->comment);
    }
    
    }

?>