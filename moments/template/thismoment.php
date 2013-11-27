<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';

echo "<br><br><br>";

if(!(isLoggedIn())){include $_SERVER['DOCUMENT_ROOT'] . '/php/signin.php';}
if(isLoggedIn()){
    $moment = new Moment();
$moment->withMoment_id($moment_id);

 createContainer();
createRow();
createContentBoxtoLeft();

if($moment->isLoggedInUserGuest()){
include $_SERVER['DOCUMENT_ROOT'] . '/moments/momentsprofilebox.php';
}
echo '<div class="well hidden-sm hidden-xs hidden-md">';
echo '<b>Deltakere</b><br>';
$moment->printGuests();
echo '</div></div>';

createContentBoxtoRight();
echo $moment->createMomentBoxBasedOnActivity();
echo createMomentBoxHeader("Moment");
echo startMomentBoxBody();
echo '<h3>' . $moment->moment_name . '</h3>';
echo '<i>' . $moment->moment_info . '</i><br><hr>';
$moment->printMoment_statuses();
echo endMomentBox();

endBox();

    
}
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';

?>