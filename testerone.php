<?php
include 'php/functions/phpmyadmin_connect.php';




for($i = 0; $i < 1000; $i++){
    $statusQuery = mysql_query("SELECT status FROM status");
while($statusRow = mysql_fetch_assoc($statusQuery)){
    echo $statusRow['status'];
}


}

?>