<?php
include $_SERVER['DOCUMENT_ROOT'] . '/php/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/passwordfunctions.php';
echo "<br><br>";
if(isset($_POST['search'])){ 
    $search = $_POST['search'];
    if(isCorrectSearchInput($search)){
        $searchQuery = mysql_query("SELECT user_id FROM user_info WHERE name LIKE '%" . $search . "%' OR username LIKE '%" . $search . "%'");
        $numrows = mysql_num_rows($searchQuery);
        echo "<br><ul>";
        while($searchRow = mysql_fetch_assoc($searchQuery)){
            $user_id = $searchRow['user_id'];
            $user = new User($user_id);
            echo "<li>";
            echo '<b><a href="/'.$user->username.'"'.$user->name.' </a></b>';
            echo "<i>@".$user->username."</i>";
            echo "</li>";
            
        }
        echo "<ul>";
    }
}
else{ 
    echo  "<p>Vennligst skriv inn søkeord</p>"; 
    }
include $_SERVER['DOCUMENT_ROOT'] . '/php/footer.php';
?>