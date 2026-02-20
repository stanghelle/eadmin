<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Maxton | Bootstrap 5 Admin Dashboard Template</title>
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
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
			<div class="breadcrumb-title pe-3">Components</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">File Manager</li>
					</ol>
				</nav>
			</div>
			<div class="ms-auto">
				<div class="btn-group">
					<button type="button" class="btn btn-primary">Settings</button>
					<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
					</button>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
						<a class="dropdown-item" href="javascript:;">Another action</a>
						<a class="dropdown-item" href="javascript:;">Something else here</a>
						<div class="dropdown-divider"></div><a class="dropdown-item" href="javascript:;">Separated link</a>
					</div>
				</div>
			</div>
		</div>
		<!--end breadcrumb-->

    <div class="row">
      <div class="col-12 col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="d-grid"> <a href="javascript:;" class="btn btn-grd-info">+ Add File</a>
            </div>
            <h5 class="my-3">My Drive</h5>
            <div class="fm-menu">
              <div class="list-group list-group-flush">
                <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-folder me-2'></i><span>Tilbake til kunden</span></a>
                <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-devices me-2'></i><span>Album Favoritter</span></a>
                <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-analyse me-2'></i><span>Andre galleri</span></a>
                <hr>
                <a href="javascript:;" class="list-group-item py-1"><i class='bx bx-trash-alt me-2'></i><span>Deleted Files</span></a>

              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-12 col-lg-9">


        <div class="card">
          <div class="card-body">
            <div class="fm-search">
              <div class="mb-0">
                <div class="input-group input-group-lg">	<span class="input-group-text bg-transparent"><i class='bx bx-search'></i></span>
                  <input type="text" class="form-control" placeholder="Search the files">
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-4 col-lg-2">
                <div class="card shadow-none border rounded-4">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                      <div class=" bg-grd-primary rounded-4">
                        <img src="assets/images/gallery/01.png" alt="" class="img-fluid img-thumbnail">
                      </div>

                    </div>

                    <p class="mb-1 mt-4"><span>45.5 GB</span>
                    </p>

                  </div>
                </div>
              </div>

            </div>
            <!--end row-->


            <!--end row-->

          </div>
        </div>
      </div>
    </div>
    <!--end row-->

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
    <!--top footer-->



  <!--bootstrap js-->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <!--plugins-->
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/plugins/metismenu/metisMenu.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
  function updateDiv()
  {
      $( "#primary-pills-home" ).load(window.location.href + " #primary-pills-home" );
  }

  </script>

</body>

</html>
