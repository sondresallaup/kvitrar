<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/head.php';

$newmail_id = $_POST['newmail_id'];

$newmail = new NewMail();
$newmail->withNewmail_id($newmail_id);
$newmail->setAsPrinted();
$newmail_sender = $newmail->getSender_user();
$newmail_receiver = $newmail->getReceiver_user();

createContainer();
createRow();

echo '<div id="polaroid-img">';
echo '<img src="/newmail/img/polaroid.png" height="650"></div>';
echo '<div id="newmailinputtext">';
echo '<a>';
echo $newmail_sender->getProfilePicture(30);
echo ' ';
echo $newmail_sender->name;
echo ' <b>-></b> ';
echo $newmail_receiver->getProfilePicture(30);
echo ' ';
echo $newmail_receiver->name;
echo '</a><br>';
echo $newmail->getPicture(470,520);
echo '<br>';
echo $newmail->picture_text;
echo '<br><br><br><br><br><i class="text-muted">Copyright 2013 NewMail</i>';
echo '</div>';

echo '<br><hr>';
echo $newmail_receiver->getUserAdress()->getWholeAdress();

echo '<br><br><a href="/newmail/admin" class="btn btn-primary btn-lg active" role="button">Back</a><br><br>';
echo '</div></div>';

?>