<?php
class Status{
    public $status_id;
    public $user_id;
    public $status;
    public $time;
    public $media;
    
    public function withStatus($status) {
        $this->status = $status;
        $this->ifHashtagMakeLink();
        $this->ifAttagMakeLink();
        $this->user_id = loggedInUsersId();
        $this->time = currentTime();
        $this->media = 'FALSE';
        }
        
    public function withStatus_id($status_id) {
        $this->status_id = $status_id;
        $statusesByIdQuery = mysql_query("SELECT * FROM status WHERE status_id = '$this->status_id'");
        while($statusesByIdRow = mysql_fetch_assoc($statusesByIdQuery)){
            $this->user_id = $statusesByIdRow['user_id'];
            $this->status = $statusesByIdRow['status'];
            $this->time = $statusesByIdRow['time'];
            $this->media = $statusesByIdRow['media'];
        }
    }
    
    public function withMedia($status, $media){
        $this->status = $status;
        $this->ifHashtagMakeLink();
        $this->ifAttagMakeLink();
        $this->media = $media;
        $this->time = currentTime();
        $this->user_id = loggedInUser()->user_id;
    }
        
    public function saveInDb() {
        mysql_query("INSERT INTO status VALUES ('','$this->user_id','$this->status','$this->time','$this->media')");
    }
    
    public function getLastInsertedId(){
        $this->status_id = mysql_insert_id();
    }
    
    public function printStatus() {
        $user = new User($this->user_id);
            $profilepicturesize = 50;
            echo $user->getProfilePicture($profilepicturesize);
        echo '<b> <a href="/'.  $user->username.'">'.$user->name.' '.$user->getUserTypeIcon(15).'</a></b>';
        echo '<p class="text-muted">@'.$user->username.'</p>';
        echo '<p>'.  $this->status.'</p>';
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
    
    public function printComments(){
        $queryComment = mysql_query("SELECT * FROM comments WHERE status_id = '$this->status_id' ORDER BY comment_id ASC");
        while($commentRow = mysql_fetch_assoc($queryComment)){
            $comment_id = $commentRow['comment_id'];
            $comment = new Comment();
            $comment->withComment_id($comment_id);
            $comment->printComment();
        }
    }
    
    public function likeButton() {
        $like = new Like();
        $like->withStatus_id($this->status_id);
        if($like->isLikedbyUser()){
            echo '
            <button onclick="';
            echo "location.href='/php/functions/newlike.php?i=$this->status_id'";
            echo '" type="button" class="btn btn-success btn-xs">
                <span class="glyphicon glyphicon-thumbs-up"></span>
              </button>';
        }
        else{
        echo '
        <button onclick="';
        echo "location.href='/php/functions/newlike.php?i=$this->status_id'";
        echo '" type="button" class="btn btn-default btn-xs">
            <span class="glyphicon glyphicon-thumbs-up"></span>
          </button>';
        }
    }
    
    public function dislikeButton() {
        $dislike = new Dislike();
        $dislike->withStatus_id($this->status_id);
        if($dislike->isdislikedbyUser()){
            echo '
            <button onclick="';
            echo "location.href='/php/functions/newdislike.php?i=$this->status_id'";
            echo '" type="button" class="btn btn-danger btn-xs">
                <span class="glyphicon glyphicon-thumbs-down"></span>
              </button>';
        }
        else{
        echo '
        <button onclick="';
        echo "location.href='/php/functions/newdislike.php?i=$this->status_id'";
        echo '" type="button" class="btn btn-default btn-xs">
            <span class="glyphicon glyphicon-thumbs-down"></span>
          </button>';
        }
    }
    
    public function echoThoseWhichLikes() {
        $likersQuery = mysql_query("SELECT liker_id FROM likes WHERE status_id = '$this->status_id'");
        $numlikers = mysql_num_rows($likersQuery);
        if($numlikers != 0){
            $i = 1;
            while($likersRow = mysql_fetch_assoc($likersQuery)){
                $user = new User($likersRow['liker_id']);
                $stringOfLikers = $stringOfLikers.$user->name;
                if($numlikers > 1){
                    if($i == ($numlikers-1)){
                        $stringOfLikers = $stringOfLikers." og ";
                    }
                    else{
                        $stringOfLikers = $stringOfLikers.", ";
                    }
                    
                }
                
                $i++;
            }
            $stringOfLikers = $stringOfLikers." liker dette.";
            echo $stringOfLikers;
        }
    }
   
    public function echoThoseWhichDislikes() {
        $dislikersQuery = mysql_query("SELECT disliker_id FROM dislikes WHERE status_id = '$this->status_id'");
        $numdislikers = mysql_num_rows($dislikersQuery);
        if($numdislikers != 0){
            $i = 1;
            while($dislikersRow = mysql_fetch_assoc($dislikersQuery)){
                $user = new User($dislikersRow['disliker_id']);
                $stringOfdislikers = $stringOfdislikers.$user->name;
                if($numdislikers > 1){
                    if($i == ($numdislikers-1)){
                        $stringOfdislikers = $stringOfdislikers." og ";
                    }
                    else{
                        $stringOfdislikers = $stringOfdislikers.", ";
                    }
                    
                }
                
                $i++;
            }
            $stringOfdislikers = $stringOfdislikers." liker ikke dette.";
            echo $stringOfdislikers;
        }
    }
    
    public function ifHashtagMakeLink(){
        $this->status = preg_replace("/#(\w+)/i", "<a href=\"/hashtag/?i=$1\">$0 </a></a>", $this->status);
    }
    
    public function ifAttagMakeLink(){
        $this->status = preg_replace("/@(\w+)/i", "<a href=\"/$1\">$0</a>", $this->status);
    }
    
    public function isMedia(){
        if($this->media != 'FALSE'){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    
        public function startWell() {
        echo '<div class="well well-lg"><a name="#'.$this->status_id.'"/>';
    }
    
    public function endWell() {
        echo '</div>';
    }
        
    }

?>