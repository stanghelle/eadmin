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
$kid = $_GET['kid'];

$query="SELECT * FROM kunde WHERE id = '".$kid."'";
$result = mysqli_query($con, $query);


while($get = mysqli_fetch_array($result)) {
$navn = $get["name"];
$tlf = $get["tlf"];
$email= $get["email"];
$username= $get["username"];
$p2= $get["p2"];
$last_seen= $get["last_seen"];
}

$query = "SELECT COUNT(fid) as total FROM favo_list WHERE user_id = $kid ";
$result = mysqli_query($con,$query);
 while($row = mysqli_fetch_assoc($result)){

$antall_favo = $row['total'];
}
$query = "SELECT COUNT(ufid) as total FROM favoritt WHERE user_id = $kid ";
$result = mysqli_query($con,$query);
 while($row = mysqli_fetch_assoc($result)){

$antall_favo_bilde = $row['total'];
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
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="sass/main.css" rel="stylesheet">
  <link href="assets/css/horizontal-menu.css" rel="stylesheet">
  <link href="sass/dark-theme.css" rel="stylesheet">
  <link href="sass/blue-theme.css" rel="stylesheet">
  <link href="sass/semi-dark.css" rel="stylesheet">
  <link href="sass/bordered-theme.css" rel="stylesheet">
  <link href="sass/responsive.css" rel="stylesheet">
<style >
input[type="date"]::-webkit-calendar-picker-indicator {
  cursor: pointer;
  border-radius: 4px;
  margin-right: 2px;
  opacity: 0.6;
  color-scheme: dark;
  transition-property: all;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}

input[type="date"]::-webkit-calendar-picker-indicator:hover {
  opacity: 1
}

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
        <div class="breadcrumb-title pe-3">kundegalleri</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Kunde info</li>
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
          <div class="btn-group">
          <a href="kundeliste.php">  <button type="button" class="btn btn-primary">Tibake til oversikten</button></a>


          </div>
        </div>
      </div>
      <!--end breadcrumb-->


      <div class="row">
        <div class="col-12 col-lg-4 d-flex">
          <div class="card w-100" id="updatekundeinfo">
            <div class="card-body">
<span class="float-end text-muted"> <button type="button" class="btn btn-primary" onclick='updatekundeinfo();'><span class="material-icons-outlined fs-5">refresh</span></button> </span>
              <div class="text-center mt-5 pt-4">
                <h4 class="mb-1"><?=$navn?></h4>

              </div>

              <div class="d-flex align-items-center justify-content-around">
                <div class="d-flex flex-column gap-2">

                  <p class="mb-0">Favoritt lister</p>
                  <h4 class="mb-0"><?=$antall_favo?> stk</h4>
                </div>
                <div class="d-flex flex-column gap-2">

                  <p class="mb-0">Antall favoritt bilde</p>
                  <h4 class="mb-0"><?=$antall_favo_bilde?> stk</h4>
                </div>


              </div>

            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <b>Sist innlogget</b>
                <br>
                <?=$last_seen?>
              </li>
              <li class="list-group-item">
                <b>Epost / brukernavn</b><span class="material-symbols-outlined field-icon-edit edit-password" data-bs-toggle="modal" data-bs-target="#userModal">edit</span>
                <br>
                <?=$email?> / <?=$username?>
              </li>
              <li class="list-group-item">
                <b>Telefon nr</b> <span class="material-symbols-outlined field-icon-edit edit-password" data-bs-toggle="modal" data-bs-target="#tlfModal">edit</span>

                <br>
                Mobile : <?=$tlf?>
              </li>
              <li class="list-group-item">
                <b>Passord</b>

                <br>
                <div class="input-group col-md-6" id="pdiv">

  <input type="password" class="form-control" placeholder="Passord ikke satt" aria-label="Username" aria-describedby="basic-addon1" id="psswd" value="<?=$p2?>">
  <span class="input-group-text" id="basic-addon1"><span class="material-symbols-outlined field-icon toggle-password" onclick="myFunction()">visibility</span></span>
  <span class="input-group-text" id="basic-addon1"><span class="material-symbols-outlined field-icon-edit edit-password" data-bs-toggle="modal" data-bs-target="#passModal">edit</span></span>
</div>






              </li>
            </ul>


          </div>
        </div>

        <div class="col-12 col-lg-8 ">
          <div class="card">
            <div class="card-title">
              <h5 class="mb-0 text-white">Kunde galleri </h5>
              <span class="float-end text-muted"> <button type="button" class="btn btn-primary" onclick='updateDiv();'><span class="material-icons-outlined fs-5">refresh</span></button> </span>
            </div>
            <div class="card-body" id="galleri">
              <div class="row row-cols-3 row-cols-lg-3 g-3">

                <div class="col">
                  <div class="card shadow-none bg-grd-voilet mb-0" style="height: 160px;">
                    <div class="card-body" data-bs-toggle="modal" data-bs-target="#ny_galleri">
                      <h5 class="mb-0 text-white">Legg til galleri</h5>
                      <img src="assets/images/megaIcons/add_circle.png" class="position-absolute end-0 bottom-0" width="140" alt="">
                    </div>
                  </div>
                </div>
                <?php
                $query = "SELECT * FROM `album` WHERE user_id = $kid ";

                  // FETCHING DATA FROM DATABASE
                  $result = $con->query($query);


                  while($row = mysqli_fetch_assoc($result)){

     ?>
                <div class="col">
                  <div class="card shadow-none bg-grd-voilet mb-0" style="height: 160px;">

                    <div class="card-body">

                      <a href="kundegalleri.php?aid=<?php echo $row['aid']; ?>"><h5 class="mb-0 text-white"><?php echo $row['name']; ?></h5><?php echo $row['dato']; ?></a>
                      <img src="kunde/<?=$kid?>/<?php echo $row['folder']; ?>/<?php echo $row['img']; ?>" class="position-absolute end-0 bottom-0" width="140" alt="">

                    </div>
                    <div class="card-footer">
<span class="float-start text-muted"> <button type="button" class="btn btn-primary" onclick="showSwalAlert(this)" data-aid="<?php echo $row['aid']; ?>" data-uid="<?=$kid?>" data-folder="<?php echo $row['folder']; ?>"><span class="material-icons-outlined fs-5">delete</span></button> </span>
                    </div>
                  </div>
                </div>


<?php } ?>



              </div><!--end row-->
            </div>
          </div>
        </div>
      </div><!--end row-->









    </div>
  </main>
  <!--end main wrapper-->



  <!-- Modal ny galleri-->
  <div class="modal fade" id="ny_galleri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nytt galleri</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form name="ContactForm" method="post" action="">
            <input type="hidden" name="user_id" id="user_id" value="<?=$kid?>">
            <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Navn på album</span>
  <input type="text" class="form-control" placeholder="Navn på album" aria-label="Navn på album" aria-describedby="basic-addon1" name="album" id="album">
</div>

<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon1">dato</span>
<input type="date" class="form-control" placeholder="dato" aria-label="dato" aria-describedby="basic-addon1" name="dato" id="dato">
</div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Avbryt</button>
          <button type="submit" class="btn btn-primary" name="submit_galleri">Oprett galleri</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Modal ny galleri-->
  <!-- Modal passord-->
  <div class="modal fade" id="passModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Endre sett passord</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="row g-3 align-items-center">
            <form class="form" onsubmit="validateForm(event)" method="post">


            <div class="col-auto">
              <input type="password" id="Password" name="Password" placeholder="skriv inn passord" class="form-control" aria-describedby="passwordHelpInline" onkeyup='passConfirm();'>
            </div>
            <div class="col-auto">
              <input type="password" id="ConfirmPassword" name="ConfirmPassword" placeholder="Gjenta passord" class="form-control" aria-describedby="passwordHelpInline" onkeyup='passConfirm();'>
            </div>
            <div class="col-auto">
              <span id="passwordHelpInline" class="form-text">
              <Font color="white"> Passord må være mellom 5-20 tegn </font>
              </span><br>
            <span id="Message"></span>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Avbryt</button>
          <button type="submit" name="submit-passwd" class="btn btn-primary">Lagre passord</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- /Modal passord-->

<!-- Modal epost/brukernavn-->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Endre Epost / brukernavn</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="row g-3 align-items-center">
          <form class="form" onsubmit="validateForm(event)" method="post">


          <div class="col-auto">
            <input type="email" id="email" name="email" placeholder="skriv inn ny epost" class="form-control" aria-describedby="passwordHelpInline" value="<?=$email?>">
          </div>
          <div class="col-auto">
            <input type="text" id="username" name="username" placeholder="Skriv inn nytt brukernavn" class="form-control" aria-describedby="passwordHelpInline" value="<?=$username?>">
          </div>
          <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
            <Font color="white"> Epost og brukernavn kan være det samme, eller sett eget brukernavn </font>
            </span><br>

          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Avbryt</button>
        <button type="submit" name="submit-user" class="btn btn-primary">Lagre Epost/brukernavn</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- /Modal passord-->

<!-- Modal tlf-->
<div class="modal fade" id="tlfModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Endre sett Telefonnr</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="row g-3 align-items-center">
          <form class="form" onsubmit="validateForm(event)" method="post">


          <div class="col-auto">
            <input type="tel" id="tlf" name="tlf" placeholder="skriv inn Telefonnr" class="form-control" aria-describedby="passwordHelpInline" value="<?=$tlf?>">
          </div>

          <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
            <Font color="white"> Skriv inn Telefonnr til kunden </font>
            </span><br>
          <span id="Message"></span>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Avbryt</button>
        <button type="submit" name="submit-tlf" class="btn btn-primary">Lagre Telefonnr</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- /Modal passord-->

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
  <script type="text/javascript">
  function updateDiv()
  {
      $( "#galleri" ).load(window.location.href + " #galleri" );
  }
  function updatekundeinfo()
  {
      $( "#updatekundeinfo" ).load(window.location.href + " #updatekundeinfo" );
  }
  $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });

  function myFunction() {
  var x = document.getElementById("psswd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
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
	let aid = favoritt.getAttribute("data-aid");
	let folder = favoritt.getAttribute("data-folder");
  let uid = favoritt.getAttribute("data-uid");
	swal({
	    title: "Er du sikker du vil slette denne, mappen og alt i den blir slettet ?",
	    text: "Er du sikker?",
	    type: "warning",
	    showCancelButton: true,
      cancelButtonText: "Avbryt",
	    confirmButtonColor: "#DD6B55",
	    confirmButtonText: "Slett galleri",
	    closeOnConfirm: false
	  },
	  function() {
	    $.ajax({
	        type: "post",
	        url: "unlink_folder.php",
					data: {
						aid: aid,
						folder: folder,
            uid: uid,
					},
	        success: function(data) {

					}
	      })
	      .done(function(data) {
	        swal("Deleted!", "Data successfully Deleted!", "success");
					$( "#primary-pills-home" ).load(window.location.href + " #primary-pills-home" );
	      })
	      .error(function(data) {
	        swal("Oops", "We couldn't connect to the server!", "error");
	      });
	  }
	);
 }
// slutt unlink folder
  </script>
  <?php

   if(isset($_POST['submit_galleri'])){

    $user_id = $_POST['user_id'];
    $navn = $_POST['album'];
    $dato = $_POST['dato'];
    $slug = str_replace(' ', '-', strtolower($navn));


    $file_path = "../kunde/".$user_id."/".$slug."";

    if (file_exists($file_path)) { ?>
      <script>

      Swal.fire({
icon: "error",
title: "Oops...",
text: "Denne mappen finnes allerede!",
});
</script>
<?php
    }
    else {



mkdir("../kunde/".$user_id."/".$slug."",0777,true);
      $insert = "insert into album(user_id,name,folder,dato)values('$user_id','$navn','$slug','$dato')";

      $query= mysqli_query($con,$insert);

      if($query){

        ?>

        <script>

        Swal.fire({
  icon: "success",
  title: "Lagt inn ...",
  text: "Galleri opprettet!",

  });

$( "#primary-pills-home" ).load(window.location.href + " #primary-pills-home" );

        </script>

        <?php

      }else{

        ?>

        <script>

        Swal.fire({
  icon: "error",
  title: "Oops...",
  text: "Something went wrong!",
  footer: '<a href="#">Why do I have this issue?</a>'
  });

  <?php

}
  }


}

?>

        </script>
        <!-- mysql passord-->
        <?php

 if(isset($_POST['submit-passwd'])){

    $password = $_POST['Password'];
    $password2 = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    $insert = "UPDATE kunde SET password='$password2', p2='$password' WHERE id=$kid";

    $query= mysqli_query($con,$insert);

    if($query){

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
  $( "#updatekundeinfo" ).load(window.location.href + " #updatekundeinfo" );

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

$email = $_POST['email'];
$username = $_POST['username'];


$insert = "UPDATE kunde SET username='$username', email='$email' WHERE id=$kid";

$query= mysqli_query($con,$insert);

if($query){

?>

<script>

Swal.fire({
  position: "top-end",
icon: "success",
title: "Endre Epost / brukernavn ...",
text: "Epost / brukernavn er oppdatert!",
showConfirmButton: false,
  timer: 1500

});
$( "#updatekundeinfo" ).load(window.location.href + " #updatekundeinfo" );

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
<!-- mysql tlf-->
<?php

if(isset($_POST['submit-tlf'])){

$tlf = $_POST['tlf'];

$insert = "UPDATE kunde SET tlf='$tlf' WHERE id=$kid";

$query= mysqli_query($con,$insert);

if($query){

?>

<script>

Swal.fire({
position: "top-end",
icon: "success",
title: "Endre/sett Telefonnr ...",
text: "Telefonnr er oppdatert!",
showConfirmButton: false,
  timer: 1500
});
$( "#updatekundeinfo" ).load(window.location.href + " #updatekundeinfo" );

</script>

<?php
}else{
?>
<script>

Swal.fire({
icon: "error",
title: "Oops...",
text: "Klarte ikke og oppdatere Telefonnr!",
footer: 'Kontakt IT om feilen forsette'
});

</script>

<?php
}
}
?>
<!-- /mysql tlf-->


</body>

</html>
