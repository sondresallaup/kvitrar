<?php
$queryofusers = mysql_query("SELECT name FROM user_info WHERE name LIKE '%" . $search . "%' OR username LIKE '%" . $search . "%'");
while ($userrow = mysql_fetch_assoc($queryofusers)) {
    $searchdata[] =$userrow;
    
}

$json_data = json_encode($searchdata);
//file_put_contents('/json/usersname.json', $json_data);

?>
