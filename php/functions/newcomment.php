<?php
session_start();
include 'statusfunctions.php';
include 'userfunctions.php';
include 'datefunctions.php';
include '../classes/comment.php';
include '../classes/notification.php';
include '../classes/status.php';
include '../classes/hashtag.php';

$newcomment = $_POST['comment'];
$status_id = $_POST['status_id'];

if($newcomment){
    $comment = new Comment();
    $comment->withCommentandStatus_id($newcomment,$status_id);
    $comment->saveInDb();
    $hashtags = new Hashtag();
    $hashtags->newHashtagFromComment($comment->comment, $comment->comment_id);
    $hashtags->saveInDb();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>