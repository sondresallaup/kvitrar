<?php
include $_SERVER['DOCUMENT_ROOT'] . '/newmail/functions/newmailfunctions.php';
if(loggedInUser()->isAdmin()){
    createContainer();
    createRow();
    echo '<br>';
    createContentBoxtoLeft();
    echo '<div class="well" id="sidebar" data-spy="affix">';
    echo '<form method="POST" action="/newmail/functions/print.php">';
    echo '<h4>Jobber i køen</h4>';
    printAllUnPrintedNewMails('head');
    echo '<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Print</button>';
    echo '</div></div>';
    
    createContentBoxtoRight();
    echo '<div class="well">';
    echo '<h4>Bilder</h4>';
    printAllUnPrintedNewMails('body');
    echo '</form></div</div></div>';
}
?>