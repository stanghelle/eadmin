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



          </div>
				</div>
				<!--end breadcrumb-->

        <div class="col-12 col-xl-12">
          <div class="card" id="myList">
            <div class="card-body">
              <div class="row row-cols-3 row-cols-lg-5 g-3">


                <?php

                $query = "SELECT * FROM `pages`;";

                // FETCHING DATA FROM DATABASE
                $result = mysqli_query($con, $query);

                while($row = mysqli_fetch_array($result)) {
                $id= $row["id"];
                $title= $row["title"];
                $content= $row["content"];
                $last_edit_by= $row["last_edit_by"];
                $last_edit_datetime= $row["last_edit_datetime"];

                ?>

                <div class="col">
                  <div class="card shadow-none border mb-0">
                    <div class="card-body">

                      <div class="text-center mt-4">
                        <a href="page.php?pid=<?=$id?>">
                        <h5 class="mb-2"> <img src="assets/images/avatars/user.svg" style="width:120px" alt=""> </h5>
</a>
                      </div>
                      <div class="d-flex align-items-center justify-content-around mt-5">
                        <div class="d-flex flex-column gap-2">

                         <h5 class="mb-0"><?=$title?></h5>

                        </div>


                      </div>
                      <hr>

                    </div>
                  </div>
                </div>
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

   <!--start footer-->
   <footer class="page-footer">
    <p class="mb-0">Copyright © 2024. All right reserved.</p>
  </footer>
  <!--end footer-->


  <!--bootstrap js-->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css"></script>
  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <!--plugins-->
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/plugins/metismenu/metisMenu.min.js"></script>

  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/peity/jquery.peity.min.js"></script>

  <script src="assets/js/main.js"></script>
  <script src="assets/js/dashboard1.js"></script>
  <script>
	   new PerfectScrollbar(".user-list")
  </script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js'></script>
<script  src="assets/js/script.js"></script>
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
</script>





      <script type="text/javascript">
        function ny_kunde(){
          (async () => {
            const { value: formValues } = await Swal.fire({
              title: 'Ny Kunde',
              html:
                'Navn :<input class="swal2-input" Type="text" id="knavn" name="knavn" value="" placeholder="kunde navn" >' +
                'Epost: <input class="swal2-input" Type="text" id="kepost" name="kepost" value="" placeholder="kunde Epost">' +
                '<input class="swal2-input" Type="hidden" id="contactFrmSubmit" name="contactFrmSubmit" placeholder = "name" value="1">',
              showCancelButton: true,
            })

            if (formValues) {
              var data = {
                knavn: $('#knavn').val(),
                kepost: $('#kepost').val(),
                contactFrmSubmit: $('#contactFrmSubmit').val()
              };

              $.ajax({
                url: 'kundeliste.php',
                type: 'post',
                data: data,
                success:function(){
                  Swal.fire({
                       showConfirmButton: true,
                    icon: 'success',
                    title: 'Kunde lagt til',
                    html:
                    ''
                  })
                }
              })
            }
          })()
        }

      </script>
      <?php
$dato = date("d.m.Y h:i:s");
      if(isset($_POST['contactFrmSubmit'])){
        $uid = $_POST['knavn'];
        $aid = $_POST['kepost'];

        $query = "INSERT INTO kunde (username, name, email, registered)VALUES('$aid', '$uid', '$aid', '$dato')";
        mysqli_query($con, $query);
      }
      ?>
</body>

</html>
