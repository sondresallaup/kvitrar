<?php
include 'phpmyadmin_connect.php';

function createNewStatus($user_id,$status){
    $time = date("Y-m-d");
    $newStatusQuery = mysql_query("INSERT INTO status VALUES ('','$user_id','$status','$time')");
}

function printStatus($sta_id){
   $status = getStatus($sta_id);
   $user_id = getUser_idBySta_id($sta_id);
   $time = getStatusTime($sta_id);
   $name = findNameById($user_id);
   $user_name = findUsernameById($user_id);
    
    echo '<div class="well well-lg">';
    $profile_id = $user_id;
    $profilepicturesize = 50;
    
    include 'php/profile/profilepicture.php';
    echo '<b><a href=profile.php?i='.$user_id.'>'.$name.'</a></b>
        <p class="text-muted">@'.$user_name.'</p>
            <a>'.$status.'</a><br>
           <i>'.$time.'</i>
   </div>';
}

function getStatus($sta_id){
   $getStatusQuery = mysql_query("SELECT * FROM status WHERE status_id = '$sta_id' ");
   while($getStatusRow = mysql_fetch_assoc($getStatusQuery)){
       $status = $getStatusRow['status'];
   }
   return $status;
}

function getUser_idBySta_id($sta_id){
    $getUser_idQuery = mysql_query("SELECT * FROM status WHERE status_id = '$sta_id' ");
   while($getUser_idRow = mysql_fetch_assoc($getUser_idQuery)){
       $user_id = $getUser_idRow['user_id'];
   }
   return $user_id;
}

function getStatusTime($sta_id){
    $getTimesQuery = mysql_query("SELECT * FROM status WHERE status_id = '$sta_id' ");
   while($getTimeRow = mysql_fetch_assoc($getTimesQuery)){
       $time = $getTimeRow['time'];
   }
   return $time;
}
?>