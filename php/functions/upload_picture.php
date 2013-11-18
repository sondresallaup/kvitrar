<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/phpmyadmin_connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/functions/userfunctions.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/classes/user.php';


$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../../" . loggedInUser()->username. "/pictures/"  ."profilepicture.jpg");
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  }
else
  {
  echo "Invalid file";
  }
?>