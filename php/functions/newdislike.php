<?php
session_start();
include 'phpmyadmin_connect.php';
include '../classes/like.php';
include '../classes/dislike.php';
include 'userfunctions.php';
$status_id = $_GET['i'];

if($status_id){
    $newDislike = new Dislike();
    $newDislike->withStatus_id($status_id);
    $newLike = new Like();
    $newLike->withStatus_id($status_id);
    if(!$newDislike->isdislikedbyUser()){
        $newDislike->dislikeStatus();
        if($newLike->islikedbyUser()){
            $newLike->unlikeStatus();
        }
    }
    else{
        $newDislike->undislikeStatus();
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>