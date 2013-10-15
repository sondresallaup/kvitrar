<?php 
session_start(); ?>
<div class="container">
	<form class="form-signin" method="POST" action="php/functions/sendnewpassword.php">
		 <h4 class="form-signin-heading">Gløymt ditt kodeord?</h4>
		 <p>Tast inn ditt brukarnavn eller epostadresse</p>
		 <input type="text" class="form-control" name="email-or-username" autofocus>
		 <br><button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Send nytt kodeord på e-post</button>
		 <?php echo $_SESSION['newpasswordmsg']; ?>
		</form>
  </div> <!-- /container -->

  <?php
?>