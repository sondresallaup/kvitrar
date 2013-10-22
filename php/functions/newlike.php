<?php
session_start();
include 'phpmyadmin_connect.php';
include '../classes/like.php';
include '../classes/dislike.php';
include 'userfunctions.php';
$status_id = $_GET['i'];

if($status_id){
    $newlike = new Like();
    $newlike->withStatus_id($status_id);
    $newDislike = new Dislike();
    $newDislike->withStatus_id($status_id);
    if(!$newlike->isLikedbyUser()){
        $newlike->likeStatus();
        if($newDislike->isdislikedbyUser()){
            $newDislike->undislikeStatus();
        }
    }
    else{
        $newlike->unlikeStatus();
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>