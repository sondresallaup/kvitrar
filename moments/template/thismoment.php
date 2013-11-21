<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';

echo "<br><br><br>";

if(!(isLoggedIn())){include $_SERVER['DOCUMENT_ROOT'] . '/php/signin.php';}
if(isLoggedIn()){
    
 createContainer();
createRow();
createContentBoxtoLeft();
echo '<h3>Meny her </h3>';
echo '</div>';

createContentBoxtoRight();

$moment = new Moment();
$moment->withMoment_id($moment_id);
echo $moment->createMomentBoxBasedOnActivity();
echo createMomentBoxHeader("Moment");
echo startMomentBoxBody();
echo '<h3>' . $moment->moment_name . '</h3>';
echo '<i>' . $moment->moment_info . '</i>';
echo endMomentBox();

endBox();

    
}
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';

?>