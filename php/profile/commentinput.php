<?php ?>

<form action="php/functions/newcomment.php" method="POST">
    <div class="form-group">
        <input type="hidden" name="status_id" value="<?php echo $status->status_id;?>">
        <input type="text" name="comment" class="form-control" placeholder="Kommenter">
    </div>
</form>
    
<?php ?>