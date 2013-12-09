<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';
$picture = $_POST['picture'];
echo "<br>";
createRow();
createContentBoxtoRight();
echo '<div class="well">';

if(!(isLoggedIn())){include $_SERVER['DOCUMENT_ROOT'] . '/php/signin.php';}
if(isLoggedIn()){

$friends = $_POST['friends'];
$picture = $_POST['picture'];
$picturetext = $_POST['picturetext'];
echo '<form method="POST" action="/newmail/functions/newnewmail.php">';
if($friends){
   foreach($friends as $user_id){
       $numberCopies++;
       echo '<input type="hidden" name="friends[]" value="'.$user_id.'">';
       
        } 
        
        $price = $numberCopies * 14;
        echo 'Total NOK: ' . $price;
        
        echo '<input type="hidden" name="picture" value="'.$picture.'">';
        echo '<input type="hidden" name="price" value="'.$price.'">';
        echo '<input type="hidden" name="picturetext" value="'.$picturetext.'">';
        echo '<br><button type="submit" class="btn btn-success" name="submit" value="submit"><span class="glyphicon glyphicon-send"></span> Pay</button>';
        echo '</form>';
        
}


}

echo '</div></div></div>';
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
?>