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
$aid = $_GET['aid'];

$query = "SELECT * FROM `album` WHERE aid = $aid ";

	// FETCHING DATA FROM DATABASE
	$result = $con->query($query);


	while($row = mysqli_fetch_assoc($result)){
		$navn = $row['name'];
		$user_id= $row['user_id'];
		$folder= $row['folder'];
		$dato= $row['dato'];
		}?>
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

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
  <!--bootstrap css-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
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
<style media="screen">
.dropzone {
    background: white;
    border-radius: 5px;
    border: 2px dashed rgb(0, 135, 247);
    border-image: none;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
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
			<div class="breadcrumb-title pe-3">Apper</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Kundegalleri</li>
					</ol>
				</nav>
			</div>

		</div>
		<!--end breadcrumb-->

    <div class="row">
      <div class="col-12 col-lg-3">
        <div class="card">
          <div class="card-body">
            <div class="d-grid"> <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#uploadModal" class="btn btn-grd-info">+ Legg til filer</a>
            </div>
            <h5 class="my-3">My Drive</h5>
            <div class="fm-menu">
              <div class="list-group list-group-flush">
                <a href="kunde.php?kid=<?=$user_id?>" class="list-group-item py-1"><i class='bx bx-folder me-2'></i><span>Tilbake til kunden</span></a>
                <a href="kundefavoritt.php?kid=<?=$user_id?>&aid=<?=$aid?>" class="list-group-item py-1"><i class='bx bx-devices me-2'></i><span>Album Favoritter</span></a>


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

                <div class="input-group input-group-lg"><button type="button" class="btn btn-primary" onclick='updateDiv();'><span class="material-icons-outlined fs-5">refresh</span></button>	<span class="input-group-text bg-transparent"><i class='bx bx-search'></i></span>
                  <input type="text" class="form-control" placeholder="Search the files">
                </div>
              </div>
            </div>
            <div class="row mt-3" id="primary-pills-home">
              <?php
              $counter=0;
              $dir_name = "../kunde/".$user_id."/".$folder."/";
              $images = glob($dir_name."*.*");
              $num_files = glob($dir_name . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);
              $filecount=0;
              $filecount=$filecount+1;

              foreach($images as $image) {
              $file1 = basename($image);?>
              <div class="col-4 col-lg-2">
                <div class="card shadow-none border rounded-4">

                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                      <div class=" bg-grd-primary rounded-4">
                        <img src="<?php echo $image ?>" alt="" class="img-fluid img-thumbnail">
                      </div>

                    </div>

                    <p class="mb-1 mt-4"><span><?php echo $file1 ?></span>

										<button type="button" class="btn btn-outline-danger btn-sm" onclick="showSwalAlert(this)" data-aid="<?=$aid?>" data-img="<?php echo $image ?>"><span class="material-symbols-outlined">delete</span></button>

                    </p>

                  </div>
                </div>
              </div>
              <?php
              }
              ?>
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

    <!-- Modal ny -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Last opp bilde til galleri</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


<SECTION>
  <DIV id="dropzone">
    <FORM class="dropzone needsclick" id="demo-upload" action="upload.php?user_id=<?=$user_id?>&folder=<?=$folder?>">
      <DIV class="dz-message needsclick">
      <font color="black"><i class="material-icons">cloud_upload</i>  Slipp filer her eller klikk for og laste opp.</font><BR>

      </DIV>
    </FORM>
  </DIV>
</SECTION>

<br />


<DIV id="preview-template" style="display: none;">
  <DIV class="dz-preview dz-file-preview">
    <DIV class="dz-image"><IMG data-dz-thumbnail=""></DIV>
    <DIV class="dz-details">
      <DIV class="dz-size"><SPAN data-dz-size=""></SPAN></DIV>
      <DIV class="dz-filename"><SPAN data-dz-name=""></SPAN></DIV>
    </DIV>
    <DIV class="dz-progress"><SPAN class="dz-upload" data-dz-uploadprogress=""></SPAN></DIV>
    <DIV class="dz-error-message"><SPAN data-dz-errormessage=""></SPAN></DIV>
    <div class="dz-success-mark">
      <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
        <title>Check</title>
        <desc>Created with Sketch.</desc>
        <defs></defs>
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
          <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
        </g>
      </svg>
    </div>
    <div class="dz-error-mark">
      <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
        <title>error</title>
        <desc>Created with Sketch.</desc>
        <defs></defs>
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
          <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
            <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
          </g>
        </g>
      </svg>
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
    <!-- Modal ny-->

  <!--bootstrap js-->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <!--plugins-->
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/plugins/metismenu/metisMenu.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/js/main.js"></script>

  <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
  <script type="text/javascript">
  function updateDiv()
  {
      $( "#primary-pills-home" ).load(window.location.href + " #primary-pills-home" );
  }

	var dropzone = new Dropzone('#demo-upload', {
	  previewTemplate: document.querySelector('#preview-template').innerHTML,
	  parallelUploads: 2,
	  thumbnailHeight: 120,
	  thumbnailWidth: 120,
	  maxFilesize: 6,
	  filesizeBase: 1000,
	  thumbnail: function(file, dataUrl) {
	    if (file.previewElement) {
	      file.previewElement.classList.remove("dz-file-preview");
	      var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
	      for (var i = 0; i < images.length; i++) {
	        var thumbnailElement = images[i];
	        thumbnailElement.alt = file.name;
	        thumbnailElement.src = dataUrl;
	      }
	      setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
	    }
	  }

	});


function showSwalAlert(favoritt){
	let aid = favoritt.getAttribute("data-aid");
	let img = favoritt.getAttribute("data-img");
	swal({
	    title: "Are you sure to delete this  of ?",
	    text: "Delete Confirmation?",
	    type: "warning",
	    showCancelButton: true,
	    confirmButtonColor: "#DD6B55",
	    confirmButtonText: "Delete",
	    closeOnConfirm: false
	  },
	  function() {
	    $.ajax({
	        type: "post",
	        url: "unlink_file.php",
					data: {
						aid: aid,
						img: img,
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
  </script>

<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
</body>

</html>
