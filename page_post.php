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
if (isset($_POST['submit-page']))
{
  $pid = $_POST['page_id'];
$title = $_POST['title'];
$content = $_POST['content'];
$edit_by = $_POST['edit_by'];
$edit_datetime = $_POST['edit_date'];

$sql = "UPDATE pages SET title='$title', content='$content', last_edit_by='$edit_by', last_edit_datetime='$edit_datetime' WHERE id=$pid";

if ($con->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $con->error;
}

$con->close();
}
 ?>
