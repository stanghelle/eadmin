<?php include "db.php"; ?>
<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
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
					<div class="breadcrumb-title pe-3">Bruker tilgang</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Bruker tilgang oversikt</li>

							</ol>
						</nav>
					</div>
          <div class="ms-auto">

            <div class="search-bar">
              <div class="position-relative">
                <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text" placeholder="Søk Bruker" name="search" id="myInput">
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
          <div class="card" id="myList">
            <div class="card-body">
              <div class="row row-cols-3 row-cols-lg-5 g-3">

                <div class="col">
                  <div class="card shadow-none border mb-0">
                    <div class="card-body" data-bs-toggle="modal" data-bs-target="#userModal">

                      <div class="text-center mt-4">
                        <h5 class="mb-2">Legg til ny Bruker</h5>

                      </div>
                      <div class="d-flex align-items-center justify-content-around mt-5">
                        <div class="d-flex flex-column gap-2">
                          <h5 class="mb-0"><i class='material-icons-outlined'>add_circle</i></h5>

                        </div>

                      </div>
                      <hr>

                    </div>
                  </div>
                </div>
                <?php

                $query = "SELECT * FROM `users_admin`;";

                // FETCHING DATA FROM DATABASE
                $result = mysqli_query($con, $query);

                while($row = mysqli_fetch_array($result)) {
                $id= $row["id"];
                $name= $row["navn"];
                $username= $row["username"];
                $email= $row["email"];

                ?>







                <div class="col">
                  <div class="card shadow-none border mb-0">


<!--end card-->




                    <div class="card-body">

                      <div class="text-center mt-4">
                        <a href="user.php?uid=<?=$id?>">
                        <h5 class="mb-2"> <img src="assets/images/avatars/user.svg" style="width:100px" alt=""> </h5>
</a>
                      </div>
                      <div class="d-flex align-items-center justify-content-around mt-5">
                        <div class="d-flex flex-column gap-2">

                         <h5 class="mb-0"><?=$name?></h5>
                         <p class="mb-0"><?=$username?></p>
                         <div class="d-flex align-items-center justify-content-around mt-5">
                           <div class="d-flex flex-column gap-1">
                             <h5 class="mb-0"></h5>
                             <p class="mb-0">Epost: <?=$email?></p>
                           </div>

                         </div>
                        </div>


                      </div>
                      <hr>
                      <div class="d-flex align-items-center justify-content-center gap-3">

                        <a href="javascript:;" class="wh-48 bg-dark text-white rounded-circle d-flex align-items-center justify-content-center"><span class="material-symbols-outlined field-icon-edit edit-password" data-bs-toggle="modal" data-bs-target="#editModal<?=$id?>">edit</span></a>
                        <a href="javascript:;" class="wh-48 bg-dark text-white rounded-circle d-flex align-items-center justify-content-center"><span class="material-symbols-outlined field-icon-edit edit-password" data-bs-toggle="modal" data-bs-target="#editpssModal<?=$id?>">key</span></a>
                        <button type="button" name="button" class="wh-48 bg-danger text-white rounded-circle d-flex align-items-center justify-content-center" onclick="showSwalAlert(this)"  data-uid="<?=$id?>"><span class="material-symbols-outlined field-icon-edit edit-password" >delete</span></button>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- Modal edit-->
                <div class="modal fade" id="editModal<?=$id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Endre bruker</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form class="row g-3" method="post">
                  <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Brukernavn</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Brukernavn til bruker" value="<?=$username?>">
                  </div>
                  <div class="col-12">
                    <label for="inputAddress" class="form-label">Navn</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Skriv inn navn på brukeren" value="<?=$name?>">
                  </div>
                  <div class="col-12">
                    <label for="inputAddress2" class="form-label">Epost</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Epost adressen" value="<?=$email?>">
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="Brukernavn til bruker" value="<?=$id?>">
                  </div>



                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Avbryt</button>
                        <button type="submit" class="btn btn-primary" name="submit-edit">oppdater bruker</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--end Modal edit -->

                <!-- Modal edit-->
                <div class="modal fade" id="editpssModal<?=$id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Endre passord</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form class="row g-3" method="post">
                  <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Passord</label>
                    <input type="text" class="form-control" id="Password" name="Password" placeholder="Nytt passord til bruker" onkeyup='passConfirm();'>
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="Brukernavn til bruker" value="<?=$id?>">
                  </div>
                  <div class="col-12">
                    <label for="inputAddress" class="form-label">Gjenta passord</label>
                    <input type="text" class="form-control" id="ConfirmPassword" name="ConfirmPassword" placeholder="igjen ta nytt passord til bruker" onkeyup='passConfirm();'>
                  </div>
                  <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                    <Font color="white"> Passord må være mellom 5-20 tegn </font>
                    </span><br>
                  <span id="Message"></span>
                  </div>


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Avbryt</button>
                        <button type="submit" class="btn btn-primary" name="submit-edit">oppdater passord </button>
                        </form>
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
$(document).ready(function(){
$("#myInput").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  $("#myList div").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});
});
</script>
<script type="text/javascript">
function clearFields() {
    document.getElementById("myInput").value=""
      $( "#myList" ).load(window.location.href + " #myList" );

}
</script>
<script type="text/javascript">
function updatediv() {
      $( "#myList" ).load(window.location.href + " #myList" );

}

