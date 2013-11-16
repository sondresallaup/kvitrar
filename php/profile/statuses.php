<?php 
$queryStatus = mysql_query("SELECT * FROM status WHERE user_id='$profile_id' ORDER BY status_id DESC");
?>
    <div class="tab-pane active" id="statuses">
<?php
createContentBoxtoRight();
echo "<h3>Statuser</h3>";
    if($profile_user->user_id == loggedInUsersId()){
    include 'statusinput.php';}
		while($statusRow = mysql_fetch_assoc($queryStatus)){
		$sta_id = $statusRow['status_id'];
                $status = new Status();
                $status->withStatus_id($sta_id);
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
                include $_SERVER['DOCUMENT_ROOT'] . '/php/profile/commentinput.php';
                echo '</div>';
                $status->endWell();
		}
 
    echo "</div>
        </div>";
      ?>

