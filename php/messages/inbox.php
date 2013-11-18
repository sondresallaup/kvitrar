<?php 
$user = new User(loggedInUsersId());
echo '<br><br>';
$user->getMessages($contact_id);
?>

