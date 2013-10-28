<?php
function currentTime(){
    return $date = date("Y-m-d-G-i-s");
}

function timeSince($time){
    $start_date = new DateTime($time);
    $since_start = $start_date->diff(new DateTime(currentTime()));
    echo $since_start->days.' days total<br>';
    echo $since_start->y.' years<br>';
    echo $since_start->m.' months<br>';
    echo $since_start->d.' days<br>';
    echo $since_start->h.' hours<br>';
    echo $since_start->i.' minutes<br>';
    echo $since_start->s.' seconds<br>';
}
?>