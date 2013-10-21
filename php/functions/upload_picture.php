<?php
session_start();
include 'userfunctions.php';


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
      "../../userfolders/" . loggedInUsersId(). "/pictures/"  ."profilepicture.jpg");
      header("Location: ../../profile.php?i=".loggedInUsersId()."");
    }
  }
else
  {
  echo "Invalid file";
  }
?>