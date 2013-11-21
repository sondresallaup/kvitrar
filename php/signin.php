    <?php ?>

<div class="container">

      <form class="form-signin" method="POST" action="php/functions/login.php">
        <h2 class="form-signin-heading">Vær snill og logg inn</h2>
        <input type="email" class="form-control" name="email" placeholder="Elektronisk postadresse" autofocus>
        <input type="password" class="form-control" name="password" placeholder="Kodeord">
        <a href="forgottenpassword.php">Glemt kodeordet?</a>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Logg inn</button>

      <?php echo "<p>".$_SESSION['loginmsg']."</p>"; ?>
      <a href="registrer.php"> Registrer deg </a>
      </form>


    </div> <!-- /container -->

    <?php ?>