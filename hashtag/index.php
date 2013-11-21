<?php
$hashtag = $_GET['i'];
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';

echo "<br><br><br>";
createContainer();
createRow();
createContentBoxtoLeft();
include $_SERVER['DOCUMENT_ROOT'] . '/php/trendingbox.php';
echo '</div>';
createContentBoxtoRight();
echo '<h3>#' . $hashtag . '</h3>';

$hashtagQuery = mysql_query("SELECT * FROM hashtags WHERE hashtag LIKE '$hashtag' AND hashtag_type = 'STATUS' ORDER BY hashtag_id DESC");
if(mysql_num_rows($hashtagQuery) == 0){
    echo '<p>Vi finner dessverre ikke #'.$hashtag.'</p>';
}
while($hashtagRow = mysql_fetch_assoc($hashtagQuery)){
    $status_id = $hashtagRow['hashtag_type_id'];
    $status = new Status();
    $status->withStatus_id($status_id);
    $status->startWell();
    $status->printStatus();
    $status->likeButton();
    $status->dislikeButton();
    echo '<br><br>';
    include $_SERVER['DOCUMENT_ROOT'] . '/php/profile/commentinput.php';
    $status->printComments();
    $status->endWell();
}



echo '</div>';

endBox();

include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';

?>