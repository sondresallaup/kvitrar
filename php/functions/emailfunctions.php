<?php
function sendEmailWithNewPassword($to,$password){
			$subject = "Nytt kodeord - Kvitrar";
			$message = "Ditt nye kodeord på Kvitrar er ". $password.". 
			Du kan lage nytt passord i innstillinger. Logg inn med din epostadresse.";
			$from = "kvitrar@sondresallaup.com";
			$headers = "Fra:" . $from;
			mail($to,$subject,$message,$headers);
}

?>