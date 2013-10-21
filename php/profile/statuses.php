<?php 
$queryStatus = mysql_query("SELECT * FROM status WHERE user_id='$profile_id' ORDER BY status_id DESC");
?>
<div class="row">
  <div class="span4">
<?php
		while($statusRow = mysql_fetch_assoc($queryStatus)){
		$sta_id = $statusRow['status_id'];
                printStatus($sta_id);
                
		}
?>
  </div>
</div>
      <?php
      ?>

