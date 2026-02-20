<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<?php
include 'cfg/dbconnect.php';
$folder = $_POST['folder'];
$aid = $_POST['aid'];
$uid = $_POST['uid'];

$directoryPath = "kunde/".$uid."/".$folder."";
   deleteDirectory($directoryPath);
?>
<?php
function deleteDirectory($dirPath) {
   if (is_dir($dirPath)) {
      $files = scandir($dirPath);
      foreach ($files as $file) {
         if ($file !== '.' && $file !== '..') {
            $filePath = $dirPath . '/' . $file;
            if (is_dir($filePath)) {
               deleteDirectory($filePath);
            } else {
               unlink($filePath);
            }
         }
      }
      rmdir($dirPath);
   }
}
$insert = "DELETE FROM album WHERE aid=$aid";

$query= mysqli_query($con,$insert);
  if($query){
      }else{}
?>
