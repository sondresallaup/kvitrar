<?php
createContainer();
createRow();
createContentBoxtoRight();
?>
<br><br>
  <div class="well">
      <h3>Samhandlingar</h3><hr>
      <?php 
      $notificationQuery = mysql_query("SELECT notification_id FROM notifications WHERE to_user_id = '$user->user_id' ORDER BY notification_id DESC");
      while($notificationRow = mysql_fetch_assoc($notificationQuery)){
          $notification_id = $notificationRow['notification_id'];
          $notification = new Notification();
          $notification->byNotification_id($notification_id);
          $notification->printNotification();
      }
      ?>
</div>
</div>
    
<?php 

endBox();
?>