<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/phpmyadmin_connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/userfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/passwordfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/user.php';

$adminpassword = $_POST['adminpassword'];
$profile_id = $_POST['profile_id'];
$submit = $_POST['submit'];
$_SESSION['editusertypemessage'] = "";

if($submit){
    if($profile_id){
        if($adminpassword){
            if(loggedInUser()->isCorrectPassword($adminpassword)){
                $profile_user = new User($profile_id);
                $profile_user->verify();
                $_SESSION['editusertypemessage'] = $profile_user->name . " er verifisert";
            }
            else{
                $_SESSION['editusertypemessage'] = "Passordet er ikke korrekt";
            }
    }
    else{
        $_SESSION['editusertypemessage'] = "Skriv inn ditt passord";
    }
}
}
      header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
