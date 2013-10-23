<?php
$queryStatus = mysql_query("SELECT * FROM status ORDER BY status_id DESC");
$user_id = loggedInUsersId();

echo"<h2>Kvitringar</h2>";
while($statusRow = mysql_fetch_assoc($queryStatus)){
    $sta_id = $statusRow['status_id'];
    $status = new Status();
    $status->withStatus_id($sta_id);
    $followee = new Followee($user_id,$status->user_id);
    if($followee->isFollowing() || $status->user_id == $user_id){
        $status->startWell();
        $status->printStatus();
        echo '<div class="btn-group">';
        $status->likeButton();
        $status->dislikeButton();
        echo "</div> ";
        $status->echoThoseWhichLikes();
        echo " ";
        $status->echoThoseWhichDislikes();
        $status->endWell();
    
    }

}
?>