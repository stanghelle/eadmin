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

$uid = $_POST['uid'];


$insert = "DELETE FROM produkt WHERE id=$uid";

$query= mysqli_query($con,$insert);
  if($query){
      }else{}
?>
