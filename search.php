<?php
include 'php/header.php';
include 'php/functions/passwordfunctions.php';
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
            echo "<b><a href=profile.php?i=$user_id>".$user->name." </a></b>";
            echo "<i>@".$user->username."</i>";
            echo "</li>";
            
        }
        echo "<ul>";
    }
}
else{ 
    echo  "<p>Please enter a search query</p>"; 
    }
include 'php/footer.php';
?>