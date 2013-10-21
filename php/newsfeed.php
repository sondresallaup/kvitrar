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
    $statuswriter_id = $statusRow['user_id'];
    $followee = new Followee($user_id,$statuswriter_id);
    if($followee->isFollowing() || $statuswriter_id == $user_id){
    printStatus($sta_id);
    
    }

}
?>
  </div>
</div>
<?php
?>