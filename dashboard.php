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
  <!--start header-->
 <?php include 'header.php';?>
<!--end top header-->


<?php include 'nav.php';?>

  <!--start main wrapper-->
  <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Dashboard</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->

        <div class="row">
          <div class="col-xxl-12 d-flex align-items-stretch">
            <div class="card w-100 overflow-hidden rounded-4">
              <div class="card-body position-relative p-4">
                <div class="row">
                  <div class="col-12 col-sm-7">
                    <div class="d-flex align-items-center gap-3 mb-5">

                      <div class="">
                        <p class="mb-0 fw-semibold"><?php $t = date("H");


            if ($t < "10") {
            echo "God morgen";
          } elseif ($t < "18''") {
            echo "God dag";
          } else {
            echo "God kveld";
          }
          ?></p>
                        <h4 class="fw-semibold mb-0 fs-4 mb-0">Bruker</h4>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-5">


                      <div class="">
                        <div id="clock">
                            <p class="date">{{ day }}</p>
                            <p class="date">{{ date }}</p>
                            <p class="time">{{ time }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-5">
                    <a class="weatherwidget-io" href="https://forecast7.com/no/58d147d07/lyngdal/" data-label_1="LYNGDAL" data-label_2="Været" data-theme="original" >LYNGDAL Været</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
                  </div>
                </div><!--end row-->
              </div>
            </div>
          </div>








          <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
              <div class="card-header border-0 p-3 border-bottom">
                <div class="d-flex align-items-start justify-content-between">
                  <div class="">
                    <h5 class="mb-0">Dine siste kundegalleri</h5>
                  </div>
                  <div class="dropdown">
                    <a class="dropdown-item" href="javascript:;"><span class="material-icons-outlined fs-5">refresh</span></a>


                  </div>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="user-list p-3">
                  <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center gap-3">
                      <img src="assets/images/avatars/01.png" width="45" height="45" class="rounded-circle" alt="">
                      <div class="flex-grow-1">
                        <h6 class="mb-0">Elon Jonado</h6>
                        <p class="mb-0">elon_deo</p>
                      </div>
                      <div class="form-check form-check-inline me-0">
                        Antall galleri: 2
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-lg-12 col-xxl-8 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
              <div class="card-body">
               <div class="d-flex align-items-start justify-content-between mb-3">
                  <div class="">
                    <h5 class="mb-0">Dine siste nettbestillinger</h5>
                  </div>
                  <div class="dropdown">
                    <a class="dropdown-item" href="javascript:;"><span class="material-icons-outlined fs-5">refresh</span></a>
                  </div>
                </div>

                 <div class="table-responsive">
                     <table class="table align-middle">
                       <thead>
                        <tr>
                          <th>Vare</th>
                          <th>Antall</th>
                          <th>Sum</th>
                          <th>Status</th>

                        </tr>
                       </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center gap-3">
                                 <div class="">
                                    <img src="assets/images/top-products/01.png" class="rounded-circle" width="50" height="50" alt="">
                                 </div>
                                 <p class="mb-0">Sports Shoes</p>
                              </div>
                            </td>
                            <td>$149</td>
                            <td>Julia Sunota</td>
                            <td><p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">Completed</p></td>

                          </tr>


                        </tbody>
                     </table>
                 </div>
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

  <!--start cart-->

  <!--end cart-->






  <!--start switcher-->

  <!--bootstrap js-->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <!--plugins-->
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/plugins/metismenu/metisMenu.min.js"></script>
  <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/peity/jquery.peity.min.js"></script>
  <script>
    $(".data-attributes span").peity("donut")
  </script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/dashboard1.js"></script>
  <script>
	   new PerfectScrollbar(".user-list")
  </script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js'></script><script  src="assets/js/script.js"></script>
</body>

</html>
