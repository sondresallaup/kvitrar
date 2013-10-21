<?php
class Like{
    public $like_id;
    public $liker_id;
    public $likee_id;
    public $status_id;
    
    public function __construct($status_id) {
        $this->status_id = $status_id;
        
    }
}
?>