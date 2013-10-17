<?php
 require_once "Mail.php";

function sendEmailWithNewPassword($to,$password){
    $from = "Kvitrar <kvitrar@sondresallaup.com>";
    $to = "Bruker <".$to.">";

    $host = "send.one.com";
    $username = "kvitrar@sondresallaup.com";
    $password = "heihei";
    
    $subject = "Nytt kodeord - Kvitrar";
    $body = "Ditt nye kodeord på Kvitrar er ". $password.". 
    Du kan lage nytt passord i innstillinger. Logg inn med din epostadresse.";

    $headers = array ("From' => $from,
      'To' => $to,
      'Subject' => $subject");
    $smtp = Mail::factory('smtp',
      array ('host' => $host,
        'auth' => true,
        'username' => $username,
        'password' => $password));

    $mail = $smtp->send($to, $headers, $body);
}
?>