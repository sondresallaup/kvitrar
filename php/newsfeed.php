<?php
$queryStatus = mysql_query("SELECT * FROM status ORDER BY status_id DESC");
$user_id = loggedInUsersId();
?>
<h1>Nyheitsoppdatering</h1>
<?php include 'php/profile/statusinput.php'; ?>
<div class="row">
  <div class="span4">
<?php
while($statusRow = mysql_fetch_assoc($queryStatus)){
    $sta_id = $statusRow['status_id'];
    $status = new Status();
    $status->withStatus_id($sta_id);
    $followee = new Followee($user_id,$status->user_id);
    if($followee->isFollowing() || $status->user_id == $user_id){
        $status->startWell();
        $status->printStatus();
        $status->likeButton();
        $status->dislikeButton();
        $status->echoThoseWhichLikes();
        echo " ";
        $status->echoThoseWhichDislikes();
        $status->endWell();
    
    }

}
?>
  </div>
</div>
<?php
?>