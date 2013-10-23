<?php
?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
        <?php createContentBoxtoLeft();?>
    <br><br>
    <div class="well">
                <ul class="nav nav-pills nav-stacked hidden-sm hidden-xs">
                    
        <li class="active"><a href="#statuses" data-toggle="tab">Statuser</a></li>
       <li><a href="#followers" data-toggle="tab">Følgerar</a></li>
       <li><a href="#followees" data-toggle="tab">Forfølgerar</a></li>
       </ul>
        
        <ul class="nav nav-pills visible-sm visible-xs">
                    
        <li class="active"><a href="#statuses" data-toggle="tab">Statuser</a></li>
       <li><a href="#followers" data-toggle="tab">Følgerar</a></li>
       <li><a href="#followees" data-toggle="tab">Forfølgerar</a></li>
       </ul>
        
        </div>
</div>
<?php include 'profilehead.php';?>
    <div class="tab-content">
    <?php 
    include 'statuses.php';
    include 'followers.php';
    include 'followees.php';
    ?>
    
    </div>
    
</div>