var passConfirm = function() {
  if (document.getElementById("Password").value ==
    document.getElementById("ConfirmPassword").value) {
    document.getElementById("Message").style.color = "Green";
    document.getElementById("Message").innerHTML = "Passord er like!"
  } else {
    document.getElementById("Message").style.color = "Red";
    document.getElementById("Message").innerHTML = "Passord er ikke like!"
  }
}

// Unlink folder
function showSwalAlert(favoritt){

  let uid = favoritt.getAttribute("data-uid");
	swal({
	    title: "slette Brukeren?",
	    text: "Er du sikker du vil slette Brukeren, denne blir slettet permanent ?",
	    type: "warning",
	    showCancelButton: true,
      cancelButtonText: "Avbryt",
	    confirmButtonColor: "#DD6B55",
	    confirmButtonText: "Slett Brukernavn",
	    closeOnConfirm: false
	  },
	  function() {
	    $.ajax({
	        type: "post",
	        url: "del_user.php",
					data: {
            uid: uid,
					},
	        success: function(data) {

					}
	      })
	      .done(function(data) {
	        swal("Slettet!", "Bruker er blitt slettet !", "success");
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


      <?php
      if (isset($_POST['submit-page']))
      {
        $username = $_POST['username'];
      $name = $_POST['name'];
      $pss = password_hash($_POST['kpss'], PASSWORD_DEFAULT);
      $email = $_POST['email'];

      $sql = "INSERT INTO users_admin (username, navn, password, email)VALUES ('$username', '$name', '$pss', '$email')";

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

       <!-- mysql passord-->
       <?php

if(isset($_POST['submit-passwd'])){
 $user_id = $_POST['id'];
   $password = $_POST['Password'];
   $password2 = password_hash($_POST['Password'], PASSWORD_DEFAULT);

   $insert = "UPDATE users_admin SET password='$password2' WHERE id=$user_id";

   $query= mysqli_query($con,$insert);

   if($query){

     ?>

     <script>

     Swal.fire({
 position: "top-end",
 icon: "success",
 title: "Endre passord ...",
 text: "Passordet er oppdatert!",
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
<!-- mysql user-->
<?php

if(isset($_POST['submit-user'])){
$user_id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];


$insert = "UPDATE users_admin SET username='$username', email='$email', navn='$name' WHERE id=$kid";

$query= mysqli_query($con,$insert);

if($query){

?>

<script>

Swal.fire({
 position: "top-end",
icon: "success",
title: "Endre bruker ...",
text: "brukeren er oppdatert!",
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
text: "Klarte ikke og oppdatere Epost / brukernavn!",
footer: 'Kontakt IT om feilen forsette'
});

</script>

<?php
}
}
?>
<!-- /mysql user-->
</body>

</html>
