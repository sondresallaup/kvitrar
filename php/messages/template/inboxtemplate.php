<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';
$user_id = loggedInUsersId();
$user = new User($user_id);

$contact_id = findUser_idByUsername($contact_username);

createContainer();
createRow();

include $_SERVER['DOCUMENT_ROOT'] . '/php/messages/contacts.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/messages/inbox.php';
    echo '</div>';
endBox();
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
?>