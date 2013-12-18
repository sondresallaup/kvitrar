<?php
function printAllUnPrintedNewMails($head_or_body){
    $printallnewmailsquery = mysql_query("SELECT * FROM newmail WHERE printed = 'FALSE'");
    while($printallnewmailsrow = mysql_fetch_assoc($printallnewmailsquery)){
        $newmail_id = $printallnewmailsrow['newmail_id'];
        $newmail = new NewMail();
        $newmail->withNewmail_id($newmail_id);
        if($head_or_body == 'head'){
            $newmail->printHead();
        }
        else if($head_or_body == 'body'){
            $newmail->printBody();
        }
        echo '<br>';
    }
}

?>
