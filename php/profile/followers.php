<?php
$followerQuery = mysql_query("SELECT * FROM follow WHERE follower_id = '$profile_id'");
?>
<div class="tab-pane" id="followers">
    <h3>Følgerar</h3>
    <ul>
    <?php
    while($followerRow = mysql_fetch_assoc($followerQuery)){
        $follower_id = $followerRow['followee_id'];
        $follower = new User($follower_id);
        echo "<li>";
        echo "<b><a href=profile.php?i=$follower_id>".$follower->name." </a></b>";
        echo "<i>@".$follower->username."</i>";
        echo "</li>";
    }
    ?>
    
    </ul>
</div>

<?php
?>