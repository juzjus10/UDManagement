<?php
require_once('includes/NewDB.php');
ob_start();
session_start();  
if(isset($_FILES["fileToUpload"])) {
  
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $updateImage = 0;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $employeeNo = $_SESSION["employeeNo"];
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }
  
  // Check if file already exists
  if (file_exists($target_file)) {
   // echo "Sorry, file already exists.";
    $uploadOk = 0;
    $updateImage = 1;
  }
  
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0 && $updateImage == 1 ) {
      $sql = "UPDATE `employee` SET `Image` = '".$target_file ."' WHERE `employee`.`Employee_No` = '".$employeeNo. " '";
      $conn->query($sql) or die(mysqli_error($conn));
      header("Location: profile.php");
  }
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  
      $sql = "UPDATE `employee` SET `Image` = '".$target_file ."' WHERE `employee`.`Employee_No` = '".$employeeNo. " '";
      $conn->query($sql) or die(mysqli_error($conn));
  
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  
    header("Location: profile.php");
  }

}

?>