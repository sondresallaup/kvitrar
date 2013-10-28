<?php
include 'phpmyadmin_connect.php';
include 'userfunctions.php';
include 'datefunctions.php';
include '../classes/conversation.php';
include '../classes/message.php';
include '../classes/user.php';

$to_user_username = $_POST['to_user'];
$message = $_POST['message'];

if($to_user_username && $message){
    $to_user = new User(findUser_idByUsername($to_user_username));
    $to_user_id = $to_user->user_id;
    $conversation = new Conversation();
    $conversation->withUser_two($to_user_id);
    if(!$conversation->isExisting()){
    $conversation->saveInDb();
    }
    $conversation->setConversation_id();
    $newmessage = new Message();
    $newmessage->withMessageandConversation_id($message, $conversation->conversation_id);
    $newmessage->saveInDb();
    
    
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>