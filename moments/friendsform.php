 <div class="modal fade" id="guests" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Venner</h4>
          <form action="" method="post">
              <fieldset data-role="controlgroup">
          <?php 
          $loggedInUsersId = loggedInUser()->user_id;
          $friendQuery = mysql_query("SELECT * FROM follow WHERE follower_id = '$loggedInUsersId'");
          $i = 0;
          echo '<ul>';
          while($friendRow = mysql_fetch_assoc($friendQuery)){
              $i++;
              $friend_id = $friendRow['followee_id'];
              $friend = new User($friend_id);
              echo '<li>';
              echo '<input type="checkbox" name="friends[]" id="friend-'.$i.'" value="'.$friend->user_id.'"/>';
              echo '<label for="friend-'.$i.'">  '.$friend->getProfilePicture(15) .$friend->name.'</label>';
              echo '</li>';
          }
          echo '</ul>';
          ?>
              </fieldset>
          
        </div>
        <div class="modal-body">
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Lukk</button>
            <button type="submit" class="btn btn-primary">OK</button>
            </form>
                  </div>
        </div>
      </div>
    </div>
    </div>