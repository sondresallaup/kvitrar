<?php
$followeeQuery = mysql_query("SELECT * FROM follow WHERE followee_id = '$profile_id'");
?>
<div class="tab-pane" id="followees">
    <h3>Forfølgerar</h3>
    <ul>
    <?php
    while($followeeRow = mysql_fetch_assoc($followeeQuery)){
        $followee_id = $followeeRow['follower_id'];
        $followee = new User($followee_id);
        echo "<li>";
        echo "<b><a href=profile.php?i=$followee_id>".$followee->name." </a></b>";
        echo "<i>@".$followee->username."</i>";
        echo "</li>";
    }
    ?>
    
    </ul>
</div>

<?php
?>