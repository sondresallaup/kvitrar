<?php
createContainer();
createRow();
createContentBoxtoRight();

echo '<br><h3>New NewMail</h3>';
echo '<div id="polaroid-img">';
echo '<img src="img/polaroid.png" height="650">';
if(!$_SESSION['newmail']){
    echo '<a data-toggle="modal" href="#uploadnewmail" class="btn btn-default pull-right" id="newmailpicturebutton"> <span class="glyphicon glyphicon-camera"></span> New picture</a>';
}
else{
    $image = $_SESSION['newmail'];
    echo '<img src="../'.  loggedInUser()->username.'/pictures/'.$image.'" height="470" width="520" id="newmailimage">';
    echo '<form name="newmailform" action="newmailfriends.php" method="POST">';
    echo '<input type="hidden" name="picture" value="'.$_SESSION['newmail'].'">';
    echo '<textarea class="form-control" rows="3" name="picturetext" id="newmailinputtext" form="newmailform"></textarea>';

echo '</div><br>';
echo '<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Post</button>';
echo '</form>';
}
echo '</div></div></div>';

include 'uploadpicturemodal.php';

unset($_SESSION['newmail']);

?>