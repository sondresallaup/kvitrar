<?php
?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
        <?php createContentBoxtoLeft();?>
    <br><br>
    <div class="well">
                <ul class="nav nav-tabs nav-stacked hidden-sm hidden-xs">
                    
                    <li <?php if('/messages/index.php' == findCurrentPage()){echo 'class="active"';}?>><a href="/messages/">Opprett ny melding</a></li>
       <?php $user = new User(loggedInUsersId()); 
       $user->getMessageContacts();
       ?>
       </ul>
        
        <ul class="nav nav-tabs visible-sm visible-xs">
                    
            <li <?php if('/messages/index.php' == findCurrentPage()){echo 'class="active"';}?>><a href="/messages/">Opprett ny melding</a></li>
       <?php $user->getMessageContacts(); ?>
       </ul>
        
        </div>

    
    
</div>