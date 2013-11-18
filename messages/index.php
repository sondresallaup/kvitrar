<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';
$user_id = loggedInUsersId();
$user = new User($user_id);

createContainer();
createRow();
include $_SERVER['DOCUMENT_ROOT'] . '/php/messages/contacts.php';

    include $_SERVER['DOCUMENT_ROOT'] . '/php/messages/newmessage.php';

endBox();
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
?>