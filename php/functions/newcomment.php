<?php
session_start();
include 'statusfunctions.php';
include 'userfunctions.php';
include '../classes/comment.php';

$newcomment = $_POST['comment'];
$status_id = $_POST['status_id'];

if($newcomment){
    $comment = new Comment();
    $comment->withCommentandStatus_id($newcomment,$status_id);
    $comment->saveInDb();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>