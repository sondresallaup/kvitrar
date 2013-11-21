<?php
$friendsQuery = mysql_query("SELECT * FROM friends WHERE user_one_id = '$profile_id' OR user_two_id = '$profile_id'");
?>
<div>
    <?php    createContentBoxtoRight();?>
    <h3>Venner</h3>
    <ul class="list-unstyled">
    <?php
    while($friendsRow = mysql_fetch_assoc($friendsQuery)){
        if($friendsRow['user_one_id'] != $profile_user->user_id){
            $friend_id = $friendsRow['user_one_id'];
        }
        else{
            $friend_id = $friendsRow['user_two_id'];
        }
        $friend_user = new User($friend_id);
        echo "<li>";
        echo $friend_user->getProfilePicture(20);
        echo '<b><a href="/'.$friend_user->username.'">'.$friend_user->name.' </a></b>';
        echo "<i>@".$friend_user->username."</i>";
        echo "</li>";
    }
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    ?>