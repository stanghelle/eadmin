<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<?php include 'cfg/dbconnect.php';

$pid = $_GET['pid'];

$dato = date("d.m.Y h:i:s");

$query="SELECT * FROM pages WHERE id = '".$pid."'";
$result = mysqli_query($con, $query);


while($get = mysqli_fetch_array($result)) {
$page_id = $get["id"];
$title = $get["title"];
$content= $get["content"];
$last_edit_by= $get["last_edit_by"];
$last_edit_datetime= $get["last_edit_datetime"];
}
?>
<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Fagfotograf Eva T. Belland</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">
  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet">
	<script src="assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/metisMenu.min.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/mm-vertical.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/simplebar/css/simplebar.css">
  <!--bootstrap css-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css">
  <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
  <!--main css-->
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="sass/main.css" rel="stylesheet">
  <link href="assets/css/horizontal-menu.css" rel="stylesheet">
  <link href="sass/dark-theme.css" rel="stylesheet">
  <link href="sass/blue-theme.css" rel="stylesheet">
  <link href="sass/semi-dark.css" rel="stylesheet">
  <link href="sass/bordered-theme.css" rel="stylesheet">
  <link href="sass/responsive.css" rel="stylesheet">



</head>

<body>

  <!--start header-->
 <?php include 'header.php';?>
<!--end top header-->


<?php include 'nav.php';?>

  <!--start main wrapper-->
  <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Sider</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Endre tekst på sider</li>

							</ol>
						</nav>
					</div>
          <div class="ms-auto">



          </div>
          <div class="ms-auto">
            <a href="pages.php"> <button type="button" name="button" class="btn btn-primary">Tilbake til side oversikten</button></a>


          </div>
				</div>
				<!--end breadcrumb-->
  <div class="row" id="updateDiv">
        <div class="col-12 col-xl-6">
          <div class="card">
            <div class="card-body p-4">
              <h5 class="mb-4">Dette ligger ute nå </h5>
<h4><?=$title?></h4><br> <?=$content?>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-6">
          <div class="card">
            <div class="card-body p-4">
              <h5 class="mb-4">Endre Innhold</h5>

              <form class="form"  method="post">
                <div class="col-md-6">
                  <label for="input13" class="form-label">Tittel</label>
                  <div class="position-relative input-icon">
                    <input type="text" class="form-control" id="title" name="title" placeholder="First Name" value="<?=$title?>">
                    <input type="hidden" class="form-control" id="edit_by" name="edit_by" placeholder="First Name" value="tom">
                    <input type="hidden" class="form-control" id="edit_date" name="edit_date" placeholder="First Name" value="<?=$dato?>">
                    <input type="hidden" class="form-control" id="page_id" name="page_id" placeholder="First Name" value="<?=$page_id?>">
                    <span class="position-absolute top-50 translate-middle-y"><i class="material-icons-outlined fs-5">person_outline</i></span>
                  </div>
                </div>


                <div class="col-md-12">
                  <label for="input23" class="form-label">Innhold</label>
                  <textarea class="form-control" id="content" name="content" placeholder="Address ..."  rows="4"><?=$content?></textarea>
                </div>

                <div class="col-md-12">
                  Sist endret dato :<?=$last_edit_datetime?>
                  Av: <?=$last_edit_by?>
                  <div class="d-md-flex d-grid align-items-center gap-3">
                    <button type="submit" name="submit-page">Lagre</button>
                    <button type="button" class="btn btn-grd-royal px-4">Avbryt</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        </div>



    </div>
  </main>
  <!--end main wrapper-->

  <!--start overlay-->
     <div class="overlay btn-toggle"></div>
  <!--end overlay-->

   <!--start footer-->
   <footer class="page-footer">
    <p class="mb-0">Copyright © 2024. All right reserved.</p>
  </footer>
  <!--end footer-->


  <!--bootstrap js-->
  <!--bootstrap js-->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <!--plugins-->
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/plugins/metismenu/metisMenu.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script>
    new PerfectScrollbar(".customer-notes")
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>
  <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
  <?php
  if (isset($_POST['submit-page']))
  {
    $pid = $_POST['page_id'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $edit_by = $_POST['edit_by'];
  $edit_datetime = $_POST['edit_date'];

  $sql = "UPDATE pages SET title='$title', content='$content', last_edit_by='$edit_by', last_edit_datetime='$edit_datetime' WHERE id=$pid";

  if ($con->query($sql) === TRUE) {
    ?>

    <script>

    Swal.fire({
position: "top-end",
icon: "success",
title: "Endre/sett passord ...",
text: "Passordet er oppdatert!",
showConfirmButton: false,
  timer: 1500
});
$( "#updateDiv" ).load(window.location.href + " #updateDiv" );

    </script>

    <?php
  } else {
    echo "Error updating record: " . $con->error;
  }

  $con->close();
  }
   ?>


</body>

</html>
