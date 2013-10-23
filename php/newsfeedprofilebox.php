<?php
$user = new User(loggedInUsersId());
?>
<br><br><br>
<div class="well hidden-sm hidden-xs">
<?php echo $user->getProfilePicture(40);
echo " <b><a href=profile.php?i=$user->user_id>".$user->name." </a></b><br><br>";
echo $user->getNumberStatuses()." kvitringar<br>";
echo $user->getNumberFollowees()." følgerar<br>";
echo $user->getNumberFollowers()." forfølgerar<br>";
include 'php/profile/statusinput.php';
?>
</div>
<div class="visible-xs visible-sm">
    <?php include 'php/profile/statusinput.php'; ?>
</div>