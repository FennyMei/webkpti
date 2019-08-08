<?php

header("Access-Control-Allow-Origin: *");
	$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
	mysql_select_db('kpukdw');
	
	session_start();

	if(isset($_SESSION['type'])){
		if($_SESSION['type']!="koordinator"){
			header("location: ../index.php");
		}
	}
	else if (!isset($_SESSION['type'])){
		header("location: ../index.php");
	}
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sistem Informasi KP Informatika UKDW</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/universitaskristendutawacana.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet" />
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="js/dataTables/dataTables.bootstrap.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  <!--===============================================================================================-->

  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/149125/pdf.combined.js'></script>
   <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular.min.js'></script> 
  <script src="jquery-3.1.1.min.js"></script>
  <script src="scripts.js"></script>
  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
  <meta name="google-signin-client_id" content="650232885328-e6gsbsa4vgi5gv0nbv87ntjgiar9cfaq.apps.googleusercontent.com">

  <link rel="stylesheet" type="text/css" href="status/index.css">
</head>

<body>

  <!--==========================
    Header
  ============================-->
 

<header id="header">   
<div class="container-fluid">

  <div id="logo" id="head" class="pull-left">
        <a href="../#intro" class="scrollto"><img src="img/intro-carousel/fti-logo.png" style="width: 18%; height: 75px; margin-left: -15px; margin-top: -25px;"/></a>
      </div>


      <nav id="nav-menu-container" style="margin-top: -50px;">
        <ul class="nav-menu">
          <li><div id="signin">
              <div id="gauth">
              	<?php
      						if(isset($_SESSION['email']))
      						{
      							$asd = $_SESSION['email'];
      							$sql = mysql_query("SELECT * from dosen where dosen_pembimbing = '$asd'");
      							$data = mysql_fetch_array($sql);
      							echo '<div>'.$data['nama'].'</div>';
      						}
						
					       ?>
					</div>
            </div>
          </li>


          <li class="menu-has-children"><!-- <a href="#intro">Home</a></li> -->
            <a href="#intro" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> Pelaksanaan
            </a>
            <ul>
              <li><a href="index.php">Pengajuan</a></li>
              <li><a href="registrasi.php">Registrasi</a></li>
              <li><a href="kp.php">Kelulusan</a></li>
              <li><a href="record.php">Riwayat</a></li>
              </ul>
        </li>

        <li class="menu-has-children"><!-- <a href="#intro">Home</a></li> -->
            <a href="#intro" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> Pengelolaan
            </a>
            <ul>
              <li><a href="#">Jadwal</a>
                  <ul class="dropdown-menu">
                  <li><a href="kegiatan.php">Tambah Jadwal</a></li>
                  <li><a href="jadwal.php">Daftar Jadwal</a></li>
                  </ul>
              </li>

              <li class="dropdown dropdown-submenu"><a data-toggle="dropdown" href="#">Pekerjaan</a>
                <ul class="dropdown-menu">
                  <li><a href="joblist.php">Tambah Pekerjaan</a></li>
                  <li><a href="deletejoblist.php">Daftar Pekerjaan</a></li>
                </ul>
              </li>
              <li><a href="#">Perusahaan</a>
                  <ul class="dropdown-menu">
                  <li><a href="perusahaan.php">Tambah Perusahaan</a></li>
                  <li><a href="perusahaanlist.php">Daftar Perusahaan</a></li>
                  </ul>
              </li>
              <li><a href="#">Dosen</a>
                  <ul class="dropdown-menu">
                  <li><a href="tanggapandosen.php">Tambah Dosen</a></li>
                  <li><a href="managedosen.php">Daftar Dosen</a></li>
                  </ul>
              </li>
              </ul>
        
        <li class="menu-has-children"><!-- <a href="#intro">Home</a></li> -->
        <a href="#intro" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Upload</a>
                  <ul>
                  <li><a href="download.php">Tambah Berkas</a>
                  <li><a href="daftarberkas.php">Daftar Berkas</a></li>
                  </ul>
        </li>
        	<li><a href="dosen.php"><role="button" aria-haspopup="true" aria-expanded="true">Bimbingan</a></li>
        <li><a href="logout.php"><role="button" aria-haspopup="true" aria-expanded="true">Keluar</a></li>
		

         </ul>

         

      </nav><!-- #nav-menu-container -->
          </div>
  </header><!-- #header -->
  <!--==========================
<!-- #intro -->
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          

        </div>

      </div>
    </div>
  </section><!-- #intro -->


  <main id="main">
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  	  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script>
(function ($) {
    $(document).ready(function () {
        $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function (event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).parent().siblings().removeClass('open');
            $(this).parent().toggleClass('open');
        });
    });
})(jQuery);
</script>


</body>
</html>
