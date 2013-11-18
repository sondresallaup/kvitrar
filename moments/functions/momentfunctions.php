<?php
function createMoment_guestsForMoment($moment_id,$guests){
    foreach($guests as $user_id){
        $moment_guest = new Moment_guest();
        $moment_guest->newMoment_guest($moment_id, $user_id, 'FALSE');
        $moment_guest->saveInDb();
        }
}


?>
