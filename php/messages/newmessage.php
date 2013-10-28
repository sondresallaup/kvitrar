<?php 
?>
    <div class="tab-pane active" id="newmessage">
        <br><br>
<?php
createContentBoxtoRight();
?>
        <div class="well">
<form action="php/functions/newmessage.php" method="POST">
    <div class="form-group">
        <?php if($to_user_id):
            $to_user = new User($to_user_id);?>
        <input type="hidden" name="to_user" value="<?php echo $to_user_id;?>"><h3><?php echo $to_user->name;?></h3><a href="messages.php">Endre mottaker</a>
        <?php endif;
        if(!$to_user_id):?>            
        <input type="text" name="to_user" class="form-control" placeholder="Til brukernavn">
        <?php endif; ?>
    </div>
        </div>
        
<div class="well">
        <?php include 'newmessageinputbox.php'; ?>
    
</div> </div></div>