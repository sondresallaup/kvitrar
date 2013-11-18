<?php
$user = new User(loggedInUsersId());
?>
<br><br><br>
<div class="well hidden-sm hidden-xs hidden-md">
<?php echo $user->getProfilePicture(60);
echo ' <b><a href="/'.$user->username.'">'.$user->name.' '.$user->getUserTypeIcon(15).'</a></b><hr>';
echo '<table class="table table-bordered table-condensed">';
echo '<tr><th class="text-center"><a href="/'.$user->username.'">'.$user->getNumberStatuses().'</a></th>';
echo '<th class="text-center"><a href="/'.$user->username.'/followers">'.$user->getNumberFollowees().'</a></th>';
echo '<th class="text-center"><a href="/'.$user->username.'/following">'.$user->getNumberFollowers().'</a></th></tr>';
echo '<tr><td><p class="text-muted"><a href="/'.$user->username.'">KVITRINGAR</a></p></td>';
echo '<td><p class="text-muted"><a href="/'.$user->username.'/followers">FØLGERAR</a></p></td>';
echo '<td><p class="text-muted"><a href="/'.$user->username.'/following">FORFØLGERAR</a></p></td></tr></table><hr>';
include 'php/profile/statusinput.php';
?>
</div>
<div class="visible-xs visible-sm visible-md">
    <?php include 'php/profile/statusinput.php'; ?>
</div>