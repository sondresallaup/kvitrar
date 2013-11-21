<?php
$loggedInUsersId = loggedInUser()->user_id;
$friendrequestsQuery = mysql_query("SELECT * FROM friend_requests WHERE to_user_id = '$loggedInUsersId'");
while($friendrequestsRow = mysql_fetch_assoc($friendrequestsQuery)){
    $from_user_id = $friendrequestsRow['from_user_id'];
    $from_user = new User($from_user_id);
    echo '<a href="/'.$from_user->user_id.'">'. $from_user->name . '</a>';
    echo ' vil være vennen din.';
    echo '<button onclick="location.href=';
    echo "'/php/functions/acceptfriendrequest.php?i=".$from_user->user_id."' ";
    echo '"type="button" class="btn btn-success"><span class="glyphicon glyphicon-envelope"></span> Godta venneforespørsel</button>';
    echo '<hr>';
}

?>