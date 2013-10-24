<?php
$user = new User(loggedInUsersId());
?>
<br><br><br>
<div class="well hidden-sm hidden-xs hidden-md">
<?php echo $user->getProfilePicture(40);
echo " <b><a href=profile.php?i=$user->user_id>".$user->name." </a></b><hr>";
echo '<table class="table table-bordered table-condensed">';
echo '<tr><th class="text-center">'.$user->getNumberStatuses().'</th>';
echo '<th class="text-center">'.$user->getNumberFollowees().'</th>';
echo '<th class="text-center">'.$user->getNumberFollowers().'</th></tr>';
echo '<tr><td><p class="text-muted">KVITRINGAR</p></td>';
echo '<td><p class="text-muted">FØLGERAR</p></td>';
echo '<td><p class="text-muted">FORFØLGERAR</p></td></tr></table><hr>';
include 'php/profile/statusinput.php';
?>
</div>
<div class="visible-xs visible-sm visible-md">
    <?php include 'php/profile/statusinput.php'; ?>
</div>