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



          </div>
          <div class="ms-auto">
<a href="ny_produkt.php"><button type="button" name="button" class="btn" <i class='material-icons-outlined'>add_circle</i></button></a>


          </div>
				</div>
				<!--end breadcrumb-->

        <div class="col-12 col-xl-12">
          <div class="card" id="myList">
            <div class="card-body">
              <div class="row row-cols-3 row-cols-lg-5 g-3">

                <div class="col">
                  <div class="card shadow-none border mb-0">
                    <div class="card-body">
<a href="ny_produkt.php">
                      <div class="text-center mt-4">
                        <h5 class="mb-2">Legg til nytt produkt</h5>

                      </div>
                      <div class="d-flex align-items-center justify-content-around mt-5">
                        <div class="d-flex flex-column gap-2">
                          <h5 class="mb-0"><i class='material-icons-outlined'>add_circle</i></h5>

                        </div>

                      </div>
                      <hr>
</a>
                    </div>
                  </div>
                </div>
                <?php

                $query = "SELECT * FROM `produkt`;";

                // FETCHING DATA FROM DATABASE
                $result = mysqli_query($con, $query);

                while($row = mysqli_fetch_array($result)) {
                $id= $row["id"];
                $name= $row["navn"];
                $kort= $row["kort"];
                $lang= $row["lang"];
                $img= $row["img"];

                ?>







                <div class="col">
                  <div class="card shadow-none border mb-0">


<!--end card-->




                    <div class="card-body">

                      <div class="text-center mt-4">
                        <a href="produkt.php?uid=<?=$id?>">
                        <h5 class="mb-2"> <img src="<?=$img?>" style="width:100px" alt=""> </h5>
</a>
                      </div>
                      <div class="d-flex align-items-center justify-content-around mt-5">
                        <div class="d-flex flex-column gap-2">

                         <h5 class="mb-0"><?=$name?></h5>
                         <p class="mb-0"><?=$kort?></p>
                         <div class="d-flex align-items-center justify-content-around mt-5">
                           <div class="d-flex flex-column gap-1">
                             <h5 class="mb-0"></h5>
                             <p class="mb-0">Se produkt: <span class="material-symbols-outlined field-icon-edit edit-password" data-bs-toggle="modal" data-bs-target="#product_view<?=$id?>">preview</span> </p>
                           </div>

                         </div>
                        </div>


                      </div>
                      <hr>
                      <div class="d-flex align-items-center justify-content-center gap-3">

                        <a href="javascript:;" class="wh-48 bg-dark text-white rounded-circle d-flex align-items-center justify-content-center"><span class="material-symbols-outlined field-icon-edit edit-password" data-bs-toggle="modal" data-bs-target="#editModal<?=$id?>">edit</span></a>
                        <a href="javascript:;" class="wh-48 bg-dark text-white rounded-circle d-flex align-items-center justify-content-center"><span class="material-symbols-outlined field-icon-edit edit-password" data-bs-toggle="modal" data-bs-target="#editimgModal<?=$id?>">image</span></a>
                        <button type="button" name="button" class="wh-48 bg-danger text-white rounded-circle d-flex align-items-center justify-content-center" onclick="showSwalAlert(this)"  data-uid="<?=$id?>"><span class="material-symbols-outlined field-icon-edit edit-password" >delete</span></button>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- Modal edit produkt-->
                <div class="modal fade" id="editModal<?=$id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Endre produkt</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form class="row g-3" method="post">
                          <input type="hidden" class="form-control" id="id" name="id" placeholder="Brukernavn til bruker" value="<?=$id?>">
                  <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Navn</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Navn på produkt" value="<?=$name?>">
                  </div>
                  <div class="col-md-12">
										<label for="input11" class="form-label">Kort tekst(vises på samlesiden)</label>
										<textarea class="form-control" id="kort" name="kort" placeholder="Kort tekst(vises på samlesiden)" rows="3"><?=$kort?></textarea>
									</div>
                  <div class="col-md-12">
                    <label for="input11" class="form-label">Lang tekst(vises inn på produkt siden)</label>
                    <textarea class="form-control" id="lang" name="lang" placeholder="Lang tekst(vises inn på produkt siden)" rows="3"><?=$lang?></textarea>
                  </div>



                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Avbryt</button>
                        <button type="submit" class="btn btn-primary" name="submit-edit">oppdater produkt</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--end Modal edit produkt-->

                <!-- Modal edit img-->
                <div class="modal fade" id="editimgModal<?=$id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Endre bruker</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                          <input type="hidden" class="form-control" id="id" name="id" placeholder="Brukernavn til bruker" value="<?=$id?>">
                          <div class="col-md-6">
        										<label for="input2" class="form-label">Bilde</label>
        										<input class="form-control" type="file" id="uploaded_file" name="uploaded_file">
        									</div>





                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Avbryt</button>
                        <button type="submit" class="btn btn-primary" name="submit-imgedit">oppdater bilde</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--end Modal edit img -->
                <!-- Modal product_view-->
                <div class="modal fade product_view" id="product_view<?=$id?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Forhandsvising av produkt</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">
                        <img src="<?=$img?>" class="img-responsive" width="200px">
                    </div>
                    <div class="col-md-6 product_content">
                        <h4>Kort verson</h4>

                        <p><?=$kort?></p>
                        <div class="space-ten"></div>
                        <h3 class="cost"><span class="glyphicon glyphicon-usd"></span> Lang verson</h3>
                        <div class="row">
                            <p><?=$lang?></p>
                            <!-- end col -->

                            <!-- end col -->

                            <!-- end col -->
                        </div>
                        <div class="space-ten"></div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            Product Id: <span><?=$id?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                <!--end Modal edit -->


                <?php
              }?>




              </div><!--end row-->
            </div>
          </div>
        </div>



    </div>
  </main>
  <!--end main wrapper-->

  <!--start overlay-->
     <div class="overlay btn-toggle"></div>
  <!--end overlay-->

  <!-- Modal new user-->
  <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ny bruker tilgang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3" method="post">
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Brukernavn</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Brukernavn til bruker">
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">Passord</label>
      <input type="password" class="form-control" id="kpss" name="kpss" placeholder="skriv inn passord for bruker">
    </div>
    <div class="col-12">
      <label for="inputAddress" class="form-label">Navn</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Skriv inn navn på brukeren">
    </div>
    <div class="col-12">
      <label for="inputAddress2" class="form-label">Epost</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Epost adressen">
    </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Avbryt</button>
          <button type="submit" class="btn btn-primary" name="submit-page">Opprett bruker</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- end Modal new user-->


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

