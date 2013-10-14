<?php


$phpmyadminhost = "sondresallaup.com.mysql"; 		
$phpmyadminusername = "sondresallaup_c"; 			
$phpmyadminpassword = "e5D4HCfF"; 				
$phpmyadmindb_name = "sondresallaup_c"; 		


// Connecting db
mysql_connect("$phpmyadminhost","$phpmyadminusername","$phpmyadminpassword")or die("Couldn't connect mysql.");
mysql_select_db("$phpmyadmindb_name")or die("Couldn't connect db.");


?>