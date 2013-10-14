<?php
?>
<div class="container">

      <form class="form-signin" method="POST" action="php/functions/reg.php">
        <h3 class="form-signin-heading">Registrer deg på Kvittar ikveld</h3>
        <input type="text" class="form-control" name="name" placeholder="Fullt namn" autofocus>
        <input type="text" class="form-control" name="username" placeholder="Brukarnamn">
        <input type="text" class="form-control" name="email" placeholder="Elektronisk postadresse">
        <input type="password" class="form-control" name="password" placeholder="Opprett kodeord">
        <input type="password" class="form-control" name="repeatpassword" placeholder="Gjenta kodeord">
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Opprett konto</button>
      </form>


    </div> <!-- /container -->

<?php
?>