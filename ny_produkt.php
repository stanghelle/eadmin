<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<?php include "db.php"; ?>
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
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css">
  <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
  <!--main css-->
  <!--main css-->
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="sass/main.css" rel="stylesheet">
  <link href="assets/css/horizontal-menu.css" rel="stylesheet">
  <link href="sass/dark-theme.css" rel="stylesheet">
  <link href="sass/blue-theme.css" rel="stylesheet">
  <link href="sass/semi-dark.css" rel="stylesheet">
  <link href="sass/bordered-theme.css" rel="stylesheet">
  <link href="sass/responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/klokke_style.css">
  <style media="screen">
  .product_view .modal-dialog{max-width: 800px; width: 100%;}
.pre-cost{text-decoration: line-through; color: #a5a5a5;}
.space-ten{padding: 10px 0;}
  </style>
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
					<div class="breadcrumb-title pe-3">Mine produkter</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Produkt oversikt</li>

							</ol>
						</nav>
					</div>
          <div class="ms-auto">

            <div class="search-bar">
              <div class="position-relative">
                <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text" placeholder="Søk Produkt" name="search" id="myInput">
                <span class="material-icons-outlined position-absolute d-lg-block d-none ms-3 translate-middle-y start-0 top-50">search</span>
                <span class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 search-close" onclick="clearFields()">close</span>

              </div>

            </div>

          </div>
          <div class="ms-auto">
<button type="button" name="button" class="btn" data-bs-toggle="modal" data-bs-target="#userModal"> <i class='material-icons-outlined'>add_circle</i></button>


          </div>
				</div>
				<!--end breadcrumb-->

        <div class="col-12 col-xl-12">
          <div class="col-12 col-xl-6">
            <div class="card">
							<div class="card-body p-4">
								<h5 class="mb-4">Nytt produkt</h5>
								<form class="row g-3" method="post" enctype="multipart/form-data" >
									<div class="col-md-6">
										<label for="input1" class="form-label">Navn</label>
										<input type="text" class="form-control" id="name" name="name" placeholder="Produkt navn">
									</div>
									<div class="col-md-6">
										<label for="input2" class="form-label">Bilde</label>
										<input class="form-control" type="file" id="uploaded_file" name="uploaded_file">
									</div>





									<div class="col-md-12">
										<label for="input11" class="form-label">Kort tekst(vises på samlesiden)</label>
										<textarea class="form-control" id="kort" name="kort" placeholder="Address ..." rows="3"></textarea>
									</div>
                  <div class="col-md-12">
                    <label for="input11" class="form-label">Lang tekst(vises inn på produkt siden)</label>
                    <textarea class="form-control" id="lang" name="lang" placeholder="Address ..." rows="3"></textarea>
                  </div>

									<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="submit" class="btn btn-grd-primary px-4" name="submit">Submit</button>
											<button type="button" class="btn btn-grd-royal px-4">Reset</button>
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

  <script>
	   new PerfectScrollbar(".user-list")
  </script>

      <?php
      if (isset($_POST['submit-page'])) {
      $name = $_POST['name'];
      $kort = $_POST['kort'];
      $lang = $_POST['lang'];

      $ds          = DIRECTORY_SEPARATOR;  //1

      $storeFolder = 'uploads/';   //2

      if (!empty($_FILES)) {

          $tempFile = $_FILES['file']['tmp_name'];          //3

          $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

          $targetFile =  $targetPath. $_FILES['file']['name'];  //5

          move_uploaded_file($tempFile,$targetFile); //6

      }

      $sql = "INSERT INTO produkt (navn, kort, lang, img)VALUES ('$name', '$kort', '$lang', '$targetFile')";

      if ($con->query($sql) === TRUE) {
        ?>

        <script>

        Swal.fire({
    position: "top-end",
    icon: "success",
    title: "Ny bruker   ...",
    text: "Ny bruker er blitt lagt inn!",
    showConfirmButton: false,
      timer: 1500
    });
    $( "#myList" ).load(window.location.href + " #myList" );

        </script>

        <?php
      } else {
        echo "Error updating record: " . $con->error;
      }

      $con->close();
      }


       ?>


       <?php
       // Include the database configuration file
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $kort = $_POST['kort'];
  $lang = $_POST['lang'];
  if(!empty($_FILES['uploaded_file']))
  {
    $path = "images/produkt/";
    $basename = $_FILES['uploaded_file']['name'];
    list($filename, $extension) = explode('.', $basename);
    $ts = str_replace('.', '', strval(microtime(true)));
    $path .= "{$filename}_{$ts}.{$extension}";

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      $sql = "INSERT INTO produkt (navn, kort, lang, img)VALUES ('$name', '$kort', '$lang', '$path')";

      if ($con->query($sql) === TRUE) {
        ?>

        <script>

        Swal.fire({
    title: 'Ønsker du og legge til flere produkt?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Ja',
    denyButtonText: 'Nei',
    customClass: {
      actions: 'my-actions',
      cancelButton: 'order-1 right-gap',
      confirmButton: 'order-2',
      denyButton: 'order-3',
    },
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire('Klar for og legg inn flere produkt', '', 'info')
    } else if (result.isDenied) {
      window.location.href = "produkt_listing.php";
    }
  })

        </script>

        <?php
      } else {
        echo "Error updating record: " . $con->error;
      }

      $con->close();
      }
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }

       ?>

</body>

</html>
