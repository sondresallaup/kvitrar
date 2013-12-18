<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/phpmyadmin_connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/userfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/statusfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/datefunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/user.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/user_adress.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/Adressbook_person.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/followee.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/friend_request.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/friend.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/status.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/like.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/dislike.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/comment.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/notification.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/conversation.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/message.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/wallet.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/Transaction.php';
include $_SERVER['DOCUMENT_ROOT'] . '/newmail/classes/NewMail.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/generatejsonfilefromusers.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/stylingfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/moments/classes/Moment.php';
include $_SERVER['DOCUMENT_ROOT'] . '/moments/classes/Moment_guest.php';
include $_SERVER['DOCUMENT_ROOT'] . '/moments/classes/Moment_status.php';
include $_SERVER['DOCUMENT_ROOT'] . '/moments/classes/Moment_status_comment.php';
include $_SERVER['DOCUMENT_ROOT'] . '/moments/functions/momentfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/moments/functions/momenthtml.php';
?>
<!DOCTYPE html>
<html>
        <head>
                <title>Kvitrar</title>
                	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                        
                <meta name="viewport" content="width=device-width, initial-scale=1.0" content="text/html; charset=UTF-8">
                <link href = "/css/bootstrap.css" rel = "stylesheet">
                 <link href="/css/signin.css" rel="stylesheet">
                 <link href="/css/customstyle.css" rel="stylesheet">
              <!--  <link href = "css/styles.css" rel = "stylesheet"> -->
        </head>
        <body>
<?php
        ?>