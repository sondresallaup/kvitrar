<?php
include 'profilehead.php';
if($profile_id == loggedInUsersId()){
    include 'statusinput.php';
}
    include 'statuses.php';
?>