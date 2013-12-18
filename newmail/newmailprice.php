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

$name = $_POST['name'];
$street = $_POST['street'];
$zip = $_POST['zip'];
$city = $_POST['city'];
$country = $_POST['country'];

echo '<form method="POST" action="/newmail/functions/newnewmail.php">';

$country = 'Norway';

if($name && $street && $zip && $city && $country){
    $adress_person = new Adress_person();
    $adress_person->withAdress($name, $street, $zip, $city, $country);
    $adress_person->saveInDb();
    $adress_person_friend = new Friend();
    $adress_person_friend->newFriend(loggedInUser()->user_id, $adress_person->user_id);
    $adress_person_friend->saveInDb();
    echo '<input type="hidden" name="friends[]" value="'.$adress_person->user_id.'">';
    $numberCopies++;
}
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




echo '</div></div></div>';
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
?>