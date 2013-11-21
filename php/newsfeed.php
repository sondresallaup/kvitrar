<?php
createContainer();
createRow();
createContentBoxtoLeft();
 include 'newsfeedprofilebox.php';
 include 'trendingbox.php';
echo "</div>";
createContentBoxtoRight();
include 'newsfeedstatuses.php';
echo '</div>';
endBox();
?>
