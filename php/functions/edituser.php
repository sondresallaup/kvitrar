<?php
include 'phpmyadmin_connect.php';
include 'userfunctions.php';

$newName = $_POST['name'];
$newUsername = $_POST['username'];
$newEmail = $_POST['email'];

if($newName != findNameById(loggedInUsersId())){
    editUsersName(loggedInUsersId(),$newName);   
}

if($newUsername != findUsernameById(loggedInUsersId())){
    editUsersUsername(loggedInUsersId(),$newUsername);   
}

if($newEmail != findEmailById(loggedInUsersId())){
    editUsersEmail(loggedInUsersId(),$newEmail);   
}

$headerUserId = loggedInUsersId();

header("location: ../../profile.php?i=$headerUserId");
?>