<?php
session_start();
include 'phpmyadmin_connect.php';
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);

$_SESSION['loginmsg']= "test";

$loginquery = mysql_query("SELECT * FROM users WHERE email='$email'");
//check if email exists
$numemail = mysql_num_rows($loginquery);
if($numemail!=0){
	//check if correct password
	while($loginrow = mysql_fetch_assoc($loginquery)){
		$dbid = $loginrow['user_id'];
		$dbpassword = $loginrow['password'];
	}
	if(md5($password)==$dbpassword){
		$_SESSION['loggedin']=TRUE;
		$_SESSION['user_id']=$dbid;
		$_SESSION['email']=$email;
		$_SESSION['loginmsg']="Logget inn!";}
			else
			$_SESSION['loginmsg']="Feil passord!";}
		else
		$_SESSION['loginmsg']="Epost finnes ikke";

		header('Location: http://sondresallaup.com');

?>