<?php
session_start();
createUserDirectoriesForAllUsers();
?>
<div class="container">

      <form class="form-signin" method="POST" action="php/functions/registeruser.php">
        <h3 class="form-signin-heading">Registrer deg på Kvittar ikveld</h3>
        <input type="text" class="form-control" name="name" placeholder="Fullt namn" autofocus disabled="disabled">
        <input type="text" class="form-control" name="username" placeholder="Brukarnamn" disabled="disabled">
        <input type="text" class="form-control" name="email" placeholder="Elektronisk postadresse" disabled="disabled">
        <input type="password" class="form-control" name="password" placeholder="Opprett kodeord" disabled="disabled">
        <input type="password" class="form-control" name="repeatpassword" placeholder="Gjenta kodeord" disabled="disabled">
        <?php echo "<a>".$_SESSION['registermsg']."</a>"; ?>
        <p class="text-danger">Denne tjenesten er for øyeblikket ikke tilgjengelig</p>
        <button class="btn btn-lg btn-primary btn-block" disabled="disabled" name="submit" type="submit">Opprett konto</button>
      </form>


    </div> <!-- /container -->

<?php
?>