<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';
$picture = $_POST['picture'];
echo "<br>";
createRow();
createContentBoxtoRight();

if(!(isLoggedIn())){include $_SERVER['DOCUMENT_ROOT'] . '/php/signin.php';}
if(isLoggedIn()){

$friends = $_POST['friends'];
$picture = $_POST['picture'];

if($friends){
   foreach($friends as $user_id){
       $numberCopies++;
       
        } 
        
        $price = $numberCopies * 14;
        echo 'Total NOK: ' . $price;
}


}

echo '</div></div>';
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
?>