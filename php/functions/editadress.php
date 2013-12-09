<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/userfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/phpmyadmin_connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/datefunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/user.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/user_adress.php';

$submit = $_POST['submit'];
if($submit){
    $street = $_POST['street'];
    $zip = $_POST['zip'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    
    $user_adress = new User_adress();
    $user_adress->setAdress(loggedInUser()->user_id);
    
    if($user_adress->isExisting()){
        if($street){$user_adress->editStreet($street);}
        if($zip){$user_adress->editZip($zip);}
        if($city){$user_adress->editCity($city);}
        if($country){$user_adress->editCountry($country);}
    }
    else{
        $user_adress->createAdress($street, $zip, $city, $country);
    }
    
}


header('Location: ' . $_SERVER['HTTP_REFERER']);
?>