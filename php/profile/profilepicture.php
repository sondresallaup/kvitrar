<?php

if(is_readable(findProfilePicture($profile_id))){
    echo '<img src="'.findProfilePicture($profile_id).'" border=0 with="'.$profilepicturesize.'" height="'.$profilepicturesize.'">';}
else{
    echo '<img src="php/profile/img/defaultprofilepicture.jpg" border=0 with="'.$profilepicturesize.'" height="'.$profilepicturesize.'">';}
?>
      
      