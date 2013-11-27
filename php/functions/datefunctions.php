<?php
function currentTime(){
    return $date = date("Y-m-d-G-i-s");
}

function timeSince($time){
    $start_date = new DateTime($time);
    $since_start = $start_date->diff(new DateTime("now"));
    
    $timesinceString = "For ";
    if($since_start->y != 0){
        return $timesinceString . $since_start->y . " år siden.";
    }
    if($since_start->m != 0 || $since_start->y != 0){
        if($since_start->m == 1){return $timesinceString. "én måned siden.";}
        $timesinceString = $timesinceString. $since_start->m;
        return $timesinceString. " måneder siden.";
    }
    if($since_start->days != 0 || $since_start->m != 0 || $since_start->y != 0){
        if($since_start->days == 1){return $timesinceString. "én dag siden.";}
        $timesinceString = $timesinceString. $since_start->days;
        return $timesinceString. " dager siden.";
    }
    if($since_start->h != 0 || $since_start->days != 0 || $since_start->m != 0 || $since_start->y != 0){
        if($since_start->h == 1){return $timesinceString. "én time siden.";}
        $timesinceString = $timesinceString. $since_start->h;
        return $timesinceString. " timer siden.";
    }
    if($since_start->i != 0 || $since_start->h != 0 || $since_start->days != 0 || $since_start->m != 0 || $since_start->y != 0){
        if($since_start->i == 1){return $timesinceString. "ett minutt siden.";}
        $timesinceString = $timesinceString. $since_start->i;
        return $timesinceString. " minutter siden.";
    }
        $timesinceString = $timesinceString;
        if($since_start->s < 2 ){return "et øyeblikk siden.";}
        else{return $timesinceString . $since_start->s . " sekunder siden.";}
}

function timeSince2($time){
    $start_date = new DateTime($time);
    $since_start = $start_date->diff(new DateTime("now"));
    
    $timesinceString = "";
    if($since_start->y != 0){
        $timesinceString = $timesinceString. $since_start->y . " år, ";
    }
    if($since_start->m != 0 || $since_start->y != 0){
        $timesinceString = $timesinceString. $since_start->m;
        if($since_start->m == 1){$timesinceString = $timesinceString. " måned, ";}
        else{$timesinceString = $timesinceString. " måneder, ";}
    }
    if($since_start->days != 0 || $since_start->m != 0 || $since_start->y != 0){
        $timesinceString = $timesinceString. $since_start->days;
        if($since_start->days == 1){$timesinceString = $timesinceString. " dag, ";}
        else{$timesinceString = $timesinceString. " dager, ";}
    }
    if($since_start->h != 0 || $since_start->days != 0 || $since_start->m != 0 || $since_start->y != 0){
        $timesinceString = $timesinceString. $since_start->h;
        if($since_start->h == 1){$timesinceString = $timesinceString. " time, ";}
        else{$timesinceString = $timesinceString. " timer, ";}
    }
    if($since_start->i != 0 || $since_start->h != 0 || $since_start->days != 0 || $since_start->m != 0 || $since_start->y != 0){
        $timesinceString = $timesinceString. $since_start->i;
        if($since_start->i == 1){$timesinceString = $timesinceString. " minutt og ";}
        else{$timesinceString = $timesinceString. " minutter og ";}
    }
        $timesinceString = $timesinceString;
        if($since_start->s < 2 ){$timesinceString = "et øyeblikk";}
        else{$timesinceString = $timesinceString . $since_start->s . " sekunder";}
    return "For " . $timesinceString . " siden";
}

?>