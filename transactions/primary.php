<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

createContainer();
createRow();
createContentBoxtoLeft();
echo '</div>';
createContentBoxtoRight();
echo '<h3>Transaksjoner</h3>';
loggedInUser()->printUsersTransactions();
endBox();


?>
