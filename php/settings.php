<?php ?>
<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Innstillinger</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="php/functions/edituser.php">
            Brukarnavn: <input class="form-control" type="text" name="username" value="<?php echo findUsernameById($profile_id);?>">
            
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Lukk</button>
          <button type="button" class="btn btn-primary">Lagre endringer</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  <?php ?>