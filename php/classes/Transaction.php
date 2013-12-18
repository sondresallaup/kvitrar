<?php
class Transaction{
    public $transaction_id;
    public $user_id;
    public $subject;
    public $value;
    public $time;
    
    public function withTransaction_id($transaction_id){
        $this->transaction_id = $transaction_id;
        $withTransaction_idQuery = mysql_query("SELECT * FROM transactions WHERE transaction_id = '$this->transaction_id'");
        while($withTransaction_idRow = mysql_fetch_assoc($withTransaction_idQuery)){
            $this->user_id = $withTransaction_idRow['user_id'];
            $this->subject = $withTransaction_idRow['subject'];
            $this->value = $withTransaction_idRow['value'];
            $this->time = $withTransaction_idRow['time'];
        }
    }
    
    public function constructNewTransaction($subject,$value){
        $this->user_id = loggedInUser()->user_id;
        $this->subject = $subject;
        $this->value = $value;
        $this->time = currentTime();
    }
    
    public function saveInDb(){
        mysql_query("INSERT INTO transactions VALUES ('','$this->user_id','$this->subject','$this->value','$this->time')");
    }
    
    public function printTransaction(){
        echo '<p>'.$this->subject.' - NOK '. $this->value .'</p>';
        echo '<i>' . $this->time . '</i>';
    }
    
    
    
}
?>
