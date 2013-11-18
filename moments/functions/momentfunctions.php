<?php
function createMoment_guestsForMoment($moment_id,$guests){
    foreach($guests as $user_id){
        $moment_guest = new Moment_guest();
        $moment_guest->newMoment_guest($moment_id, $user_id, 'FALSE');
        $moment_guest->saveInDb();
        }
}

function printAllMoments(){
    $printAllMomentsQuery = mysql_query("SELECT * FROM moments ORDER BY moment_id DESC");
    while($printAllMomentsRow = mysql_fetch_assoc($printAllMomentsQuery)){
        $moment_id = $printAllMomentsRow['moment_id'];
        $moment = new Moment();
        $moment->withMoment_id($moment_id);
        $moment->printMoment();
    }
}


?>
