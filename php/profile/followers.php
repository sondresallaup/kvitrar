<?php
$followerQuery = mysql_query("SELECT * FROM follow WHERE follower_id = '$profile_id'");
?>
<div>
    <?php    createContentBoxtoRight();?>
    <h3>Følgerar</h3>
    <ul class="list-unstyled">
    <?php
    while($followerRow = mysql_fetch_assoc($followerQuery)){
        $follower_id = $followerRow['followee_id'];
        $follower = new User($follower_id);
        echo "<li>";
        echo $follower->getProfilePicture(20);
        echo "<b><a href=profile.php?i=$follower_id>".$follower->name." </a></b>";
        echo "<i>@".$follower->username."</i>";
        echo "</li>";
    }
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    ?>