<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';
$picture = $_POST['picture'];
$picturetext = $_POST['picturetext'];
echo "<br>";
createContainer();
createRow();
createContentBoxtoRight();

if(!(isLoggedIn())){include $_SERVER['DOCUMENT_ROOT'] . '/php/signin.php';}
if(isLoggedIn()): ?>
<form action="newmailprice.php" method="post">
    <fieldset data-role="controlgroup">
        <h3>Send til: </h3>
          <?php 
          $loggedInUsersId = loggedInUser()->user_id;
          $friendQuery = mysql_query("SELECT * FROM friends WHERE user_one_id = '$loggedInUsersId' OR user_two_id = '$loggedInUsersId'");
          $i = 0;
          echo '<ul>';
          while($friendRow = mysql_fetch_assoc($friendQuery)){
              $i++;
              $friend_id = $friendRow['user_one_id'];
              if($friend_id == loggedInUser()->user_id){
                  $friend_id = $friendRow['user_two_id'];
              }
              $friend = new User($friend_id);
              echo '<li>';
              echo '<input type="checkbox" name="friends[]" id="friend-'.$i.'" value="'.$friend->user_id.'"';
              if(!$friend->hasAdress()){echo 'disabled';}
              echo '/>';
              echo '<label for="friend-'.$i.'">  '.$friend->getProfilePicture(15) .$friend->name.'</label>';
              if(!$friend->hasAdress()){echo '<i> - har ikke oppgitt adresseopplysninger</i>';}
              echo '</li>';
              
          }
          echo '</ul>';
          ?>
    </fieldset>
    <h3>Annen kontakt:</h3>
    <input type="text" name="name" placeholder="Fullt navn" class="form-control">
    <input type="text" name="streetadress" placeholder="Gateadresse" class="form-control">
    <input type="number" name="zipnumber" placeholder="Postnummer" class="form-control">
    <input type="text" name="city" placeholder="Poststed" class="form-control">
    <input type="text" name="country" placeholder="Norge" value="NO" disabled class="form-control">
    <input type="hidden" name="picture" value="<?php echo $picture; ?>"><br>
    <input type="hidden" name="picturetext" value="<?php echo $picturetext; ?>"><br>
<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Post</button>
</form> 
    
 <?php endif; 
 
 endBox();
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';

?>
