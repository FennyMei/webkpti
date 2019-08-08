<?php
  header("Access-Control-Allow-Origin: *");
  include('../koneksi.php');
  session_start();
  //lempar ke dosen/koor
  if(isset($_SESSION['type']))
  {
    if($_SESSION['type']=="koordinator")
    {
      header("Location: koordinator");
    }
  }
  
  $stat = 'NONE';
  if(isset($_SESSION['id']))
  {
    $sql = "SELECT id_lamaran FROM lamaran WHERE google_id='".$_SESSION['id']."' ORDER BY tanggal_input DESC";
    $res = $conn->query($sql);
    $res = $res->fetch_assoc();
    if($res)
    {
      $res = $res['id_lamaran'];
      $sql = "SELECT status_pengajuan, status_registrasi, status_kp FROM lamaran WHERE id_lamaran='".$res."'";
      $res = $conn->query($sql);
      $res = $res->fetch_assoc();
      $_SESSION['last_statPengajuan'] = $res['status_pengajuan'];
    }
  }
?>
<html>
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


  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
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

  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <script src="jquery-3.1.1.min.js"></script>
  <script src="scripts.js"></script>
  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
  <meta name="google-signin-client_id" content="650232885328-e6gsbsa4vgi5gv0nbv87ntjgiar9cfaq.apps.googleusercontent.com">

  <link rel="stylesheet" type="text/css" href="status/index.css">
	</head>
	
	<body>
			<header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
          <a href="../#intro" class="scrollto"><img src="../img/intro-carousel/fti-logo.png" style="width: 18%; height: 75px; margin-left: -15px; margin-top: -25px;"/></a>
      </div>

      <nav id="nav-menu-container" style="margin-top: -50px;">
        <ul class="nav-menu">
          <li><div id="signin">
              <div id="gauth">
                <?php
                  if(isset($_SESSION['user']))
                  {
                    echo '<div>'.$_SESSION['user'].'</div>';
                  }
                  else
                  {
                    echo '<div id="google" class="g-signin2" data-onsuccess="onSignIn"></div>';
                  }
                ?>
              </div>
            </div>
          </li>
          <li><!-- <a href="#intro">Home</a></li> -->
            <a href="#intro" role="button" aria-haspopup="true" aria-expanded="true"> Beranda
            </a>
            <ul>
              <li><a href="../#about">Pengumuman</a></li>
              <?php
                if(isset($_SESSION['id']))
                {
                  echo '<li><a onclick="goLoad(\'download\')" href="../#download"><div id="p-download"></div>Download</a></li>';
                }
              ?>
            </ul>
        </li>
        <?php
          if(isset($_SESSION['id']))
          {
            if($res==false||$res['status_pengajuan']=="NONE"||$res['status_pengajuan']=="DECLINE"||
               $res['status_registrasi']=="DECLINE"||$res['status_kp']=="GUGUR")
              echo '<li><a onclick="goLoad(\'status\')" href="../#pengajuanKp"><div id="p-pengajuan">Pengajuan KP</div></a></li>';
            else if($res['status_pengajuan']=="PENDING"||$res['status_registrasi']!="NONE")
              echo '<li><a onclick="goLoad(\'status\')" href="#"><div id="p-status">Status</div></a></li>';
            else if($res['status_pengajuan']=="ACCEPT")
              echo '<li><a onclick="goLoad(\'registrasi\')" href="#"><div id="p-registrasi">Registrasi</div></a></li>';
            echo '<a onclick="goLoad(\'download\')" href="#"><li><div id="p-download"></div></li></a>';
            echo '<a href="/templatekp/signout.php"><li><div id="signinout">Log Out</div></li></a>';

          }
        ?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->





		<!-- <div id="header">
			<div id="head">
				<a id="title">KaPeTI</a>
				<br>
				<p id="subtitle">Sistem Pengelolaan Kerja Praktik <strong>TI UKDW Yogyakarta</strong></p>
			</div>
		</div>
		<div id="menu">
			<div id="signin">
				<div id="gauth">
					<div>Google</div>
				</div>
			</div>
			<ul id="menupanel">
				<a href="../templatekp"><li><div id="p-home">Home</div></li></a>
				<?php
					echo '<a href="pengajuan"><li><div id="p-pengajuan">Pengajuan</div></li></a>
					<a><li><div id="signinout">Log Out</div></li></a>';
				?>
			</ul>
		</div> -->


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