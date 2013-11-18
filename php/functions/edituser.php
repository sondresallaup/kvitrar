<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] .'/php/functions/phpmyadmin_connect.php';
include $_SERVER['DOCUMENT_ROOT'] .'/php/functions/userfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] .'/php/classes/user.php';

$newName = $_POST['name'];
$newUsername = $_POST['username'];
$newEmail = $_POST['email'];

if($newName != loggedInUser()->name){
    loggedInUser()->editName($newName);  
}

if($newUsername != loggedInUser()->username){
    if(!checkIfUsernameExists($newUsername)){
        loggedInUser()->editUsername($newUsername);
        createNewUserDirectory(loggedInUser()->user_id);
    }
}

if($newEmail != loggedInUser()->email){
    if(check_email_address($newEmail)){
        if(!checkIfEmailExists($newEmail)){
            loggedInUser()->editEmail($newEmail);  
    }
    }
}

$headerUser = loggedInUser()->username;

header("location: /$headerUserId");
?>