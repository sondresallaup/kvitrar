<?php 
$queryStatus = mysql_query("SELECT * FROM status WHERE user_id='$profile_id' ORDER BY status_id DESC");
?>
    <div class="tab-pane active" id="statuses">

      <h3>Statuser</h3>
<?php
    include 'statusinput.php';
		while($statusRow = mysql_fetch_assoc($queryStatus)){
		$sta_id = $statusRow['status_id'];
                $status = new Status();
                $status->withStatus_id($sta_id);
                $status->startWell();
                $status->printStatus();
                $status->likeButton();
                $status->dislikeButton();
                $status->echoThoseWhichLikes();
                echo " ";
                $status->echoThoseWhichDislikes();
                $status->endWell();
		}
?>
 
    </div>
      <?php
      ?>

