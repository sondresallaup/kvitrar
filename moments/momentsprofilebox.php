<?php
$user = new User(loggedInUsersId());
?>
<br><br><br>
<div class="well hidden-sm hidden-xs hidden-md">
<?php echo $user->getProfilePicture(60);
echo ' <b><a href="/'.$user->username.'">'.$user->name.' '.$user->getUserTypeIcon(15).'</a></b><hr>';

include include $_SERVER['DOCUMENT_ROOT'] . '/moments/momentstatusinput.php';
?>
    <a data-toggle="modal" href="#mediastatus" class="btn btn-default pull-right"> <span class="glyphicon glyphicon-camera"></span> Last opp fil</a>
    <br>
</div>
<div class="visible-xs visible-sm visible-md">
    <?php include include $_SERVER['DOCUMENT_ROOT'] . '/moments/momentstatusinput.php'; ?>
    <br><br>
    <a data-toggle="modal" href="#mediastatus" class="btn btn-default"> <span class="glyphicon glyphicon-camera"></span> Last opp fil</a>
</div>
<?php include include $_SERVER['DOCUMENT_ROOT'] . '/moments/mediastatusinput.php'; ?>