<?php
include 'phpmyadmin_connect.php';
include 'userfunctions.php';
include 'passwordfunctions.php';

$currentPassword = $_POST['currentpassword'];
$newPassword = $_POST['newpassword'];
$repeatPassword = $_POST['repeatpassword'];

if($currentPassword&&$newPassword&&$repeatPassword){
    if(checkIfCorrectPassword(loggedInUsersEmail(),$currentPassword)){
        if($newPassword == $repeatPassword){
            if(checkPasswordLength($newPassword)=="TRUE"){
                $cryptatedPassword = cryptatePassword($newPassword);
                editPassword(loggedInUsersId(), $cryptatedPassword);
                $headerUserId = loggedInUsersId();
                header("location: ../../profile.php?i=$headerUserId");
            }
            else{
                return checkPasswordLength($newPassword);
            }
        }
        else{
           echo "Passordene samsvarer ikke"; 
        }
    }
    else{
        echo "Ikke korrekt passord";
    }
    
}
 else {
    echo "Vennligst fyll ut alle felt";
}

?>
