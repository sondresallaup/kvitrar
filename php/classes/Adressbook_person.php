<?php
class Adress_person{
    public $user_id;
    public $name;
    public $street;
    public $zip;
    public $city;
    public $country;
    
    public function withAdress($name, $street, $zip, $city, $country){
        $this->name = $name;
        $this->street = $street;
        $this->zip = $zip;
        $this->city = $city;
        $this->country = $country;
    }
    
    public function withUser_id($user_id){
        $this->user_id;
        $this->selectFromUser_info_db();
        $this->selectFromUser_adresses_db();
    }
    
    public function saveInDb(){
        $this->insertIntoUser_db();
        $this->setLastIdasUser_id();
        $this->insertIntoUser_info_db();
        $this->insertIntoUser_adresses_db();
    }
    
    public function insertIntoUser_db(){
        mysql_query("INSERT INTO users VALUES ('','','')");
    }
    
    public function insertIntoUser_info_db(){
        $currentTime = currentTime();
        mysql_query("INSERT INTO user_info VALUES ('','$this->name','$currentTime','','NOTUSER')");
    }
    
    public function insertIntoUser_adresses_db(){
        mysql_query("INSERT INTO user_adresses VALUES ('$this->user_id','$this->street','$this->zip','$this->city','$this->country')");
    }
    
    public function selectFromUser_info_db(){
        $user_infoQuery = mysql_query("SELECT name FROM user_info WHERE user_id = '$this->user_id'");
        while($user_infoRow = mysql_fetch_assoc($user_infoQuery)){
            $this->name = $user_infoRow['name'];
        }
    }
    
    public function selectFromUser_adresses_db(){
        $user_adressesQuery = mysql_query("SELECT * FROM user_adresses WHERE user_id = '$this->user_id'");
        while($user_adressesRow = mysql_fetch_assoc($user_adressesQuery)){
            $this->street = $user_adressesRow['street'];
            $this->zip = $user_adressesRow['zip'];
            $this->city = $user_adressesRow['city'];
            $this->country = $user_adressesRow['country'];
        }
    }
    
    public function delete(){
        mysql_query("DELETE FROM user_info WHERE user_id = '$this->user_id'");
        mysql_query("DELETE FROM user_adresses WHERE user_id = '$this->user_id'");
    }
    
    public function setLastIdasUser_id(){
        $this->user_id =  mysql_insert_id();
    }
}



?>
