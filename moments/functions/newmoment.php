<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT'] . '/moments/classes/Moment.php';
include $_SERVER['DOCUMENT_ROOT'] . '/moments/classes/Moment_guest.php';
include $_SERVER['DOCUMENT_ROOT'] . '/moments/functions/momentfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/user.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/phpmyadmin_connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/userfunctions.php';

$momentname = $_POST['momentname'];
$momenttext = $_POST['momenttext'];
$guests = unserialize($_POST['guests']);
$momenttimefrom = $_POST['momenttimefrom'];
$momenttimeto = $_POST['momenttimeto'];
$submit = $_POST['submit'];
$_SESSION['newmomentmsg'] = "";

if($submit){
    if($momentname){
        $moment = new Moment();
        $moment->newMoment($momentname, $momenttext, $momenttimefrom, $momenttimeto, 'TRUE');
        $moment->saveInDb();
        $moment->getMoment_id();
        $moment->createDirectory();
        
        $host = new Moment_guest();
        $host->setMomentCreatorAsHost($moment->moment_id);
        $host->saveInDb();
        
        createMoment_guestsForMoment($moment->moment_id, $guests);
        
        $_SESSION['newmomentmsg'] = "Momentet er opprettet.";
        
    }
    else{
        $_SESSION['newmomentmsg'] = "Du må skrive inn et navn.";
    }
}
else{
    $_SESSION['newmomentmsg'] = "Du har ikke fylt ut noe.";
}


header('Location: ' . $_SERVER['HTTP_REFERER']);


?>