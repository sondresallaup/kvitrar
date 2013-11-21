<?php
session_start();
createUserDirectoriesForAllUsers();
?>
<div class="container">

      <form class="form-signin" method="POST" action="php/functions/registeruser.php">
        <h3 class="form-signin-heading">Registrer deg på Kvittar ikveld</h3>
        <input type="text" class="form-control" name="name" placeholder="Fullt navn" autofocus>
        <input type="text" class="form-control" name="username" placeholder="Brukernavn">
        <input type="text" class="form-control" name="email" placeholder="E-postadresse">
        <input type="password" class="form-control" name="password" placeholder="Opprett passord">
        <input type="password" class="form-control" name="repeatpassword" placeholder="Gjenta passord">
        <?php echo "<a>".$_SESSION['registermsg']."</a>"; ?>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Opprett konto</button>
      </form>


    </div> <!-- /container -->

<?php
?>