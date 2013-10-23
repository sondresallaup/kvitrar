<?php
createContentBoxtoRight();
?>
<br><br>
  <div class="well" align="center">
      <?php 
      $profilepicturesize = 100;
            $profile_user->getProfilePicture($profilepicturesize); ?>
    <h3><?php echo $profile_user->name;?></h3>
    <h4>@<?php echo $profile_user->username;?></h4>
    <?php if($profile_id != loggedInUsersId() && !$followee->isFollowing()): ?>
    <button onclick="location.href='php/functions/follow.php?i=<?php echo $profile_id; ?>'" type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span> Forfølge</button>
     <?php endif; ?>
    <?php if($profile_id != loggedInUsersId() && $followee->isFollowing()): ?>
    <button onclick="location.href='php/functions/unfollow.php?i=<?php echo $profile_id; ?>'" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-book"></span> Slut å forfølge</button>
     <?php endif; ?>
    <?php if($profile_id == loggedInUsersId()): ?>
     <a data-toggle="modal" href="#settings" class="btn btn-default">Endre profil</a>
     <?php endif; ?>
</div>
</div>
    
<?php 

include 'php/settings.php';
?>

