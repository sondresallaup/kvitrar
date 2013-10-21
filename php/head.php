<?php
session_start();
include 'php/functions/phpmyadmin_connect.php';
include 'php/functions/userfunctions.php';
include 'php/functions/statusfunctions.php';
include 'php/classes/user.php';
include 'php/classes/followee.php';
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