<script>


// Unlink folder
function showSwalAlert(favoritt){

  let uid = favoritt.getAttribute("data-uid");
	swal({
	    title: "slette produkt?",
	    text: "Er du sikker du vil slette produktet, denne blir slettet permanent ?",
	    type: "warning",
	    showCancelButton: true,
      cancelButtonText: "Avbryt",
	    confirmButtonColor: "#DD6B55",
	    confirmButtonText: "Slett produkt",
	    closeOnConfirm: false
	  },
	  function() {
	    $.ajax({
	        type: "post",
	        url: "del_produkt.php",
					data: {
            uid: uid,
					},
	        success: function(data) {

					}
	      })
	      .done(function(data) {
	        swal("Slettet!", "produkt er blitt slettet !", "success");
					$( "#myList" ).load(window.location.href + " #myList" );
	      })
	      .error(function(data) {
	        swal("Oops", "En feil oppsto, skjer det flere ganger, ta Kontakt med IT!", "error");
	      });
	  }
	);
 }
// slutt unlink folder
</script>



       <!-- mysql passord-->
       <?php

if(isset($_POST['submit-edit'])){
    $produkt_id = $_POST['id'];
    $name = $_POST['name'];
    $kort = $_POST['kort'];
    $lang = $_POST['lang'];


   $insert = "UPDATE produkt SET navn='$name', kort='$kort', lang='$lang' WHERE id=$produkt_id";

   $query= mysqli_query($con,$insert);

   if($query){

     ?>

     <script>

     Swal.fire({
 position: "top-end",
 icon: "success",
 title: "Endre Produkt ...",
 text: "Produkt er oppdatert!",
 showConfirmButton: false,
   timer: 1500
 });
 $( "#myList" ).load(window.location.href + " #myList" );

     </script>

     <?php
}else{
     ?>
     <script>

     Swal.fire({
icon: "error",
title: "Oops...",
text: "Klarte ikke og oppdatere passord!",
footer: 'Kontakt IT om feilen forsette'
});

     </script>

     <?php
   }
}
?>
<!-- /mysql passord-->
<!-- mysql img-->
<?php
// Include the database configuration file
if (isset($_POST['submit-imgedit'])) {
$produkt_id = $_POST['id'];
if(!empty($_FILES['uploaded_file']))
{
$path = "images/produkt/";
$basename = $_FILES['uploaded_file']['name'];
list($filename, $extension) = explode('.', $basename);
$ts = str_replace('.', '', strval(microtime(true)));
$path .= "{$filename}_{$ts}.{$extension}";

if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
$sql = "UPDATE produkt SET img='$path' WHERE id='$produkt_id'";

if ($con->query($sql) === TRUE) {
 ?>

 <script>

 Swal.fire({
 position: "top-end",
 icon: "success",
 title: "Endre Produkt bilde...",
 text: "Produkt bilde er oppdatert!",
 showConfirmButton: false,
 timer: 1500
 });
 $( "#myList" ).load(window.location.href + " #myList" );

 </script>

 <?php
} else { ?>

  <script>

  Swal.fire({
  icon: "error",
  title: "Oops...",
  text: "Klarte ikke og oppdatere passord!",
  footer: 'Kontakt IT om feilen forsette'
  });

  </script>
   <?php
}

$con->close();
}
} else{
 echo "There was an error uploading the file, please try again!";
}
}

?>
<!-- /mysql img-->
</body>

</html>
