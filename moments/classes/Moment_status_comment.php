<?php
class Moment_status_comment{
    public $moment_status_comment_id;
    public $moment_status_id;
    public $user_id;
    public $moment_status_comment;
    public $time;
    
    public function withMoment_status_commentandMoment_status_id($moment_status_comment,$moment_status_id) {
        $this->moment_status_id = $moment_status_id;
        $this->moment_status_comment = $moment_status_comment;
        $this->ifAttagMakeLink();
        $this->ifHashtagMakeLink();
        $this->user_id = loggedInUsersId();
        $this->time = currentTime();
        }
        
    public function withMoment_status_comment_id($moment_status_comment_id) {
        $this->moment_status_comment_id = $moment_status_comment_id;
        $commentsByIdQuery = mysql_query("SELECT * FROM moment_status_comments WHERE moment_status_comment_id = '$this->moment_status_comment_id'");
        while($commentsByIdRow = mysql_fetch_assoc($commentsByIdQuery)){
            $this->moment_status_id = $commentsByIdRow['moment_status_id'];
            $this->user_id = $commentsByIdRow['user_id'];
            $this->moment_status_comment = $commentsByIdRow['moment_status_comment'];
            $this->time = $commentsByIdRow['time'];
        }
    }
        
    public function saveInDb() {
        mysql_query("INSERT INTO moment_status_comments VALUES ('','$this->moment_status_id','$this->user_id','$this->moment_status_comment','$this->time')");
        $this->moment_status_comment_id = mysql_insert_id();
        $commentnotification = new Notification();
        $moment_status = new Moment_status();
        $moment_status->withMoment_status_id($this->moment_status_id);
        $commentnotification->byUser_idandType($moment_status->user_id,"MOMENTSTATUSCOMMENT",  $this->moment_status_id);
        $commentnotification->saveInDb();
    }
    
    public function getLastInsertedId(){
        $this->comment_id = mysql_insert_id();
    }
    
    public function printMoment_status_comment() {
        $user = new User($this->user_id);
        
            $profile_id = $this->user_id;
            $profilepicturesize = 25;
            
            echo $user->getProfilePicture($profilepicturesize);
        echo '<b> <a href="/'. $user->username.'">'.$user->name.' '.$user->getUserTypeIcon(10).'</a></b>
                <p>'.  $this->moment_status_comment.'</p>
               <i class="text-muted">'.  timeSince($this->time).'</i><br>';
    }
    
    public function ifHashtagMakeLink(){
        $this->moment_status_comment = preg_replace("/#(\w+)/i", "<a href=\"/hashtag/?i=$1\">$0 </a>", $this->moment_status_comment);
    }
    
    public function ifAttagMakeLink(){
        $this->moment_status_comment = preg_replace("/@(\w+)/i", "<a href=\"/$1\">$0</a>", $this->moment_status_comment);
    }
    
    }

?>