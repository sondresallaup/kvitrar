<?php
createContainer();
createRow();
createContentBoxtoRight();

if(loggedInUser()->hasAdress()){
echo '<br><h3>New NewMail</h3>';
echo '<div class="well">';
if(!$_SESSION['newmail']){
    echo '<a data-toggle="modal" href="#uploadnewmail" class="btn btn-default"> <span class="glyphicon glyphicon-camera"></span> New picture</a>';
}
else{
    $image = $_SESSION['newmail'];
    echo '<img src="../'.  loggedInUser()->username.'/pictures/'.$image.'" height="300" width="300">';
    echo '<form name="newmailform" action="newmailfriends.php" method="POST">';
    echo '<input type="hidden" name="picture" value="'.$image.'">';
    echo '<textarea class="form-control" rows="3" name="picturetext"></textarea>';

echo '<br>';
echo '<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Post</button>';
echo '</form>';
}
}
else{
    echo '<p class="text-danger">Du har ikke oppgitt dine adresseopplysninger. Vennligtst gjør dette før du bruker tjenesten.</p>';
    echo '<a data-toggle="modal" href="#settings" class="btn btn-default">Profilinnstillinger</a>';
}
echo '</div></div></div></div>';

include 'uploadpicturemodal.php';
include '../php/settings.php';
include 'returnbox.php';

unset($_SESSION['newmail']);

?>