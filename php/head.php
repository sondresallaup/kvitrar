<?php
session_start();
include 'php/functions/phpmyadmin_connect.php';
include 'php/functions/userfunctions.php';
include 'php/functions/statusfunctions.php';
include 'php/functions/datefunctions.php';
include 'php/classes/user.php';
include 'php/classes/followee.php';
include 'php/classes/status.php';
include 'php/classes/like.php';
include 'php/classes/dislike.php';
include 'php/classes/comment.php';
include 'php/classes/notification.php';
include 'php/classes/conversation.php';
include 'php/classes/message.php';
include 'php/functions/generatejsonfilefromusers.php';
include 'php/functions/stylingfunctions.php';
?>
<!DOCTYPE html>
<html>
        <head>
                <title>Kvitrar</title>
                	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                        
                <meta name="viewport" content="width=device-width, initial-scale=1.0" content="text/html; charset=UTF-8">
                <link href = "/css/bootstrap.css" rel = "stylesheet">
                 <link href="/css/signin.css" rel="stylesheet">
              <!--  <link href = "css/styles.css" rel = "stylesheet"> -->
        </head>
        <body>
<?php
        ?>