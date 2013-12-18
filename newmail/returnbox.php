<?php
$returnvalue = $_GET['return'];
if($returnvalue){
    $modalhead = '<div class="modal fade in" id="returnbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block;">';
    
}
else{
    $modalhead = '<div class="modal fade" id="returnbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
    
}
echo $modalhead;
if($returnvalue == 'success'){
    $outmessage = 'NewMail sent';
}
else if($returnvalue == 'money'){
    $outmessage = 'Not enough money in wallet';
}
?>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
            <blockquote><?php echo $outmessage; ?></blockquote>
            <div class="modal-footer">
              <a href="/newmail" class="btn btn-primary btn-lg active" role="button">OK</a>
          </div>
        </div><!-- /.modal-body -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->