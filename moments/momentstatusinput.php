<?php ?>

<form action="/moments/functions/newmomentstatus.php" method="POST">
    <div class="form-group">
        <input type="hidden" name="moment_id" value="<?php echo $moment_id;?>">
        <input type="text" name="momentstatus" class="form-control" placeholder="Kvitre ut dine tanker...">
    </div>
</form>
    
<?php ?>