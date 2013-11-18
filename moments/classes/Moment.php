<?php
class Moment{
    public $moment_id;
    public $moment_name;
    public $moment_info;
    public $moment_from_time;
    public $moment_to_time;
    public $active;
    
    public function withMoment_id($moment_id){
        $this->moment_id = $moment_id;
        $withMoment_idQuery = mysql_query("SELECT * FROM moments WHERE moment_id = '$this->moment_id'");
        while($withMoment_idRow = mysql_fetch_assoc($withMoment_idQuery)){
            $this->moment_name = $withMoment_idRow['moment_name'];
            $this->moment_info = $withMoment_idRow['moment_info'];    
            $this->moment_from_time = $withMoment_idRow['moment_from_time'];       
            $this->moment_to_time = $withMoment_idRow['moment_to_time'];
            $this->active = $withMoment_idRow['active'];
        
        }
    }
    
    public function newMoment($moment_name,$moment_info,$moment_from_time,$moment_to_time,$active){
        $this->moment_id = '';
        $this->moment_name = $moment_name;
        $this->moment_info = $moment_info;
        $this->moment_from_time = $moment_from_time;
        $this->moment_to_time = $moment_to_time;
        $this->active = $active;
    }
    
    public function saveInDb(){
        mysql_query("INSERT INTO moments VALUES ('$this->moment_id','$this->moment_name','$this->moment_info',
                '$this->moment_from_time','$this->moment_to_time','$this->active')") or die("yo");
    }
    
    public function getMoment_id(){
        $this->moment_id = mysql_insert_id();
    }
    
    public function printMoment(){
       if($this->isAcitve()){
           echo createActiveMomentBox();
       }
       else{
           echo createInactiveMomentBox();
       }
       echo createMomentBoxHeader('<a href="/moments/'.$this->moment_id.'">'.$this->moment_name .'</a>');
       echo startMomentBoxBody();
       echo $this->moment_info;
       echo endMomentBox();
    }
    
    public function createDirectory(){
        mkdir($_SERVER['DOCUMENT_ROOT'] ."/moments/$this->moment_id", 0777);
        $thismomenttemplate = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/moments/template/momentindex.php", TRUE);
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/moments/$this->moment_id/index.php", $thismomenttemplate);
    }
    
    public function getGuests(){
        $guestsQuery = mysql_query("SELECT user_id FROM moment_guest WHERE moment_id = '$this->moment_id'");
        $i = 0;
        while($guestRow = mysql_fetch_assoc($guestsQuery)){
            $guests[$i++] = $guestRow['user_id'];
        }
        
        return $guests;
    }
    
    public function isAcitve() {
        if($this->active == 'TRUE'){
            return TRUE;
        }
        else{
            return FALSE;
        }
        
    }
   
}
