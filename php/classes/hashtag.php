<?php
class Hashtag{
    public $hashtag_id;
    public $hashtag;
    public $hashtag_type;
    public $hashtag_type_id;
    
    public function withHashtag_id($hashtag_id){
        $this->hashtag_id = $hashtag_id;
        $withHashtag_idQuery = mysql_query("SELECT * FROM hashtags WHERE hashtag_id = '$this->hashtag_id'");
        while($withHashtag_idRow = mysql_fetch_assoc($withHashtag_idQuery)){
            $this->hashtag = $withHashtag_idRow['hashtag'];
            $this->hashtag_type = $withHashtag_idRow['hashtag_type'];
            $this->hashtag_type_id = $withHashtag_idRow['hashtag_type_id'];
        }
    }
    
    public function newHashtagFromStatus($status, $status_id){
        $this->hashtag_id = "";
        $this->hashtag_type = 'STATUS';
        $this->hashtag_type_id = $status_id;
        $this->saveAllHashTagsInArray($status);
    }
    
    public function newHashtagFromComment($comment, $comment_id){
        $this->hashtag_id = "";
        $this->hashtag_type = 'COMMENT';
        $this->hashtag_type_id = $comment_id;
        $this->saveAllHashTagsInArray($comment);
    }
    
    public function newHashtagFromMoment_status($moment_status, $moment_status_id){
        $this->hashtag_id = "";
        $this->hashtag_type = 'MOMENT_STATUS';
        $this->hashtag_type_id = $moment_status_id;
        $this->saveAllHashTagsInArray($moment_status);
    }
    
    public function newHashtagFromMoment_status_comment($moment_status_comment, $moment_status_comment_id){
        $this->hashtag_id = "";
        $this->hashtag_type = 'MOMENT_STATUS_COMMENT';
        $this->hashtag_type_id = $moment_status_comment_id;
        $this->saveAllHashTagsInArray($moment_status_comment);
    }
    
    public function saveAllHashTagsInArray($string){
        $this->hashtagArray = array();
        $i = 0;
        if (preg_match_all('/#([^\s]+)/', $string, $matches)) {
            foreach ($matches[0] as $hash){
                $hash = str_replace('#','',$hash);
                $this->hashtagArray[$i++] = $hash;
            }
        }
    }
    
    public function saveInDb(){
        foreach($this->hashtagArray as $hashtag){
            mysql_query("INSERT INTO hashtags VALUES ('$this->hashtag_id','$hashtag','$this->hashtag_type','$this->hashtag_type_id')");
        }
    }
}
?>