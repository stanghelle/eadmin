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
$img = $_POST['img'];
$aid = $_POST['aid'];

unlink($img);

$url = "Kundegalleri.php?aid=".$aid."";
header('Location: '.$url);
die();


?>
