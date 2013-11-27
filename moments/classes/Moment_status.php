<?php
class Moment_status{
    public $moment_status_id;
    public $moment_id;
    public $user_id;
    public $moment_status;
    public $time;
    public $media;
    
    public function withMoment_status_id($moment_status_id){
        $this->moment_status_id = $moment_status_id;
        $withMoment_status_idQuery = mysql_query("SELECT * FROM moment_status WHERE moment_status_id = '$this->moment_status_id'");
        while($withMoment_status_idRow = mysql_fetch_assoc($withMoment_status_idQuery)){
            $this->moment_id = $withMoment_status_idRow['moment_id'];
            $this->user_id = $withMoment_status_idRow['user_id'];
            $this->moment_status = $withMoment_status_idRow['moment_status'];
            $this->time = $withMoment_status_idRow['time'];
            $this->media = $withMoment_status_idRow['media'];
        }
    }
    
    public function withMoment_statusAndMoment_id($moment_status,$moment_id){
        $this->moment_status_id = '';
        $this->moment_id = $moment_id;
        $this->moment_status = $moment_status;
        $this->ifHashtagMakeLink();
        $this->ifAttagMakeLink();
        $this->user_id = loggedInUser()->user_id;
        $this->time = currentTime();
        $this->media = 'FALSE';
    }
    
    public function withMedia($moment_status,$moment_id,$media){
        $this->moment_status_id = '';
        $this->moment_id = $moment_id;
        $this->moment_status = $moment_status;
        $this->ifHashtagMakeLink();
        $this->ifAttagMakeLink();
        $this->user_id = loggedInUser()->user_id;
        $this->time = currentTime();
        $this->media = $media;
    }
    
    public function saveInDb(){
        mysql_query("INSERT INTO moment_status VALUES ('$this->moment_status_id','$this->moment_id','$this->user_id','$this->moment_status','$this->time','$this->media')");
    }
    
    public function getLastInsertedId(){
        $this->moment_status_id = mysql_insert_id();
    }
    
    public function printMoment_status(){
        $user = new User($this->user_id);
            $profilepicturesize = 50;
            echo $user->getProfilePicture($profilepicturesize);
        echo '<b> <a href="/'.  $user->username.'">'.$user->name.' '.$user->getUserTypeIcon(15).'</a></b>';
        echo '<p class="text-muted">@'.$user->username.'</p>';
        echo '<p>'.  $this->moment_status.'</p>';
        if($this->isMedia()){
            echo $this->printMedia();
        }
        echo '<i class="text-muted">'. timeSince($this->time).'</i><br>';      
    }
    
    public function printMedia(){
        $user = new User($this->user_id);
        $imgsize = 350;
        echo '<img src="/'.$user->username.'/pictures/'.$this->media.'" width="'.$imgsize.'"><br>';
    }
    
    public function printMoment_status_comments(){
        $queryComment = mysql_query("SELECT * FROM moment_status_comments WHERE moment_status_id = '$this->moment_status_id' ORDER BY moment_status_comment_id ASC");
        while($commentRow = mysql_fetch_assoc($queryComment)){
            $moment_status_comment_id = $commentRow['moment_status_comment_id'];
            $moment_status_comment = new Moment_status_comment();
            $moment_status_comment->withMoment_status_comment_id($moment_status_comment_id);
            $moment_status_comment->printMoment_status_comment();
        }
    }
    
    public function ifHashtagMakeLink(){
        $this->moment_status = preg_replace("/#(\w+)/i", "<a href=\"/hashtag/?i=$1\">$0 </a></a>", $this->moment_status);
    }
    
    public function ifAttagMakeLink(){
        $this->moment_status = preg_replace("/@(\w+)/i", "<a href=\"/$1\">$0</a>", $this->moment_status);
    }
    
    public function isMedia(){
        if($this->media == 'FALSE'){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    
    public function startWell() {
        echo '<div class="well well-lg"><a name="#'.$this->moment_status_id.'"/>';
    }
    
    public function endWell() {
        echo '</div>';
    }
}


?>
