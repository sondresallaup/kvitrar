<?php 
?>
<div class="modal fade" id="mediastatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Last opp fil</h4>
        </div>
        <div class="modal-body">
            <form action="/moments/functions/upload_statusmedia.php" method="post"
                    enctype="multipart/form-data">
            <label for="file">Bilde:</label>
            <input type="file" name="file" id="file"><br>
            <label for="status">Bildetekst:</label>
            <input type="text" name="imagetext">
            <input type="hidden" name="moment_id" value="<?php echo $moment_id; ?>">
            <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Lukk</button>
              <button data-loading-text="Laster opp" type="submit" class="btn btn-primary">Last opp</button>
          </div>
          </form>
        </div><!-- /.modal-body -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->