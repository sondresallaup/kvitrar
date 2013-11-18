<?php
?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
        <?php createContentBoxtoLeft();?>
    <br><br>
    <div class="well">
                <ul class="nav nav-pills nav-stacked hidden-sm hidden-xs">
                    
                    <li <?php if('/' .$profile_user->username . '/index.php' == findCurrentPage()){ echo 'class="active"';}?>><a href="/<?php echo $profile_user->username; ?>">Statuser <span class="badge pull-right"><?php echo $profile_user->getNumberStatuses();?></span></a></li>
                    <li <?php if('/' .$profile_user->username . '/followers/index.php' == findCurrentPage()){ echo 'class="active"';}?>><a href="/<?php echo $profile_user->username; ?>/followers">Følgerar <span class="badge pull-right"><?php echo $profile_user->getNumberFollowers();?></span></a></li>
                    <li <?php if('/' .$profile_user->username . '/following/index.php' == findCurrentPage()){ echo 'class="active"';}?>><a href="/<?php echo $profile_user->username; ?>/following">Forfølgerar <span class="badge pull-right"><?php echo $profile_user->getNumberFollowees();?></span></a></li>
       </ul>
        
        <ul class="nav nav-pills visible-sm visible-xs">
                    
        <li <?php if('/' .$profile_user->username . '/index.php' == findCurrentPage()){ echo 'class="active"';}?>><a href="/<?php echo $profile_user->username; ?>">Statuser</a></li>
       <li <?php if('/' .$profile_user->username . '/followers/index.php' == findCurrentPage()){ echo 'class="active"';}?>><a href="/<?php echo $profile_user->username; ?>/followers">Følgerar</a></li>
       <li <?php if('/' .$profile_user->username . '/following/index.php' == findCurrentPage()){ echo 'class="active"';}?>><a href="/<?php echo $profile_user->username; ?>/following">Forfølgerar</a></li>
       </ul>
        
        </div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/php/profile/profilehead.php';?>
    <div>
   
    
    </div>
    
</div>