<?php
$followeeQuery = mysql_query("SELECT * FROM follow WHERE followee_id = '$profile_id'");
?>
<div>
    <?php    createContentBoxtoRight();?>
    <div class="well">
    <h3>Forfølgerar</h3>
    <ul class="list-unstyled">
    <?php
    while($followeeRow = mysql_fetch_assoc($followeeQuery)){
        $followee_id = $followeeRow['follower_id'];
        $followee = new User($followee_id);
        echo "<li>";
        echo $followee->getProfilePicture(20);
        echo '<b><a href="/'.$followee->username.'">'.$followee->name.' </a></b>';
        echo "<i>@".$followee->username."</i>";
        echo "</li>";
    }
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    
?>