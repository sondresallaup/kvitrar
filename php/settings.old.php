<?php ?>
<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Innstillinger</h4>
        </div>
        <div class="modal-body">
            
            
                <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#account" data-toggle="tab">Brukerinfo</a></li>
                <li><a href="#password" data-toggle="tab">Endre passord</a></li>
                <li><a href="#">Endre profilbilde</a></li>
              </ul>
            
            <div id="account" class="tab-pane active">
            <form method="POST" action="php/functions/edituser.php">
            Navn:<input class="form-control" type="text" name="name" value="<?php echo findNameById($profile_id);?>">
            Brukarnavn: <input class="form-control" type="text" name="username" value="<?php echo findUsernameById($profile_id);?>">
            E-post: <input class="form-control" type="text" name="email" value="<?php echo findEmailById($profile_id);?>">
            <br>
        </div>
            
            <div id="password" class="tab-pane">
            <form method="POST" action="php/functions/edituser.php">
            Passord:<input class="form-control" type="text" name="name" value="<?php echo findNameById($profile_id);?>">
            Brukarnavn: <input class="form-control" type="text" name="username" value="<?php echo findUsernameById($profile_id);?>">
            E-post: <input class="form-control" type="text" name="email" value="<?php echo findEmailById($profile_id);?>">
            <br>
            </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Lukk</button>
          <button type="submit" class="btn btn-primary">Lagre endringer</button>
          </form>
                
            </div>
            </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  

  <?php ?>