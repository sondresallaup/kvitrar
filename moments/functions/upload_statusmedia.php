<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/phpmyadmin_connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/userfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/datefunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/user.php';
include $_SERVER['DOCUMENT_ROOT'] . '/moments/classes/Moment_status.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/hashtag.php';

$imagetext = $_POST['imagetext'];
$moment_id = $_POST['moment_id'];

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
      if($imagetext){
          $compressed = compress_image($_FILES["file"]["tmp_name"], '../../'.  loggedInUser()->username.'/pictures/'.$_FILES["file"]["name"], 35);
          $moment_status = new Moment_status();
          $moment_status->withMedia($imagetext, $moment_id, $compressed);
          $moment_status->saveInDb();
          $moment_status->getLastInsertedId();
        $hashtags = new Hashtag();
        $hashtags->newHashtagFromStatus($moment_status->moment_status, $moment_status->moment_status_id);
        $hashtags->saveInDb();
          
          
          
      //move_uploaded_file($compressed,
      //"../../" . loggedInUser()->username. "/pictures/"  .$compressed);      
      }
      else{
          echo 'Du mangler bildetekst';
      }
      
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  }
else
  {
  echo "Invalid file";
  }
  
 
function compress_image($source_url, $destination_url, $quality) {
	$info = getimagesize($source_url);
 
	if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
	elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
	elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
 
	//save file
	imagejpeg($image, $destination_url, $quality);
 
	//return destination file
	return $destination_url;
}
?>