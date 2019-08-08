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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

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


      <div id="logo" class="pull-left">
        <h1><a href="index.php" class="scrollto">KaPeTI</a></h1>
        <p id="subtitle">Sistem Pengelolaan Kerja Praktik <strong>Informatika UKDW Yogyakarta</strong></p>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
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


        <!-- <div class="searchbox">
          <input type="txtSearch" class="searchtext" type="text" placeholder="Pencariannnnnnn...">
        <a onclick="psSearch();" class="searchbutton">
          <i class="fa fa-search"></i>
        </a>
        </div> -->


          <li class="menu-has-children"><!-- <a href="#intro">Home</a></li> -->
            <a href="#intro" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> Lamaran
            </a>
            <ul>
              <li><a href="/templatekp/koordinator/index.php">Pengajuan</a></li>
              <li><a href="/templatekp/koordinator/registrasi.php">Registrasi</a></li>
              <li><a href="/templatekp/koordinator/kp.php">Kelulusan</a></li>
              <li><a href="/templatekp/koordinator/record.php">Record</a></li>
              </ul>
        </li>

        <li class="menu-has-children"><!-- <a href="#intro">Home</a></li> -->
            <a href="#intro" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> Admin
            </a>
            <ul>
              <li><a href="/templatekp/koordinator/kegiatan.php">Jadwal</a></li>
              <li><a href="/templatekp/koordinator/joblist.php">Job List</a></li>
              <li><a href="/templatekp/koordinator/perusahaan.php">Perusahaan</a></li>
              </ul>
        </li>
        <li><a href="/templatekp/koordinator/download.php"><role="button" aria-haspopup="true" aria-expanded="true">Upload</a></li>
        	<li><a href="/templatekp/dosen/index.php"><role="button" aria-haspopup="true" aria-expanded="true">Dosen</a></li>
        <li><a href="/templatekp/koordinator/logout.php"><role="button" aria-haspopup="true" aria-expanded="true">Logout</a></li>
		

         </ul>

         

      </nav><!-- #nav-menu-container -->
          </div>
  </header><!-- #header -->
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url('img/intro-carousel/6.png');">
            <div class="carousel-container">
              <div class="carousel-content">
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

  	  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
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
</body>
</html>
