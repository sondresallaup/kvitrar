<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';

echo "<br>";

if(!(isLoggedIn())){include $_SERVER['DOCUMENT_ROOT'] . '/php/signin.php';}
if(isLoggedIn()){
    
 createContainer();
createRow();
createContentBoxtoLeft();
echo '<h3>Meny her </h3>';

createContentBoxtoRight();

$moment = new Moment();
$moment->withMoment_id($moment_id);
$moment->printMoment();

endBox();

    
}
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';

?>