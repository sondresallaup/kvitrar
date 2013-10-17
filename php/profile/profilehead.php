<?php 
?>
<div class="jumbotron" align="center">
  <div class="container">
      <img src="<?php echo findProfilePicture($profile_id); ?>" border=0 with="100" height="100">
    <h3><?php echo findNameById($profile_id);?></h3>
    <h4>@<?php echo findUsernameById($profile_id);?></h4>
     <a data-toggle="modal" href="#settings" class="btn btn-default">Endre profil</a>
</div>
<?php 

include 'php/settings.php';
?>

