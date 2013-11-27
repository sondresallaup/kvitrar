<?php ?>

<form action="/moments/functions/newmomentstatuscomment.php" method="POST">
    <div class="form-group">
        <input type="hidden" name="momentstatus_id" value="<?php echo $moment_status->moment_status_id;?>">
        <input type="text" name="momentstatuscomment" class="form-control" placeholder="Kommenter">
    </div>
</form>
    
<?php ?>