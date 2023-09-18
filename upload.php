<?php
if(isset($_POST["submit"])){
 $target_dir = "uploads/";
 $target_file = $target_dir . basename($_FILES["file"]["name"]);
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
 // Check if file is an image
 if(getimagesize($_FILES["file"]["tmp_name"]) === false) {
  echo "File is not an image.";
  exit;
 }
 
 // Check if file already exists
 if (file_exists($target_file)) {
  echo "File already exists.";
  exit;
 }
 
 // Check file size
 if ($_FILES["file"]["size"] > 5000000) {
  echo "File is too large.";
  exit;
 }
 
 // Allow only certain file formats
 if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
  echo "Only JPG, JPEG, PNG & GIF files are allowed.";
  exit;
 }
 
 // Upload file
 if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
  echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
 } else {
  echo "There was an error uploading your file.";
 }
}
?>