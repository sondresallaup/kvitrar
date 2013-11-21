<?php
createContentBoxtoRight();
?>
<br><br>
  <div class="well" align="center">
      <?php 
      $friend = new Friend();
      $friend->withUserTwoOrUserOneAndUseIsLoggedIn($profile_user->user_id);
      $friendrequest = new Friend_request();
      $friendrequest->withTo_user_idWhereFromUserIsLoggedIn($profile_user->user_id);
      $profilepicturesize = 100;
            $profile_user->getProfilePicture($profilepicturesize); ?>
    <h3><?php echo $profile_user->name . ' ' . $profile_user->getUserTypeIcon(20);?></h3>
    <h4>@<?php echo $profile_user->username;?></h4>
    <?php if($profile_id != loggedInUsersId() && !$friend->isFriends() && !$friendrequest->hasSentFriend_request() && !$friendrequest->hasReceivedFriend_request()): ?>
    <button onclick="location.href='/php/functions/newfriendrequest.php?i=<?php echo $profile_id; ?>'" type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span> Legg til som venn</button>
     <?php endif; ?>
    <?php if($profile_id != loggedInUsersId() && $friend->isFriends()): ?>
    <button onclick="location.href='/php/functions/deletefriend.php?i=<?php echo $profile_id; ?>'" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-book"></span> Slett som venn</button>
     <?php endif; ?>
    <?php if($profile_id != loggedInUsersId() && $friendrequest->hasSentFriend_request()): ?>
    <button onclick="location.href='/php/functions/deletefriendrequest.php?i=<?php echo $profile_id; ?>'" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-book"></span> Venneforespørsel venter. Trykk for å slette</button>
     <?php endif; ?>
    <?php if($profile_id != loggedInUsersId() && $friendrequest->hasReceivedFriend_request()): ?>
    <button onclick="location.href='/php/functions/acceptfriendrequest.php?i=<?php echo $profile_id; ?>'" type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span> Godta venneforespørsel</button>
     <?php endif; ?>
    <?php if($profile_id != loggedInUsersId()): ?>
    <button onclick="location.href='/messages/<?php echo $profile_user->username; ?>'" type="button" class="btn btn-success"><span class="glyphicon glyphicon-envelope"></span> Send melding</button>
    <?php endif; ?>
    <?php if($profile_id == loggedInUsersId()): ?>
     <a data-toggle="modal" href="#settings" class="btn btn-default">Endre profil</a>
     <?php endif; ?>
     <?php if($profile_id != loggedInUsersId() && loggedInUser()->isAdmin() && !$profile_user->isVerified() ): ?>
     <a data-toggle="modal" href="#settings" class="btn btn-default">Verifiser bruker</a>
     <?php endif; ?>
</div>
</div>
    
<?php 

include $_SERVER['DOCUMENT_ROOT'] . '/php/settings.php';
?>

