<?php
?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
        <?php createContentBoxtoLeft();?>
    <br><br>
    <div class="well">
                <ul class="nav nav-tabs nav-stacked hidden-sm hidden-xs">
                    
        <li class="active"><a href="#newmessage" data-toggle="tab">Opprett ny melding</a></li>
       <?php $user = new User(loggedInUsersId()); 
       $user->getMessageContacts();
       ?>
       </ul>
        
        <ul class="nav nav-tabs visible-sm visible-xs">
                    
        <li class="active"><a href="#newmessage" data-toggle="tab">Opprett ny melding</a></li>
       <?php $user->getMessageContacts(); ?>
       </ul>
        
        </div>
</div>
    <div class="tab-content">
        
    <?php
    include 'php/messages/newmessage.php';
    include 'php/messages/inbox.php';
    ?>
    
    </div>
    
</div>