<?php
?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
        <?php createContentBoxtoLeft();?>
    <br><br>
    <div class="well">
         <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/connect/friendrequests.php'; ?>
        
        </div>
</div>
    <div class="tab-content">
    <?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/php/connect/connect.php';
    ?>
    
    </div>
    
</div>