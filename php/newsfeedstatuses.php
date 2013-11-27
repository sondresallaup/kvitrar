<?php
$pageNumber = $_GET['page'];
if(!$pageNumber){$pageNumber = 1;}
$offset = (($pageNumber - 1) * 10);

$queryStatus = mysql_query("SELECT * FROM status ORDER BY status_id DESC LIMIT 10 OFFSET $offset");
$user_id = loggedInUsersId();

echo"<h2>Nyhetsoppdatering</h2>";
while($statusRow = mysql_fetch_assoc($queryStatus)){
    $sta_id = $statusRow['status_id'];
    $status = new Status();
    $status->withStatus_id($sta_id);
    $friend = new Friend();
    $friend->withUserTwoOrUserOneAndUseIsLoggedIn($status->user_id);
    if($friend->isFriends() || $status->user_id == $user_id){
        $status->startWell();
        $status->printStatus();
        echo '<div class="btn-group">';
        $status->likeButton();
        $status->dislikeButton();
        echo "</div> ";
        echo '<p class="text-muted">';
        $status->echoThoseWhichLikes();
        echo " ";
        $status->echoThoseWhichDislikes();
        echo '</p><hr><div class="container">';
        $status->printComments();
        include 'php/profile/commentinput.php';
        echo '</div>';
        $status->endWell();
        
        
    
    }

}

echo '<ul class="pager">
  <li class="previous';
if($pageNumber == 1){echo ' disabled';}
echo '"><a href="/?page='.($pageNumber-1) .'">&larr; Nyere</a></li>';
echo '<li class="next"><a href="/?page='.($pageNumber+1) .'">Eldre &rarr;</a></li>
</ul>';
?>