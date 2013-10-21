<?php
session_start();
include 'phpmyadmin_connect.php';
include 'userfunctions.php';
include '../classes/followee.php';

$followee_id = $_GET['i'];

if($followee_id && isLoggedIn()){
    if(doUserExists($followee_id)){
        $follower_id = loggedInUsersId();
        
        $followee = new Followee($follower_id,$followee_id);
        if($followee->isFollowing()){
            $followee->unfollow();
        }
 
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>