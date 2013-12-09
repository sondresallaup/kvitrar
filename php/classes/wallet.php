<?php
class Wallet{
    public $user_id;
    public $amount;
    
    public function __construct($user_id) {
        $this->user_id = $user_id;
        $constructQuery = mysql_query("SELECT amount FROM wallet WHERE user_id = '$this->user_id'");
        while($constructRow = mysql_fetch_assoc($constructQuery)){
            $this->amount = $constructRow['amount'];
        }
    }
    
    public function addToWallet($value){
        mysql_query("UPDATE wallet SET amount = amount + '$value' WHERE user_id = '$this->user_id'");
    }
    
    public function takeFromWallet($value){
        mysql_query("UPDATE wallet SET amount = amount - '$value' WHERE user_id = '$this->user_id'");
    }

    public function isEnoughInWallet($value){
        if($value < $this->amount){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
}


?>