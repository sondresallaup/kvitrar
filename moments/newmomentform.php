    <?php
    ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
createContainer();
createRow();
createContentBoxtoLeft();?>
<h4>Meny her</h4>
</div>
<?php createContentBoxtoRight(); ?>

<form class="form-horizontal" role="form" action="/moments/functions/newmoment.php" method="POST">
  <div class="form-group">
      <h2>Capture a new moment</h2>
    <label for="momentname" class="col-sm-2 control-label">Navn på moment</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="momentname" placeholder="Navn på moment" name="momentname">
    </div>
  </div>
  <div class="form-group">
      <label for="momenttext" class="col-sm-2 control-label"><a href="#" onclick="showMomentText()">Legg til en beskrivende tekst</a></label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="momenttext" placeholder="Beskrivende tekst" name="momenttext" style="display: none">
    </div>
  </div>
    <div class="form-group">
    <label for="momentguests" class="col-sm-2 control-label"><a data-toggle="modal" href="#guests" >Legg til deltakere</a></label>
    <div class="col-sm-10">
        <?php
            if(isset($_POST['friends'])) {
                $i = 0;
            foreach($_POST['friends'] as $friend_id){
            $friend = new User($friend_id);
            echo $friend->getProfilePicture(15) .' '. $friend->name;
            echo '<br>';
            $friends[$i++] = $friend_id;
        }
        $data_friends=serialize($friends); 
        $encoded_friends=htmlentities($data_friends);
        }
        
    ?>
        <input type="hidden" value="<?php echo $encoded_friends; ?>" name="guests">
    </div>
  </div>
    <div class="form-group">
        <label for="momentpicture" class="col-sm-2 control-label"><a href="#" onclick="showMomentPicture()">Legg til et bilde</a></label>
    <div class="col-sm-10">
        <input type="file" class="form-control" id="momentpicture" name="momentpicture" style="display: none">
    </div>
  </div>
    <div class="form-group">
        <label for="momenttimefrom" class="col-sm-2 control-label"><a href="#" onclick="showMomentTimeFrom()">Legg til et starttidspunkt</a></label>
    <div class="col-sm-10">
        <input type="time" class="form-control" id="momenttimefrom" name="momenttimefrom" style="display: none">
    </div>
  </div>
    <div class="form-group">
        <label for="momenttimeto" class="col-sm-2 control-label"><a href="#" onclick="showMomentTimeTo()">Legg til et estimert slutttidspunkt</a></label>
    <div class="col-sm-10">
        <input type="time" class="form-control" id="momenttimeto" name="momenttimeto" style="display: none">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success" id="capture" name="submit" value="submit">Capture</button>
        <?php echo $_SESSION['newmomentmsg']; ?>
    </div>
  </div>
</form>

<?php endBox(); ?>
    
   <?php include $_SERVER['DOCUMENT_ROOT'] . '/moments/friendsform.php'; ?>
    
<script>
    function showMomentText() {
     $('#momenttext').show();
    }
    
    function showMomentPicture() {
     $('#momentpicture').show();
    }
    
    function showMomentTimeFrom() {
     $('#momenttimefrom').show();
    }
    
    function showMomentTimeTo() {
     $('#momenttimeto').show();
    }
    
    //document.getElementById('momenttimefrom').value = Date();
   </script>