<?php 
?>

<div class="modal fade" id="uploadnewmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Upload picture</h4>
        </div>
        <div class="modal-body">
            <form action="/newmail/functions/upload_picture.php" method="post"
                    enctype="multipart/form-data">
            <label for="file">Picture:</label>
            <input type="file" name="file" id="file">
            <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button data-loading-text="Laster opp" type="submit" class="btn btn-primary">Upload</button>
          </div>
          </form>
        </div><!-- /.modal-body -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->