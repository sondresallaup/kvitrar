<?php
class User_adress{
    public $user_id;
    public $street;
    public $zip;
    public $city;
    public $country;
    
    public function getAdressByUser_id($user_id) {
        $constructQuery = mysql_query("SELECT * FROM user_adresses WHERE user_id = '$user_id'");
        while($constructRow = mysql_fetch_assoc($constructQuery)){
            $this->user_id = $constructRow['user_id'];
            $this->street = $constructRow['street'];
            $this->zip = $constructRow['zip'];
            $this->city = $constructRow['city'];
            $this->country = $constructRow['country'];
        }
    }
    
    public function setAdress($user_id){
        $this->user_id = $user_id;
    }
    
    public function editStreet($street){
        mysql_query("UPDATE user_adresses SET street = '$street' WHERE user_id = '$this->user_id'");
    }
    
    public function editZip($zip){
        mysql_query("UPDATE user_adresses SET zip = '$zip' WHERE user_id = '$this->user_id'");
    }
    
    public function editCity($city){
        mysql_query("UPDATE user_adresses SET city = '$city' WHERE user_id = '$this->user_id'");
    }
    
    public function editCountry($country){
        mysql_query("UPDATE user_adresses SET country = '$country' WHERE user_id = '$this->user_id'");
    }
    
    public function isExisting() {
        $issetQuery = mysql_query("SELECT * FROM user_adresses WHERE user_id = '$this->user_id'");
        while($issetRow = mysql_fetch_assoc($issetQuery)){
            if($issetRow['user_id']){
                return TRUE;
            }
        }
        return FALSE;
    }
    
    public function createAdress($street,$zip,$city,$country){
        mysql_query("INSERT INTO user_adresses VALUES ('$this->user_id','$street','$zip','$city','$country')");
    }
    
    public function getUser(){
        $user = new User($this->user_id);
        return $user;
    }


    public function getWholeAdress(){
        $name = $this->getUser()->name;
        $adress = $name . '<br>' . $this->street . '<br>' . $this->zip . '<br>' . $this->city . '<br>' . $this->country;
        return $adress;
    }
}

?>
