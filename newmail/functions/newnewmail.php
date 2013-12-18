<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/phpmyadmin_connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/userfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/datefunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/user.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/wallet.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/user_adress.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/Transaction.php';
include $_SERVER['DOCUMENT_ROOT'] . '/newmail/classes/NewMail.php';

$submit = $_POST['submit'];
if($submit){
    $picture = $_POST['picture'];
    $picturetext = $_POST['picturetext'];
    $friends = $_POST['friends'];
    $price = $_POST['price'];
    $numberAdresses = $price / 14;
    if($picture && $picturetext && $friends && $price){
        $wallet = loggedInUser()->setWallet();
        if($wallet->isEnoughInWallet($price)){
            $wallet->takeFromWallet($price);
            $transaction = new Transaction();
            $transaction->constructNewTransaction('NewMail * '. $numberAdresses, $price);
            $transaction->saveInDb();
            if(is_array($friends)){
            foreach($friends as $to_user_id){
                $newmail = new NewMail();
                $newmail->constructWithUser_id($picture, $picturetext, $to_user_id);
                $newmail->saveInDb();
                $return = 'success';
            }
            }
        }
        else{
            $return = 'money';
        }
    }
}

header('Location: /newmail/?return='.$return);
?>
