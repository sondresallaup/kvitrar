<?php
?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
    <ul class="nav nav-pills">
        <li class="active"><a href="#statuses" data-toggle="tab">Statuser</a></li>
       <li><a href="#followers" data-toggle="tab">Følgerar</a></li>
       <li><a href="#followees" data-toggle="tab">Forfølgerar</a></li>
    </ul>
    <div class="tab-content">
    <?php 
    include 'statuses.php';
    include 'followers.php';
    include 'followees.php';
    ?>
    
    </div>
    
</div>