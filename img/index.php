<?php
  header("Access-Control-Allow-Origin: *");
  include('koneksi.php');
  session_start();
  //lempar ke dosen/koor


   
    if(isset($_SESSION['email'])){
      $email = $_SESSION['email'];
      $sqllist = "SELECT * FROM dosen WHERE dosen_pembimbing='$email'";
      $resultlist = mysqli_query($conn,$sqllist);
      $data= mysqli_fetch_array($resultlist);

      if($data['status']=="KOORDINATOR"){
          $_SESSION['type']="koordinator";
          header("Location: koordinator");
      }
      else if ($data['status']=="DOSEN") {
          $_SESSION['type']="dosen";
          header("Location: dosen");
      }
      else{
        $_SESSION['type']="mahasiswa";
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
  <meta name="google-signin-client_id" content="59784609767-iuaatjgsar25fqpdgr27es8bs5fdr17e.apps.googleusercontent.com">

  <link rel="stylesheet" type="text/css" href="status/index.css">
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">KaPeTI</a></h1>
        <p id="subtitle">Sistem Pengelolaan Kerja Praktik <strong>Informatika UKDW Yogyakarta</strong></p>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
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
          <!-- <a href="#intro">Home</a></li> -->
            <li class="menu-has-children">
              <a href="#intro" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Beranda</a>
            <ul>
              <li><a href="#about">Pengumuman</a></li>
              <?php
                if(isset($_SESSION['id']))
                {
                  echo '<li><a onclick="goLoad(\'download\')" href="#download"><div id="p-download"></div>Download</a></li>';
                }
              ?>
            </ul>
        </li>
    
        <?php
          if(isset($_SESSION['id']))
          {
            if($res==false||$res['status_pengajuan']=="NONE"||$res['status_pengajuan']=="DECLINE"||
               $res['status_registrasi']=="DECLINE"||$res['status_kp']=="GUGUR")
              echo '<li><a onclick="goLoad(\'status\')" href="#pengajuanKp"><div id="p-pengajuan">Pengajuan KP</div></a></li>';
            else if($res['status_pengajuan']=="PENDING"||$res['status_registrasi']!="NONE")
              echo '<li><a onclick="goLoad(\'status\')" href="#pengajuanKp"><div id="p-status">Status Pengajuan</div></a></li>';
            else if($res['status_pengajuan']=="ACCEPT")
              
            echo '<a onclick="goLoad(\'download\')" href="#"><li><div id="p-download"></div></li></a>';
            echo '<li><a href="signout.php"><div id="signinout">Log Out</div></a></li>';
          }
        ?>
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

    <!--==========================
      Featured Services Section
    ============================-->
    <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <!-- <i class="ion-ios-bookmarks-outline"></i> -->
            <h4 class="title">KP Reguler A</h4>
            <p class="description">Mahasiswa memilih perusahaan yang telah bekerjasama dengan FTI (melakukan proses pengajuan dan registrasi).</p>
          </div>

          <div class="col-lg-4 box box-bg">
            <!-- <i class="ion-ios-stopwatch-outline"></i> -->
            <h4 class="title">KP Reguler B</h4>
            <p class="description">Mahasiswa memilih sendiri perusahaan yang diinginkan (melakukan proses pengajuan dan registrasi).</p>
          </div>

          <div class="col-lg-4 box">
            <!-- <i class="ion-ios-heart-outline"></i> -->
            <h4 class="title">KP Fakultas</h4>
            <p class="description">Mahasiswa memilih perusahaan yang telah bekerjasama dengan FTI (melakukan proses pengajuan, tanpa melakukan proses registrasi).</p>
          </div>

        </div>
      </div>
    </section><!-- #featured-services -->

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">
        <header class="section-header">
          <h3>Pengumuman</h3>
          <p>Tanggal penting yang berhubungan dengan Kerja Praktik</p>
        </header>
        <div class="row about-cols">
          <div class="table-responsive">
              <?php
              $sqllist = "SELECT * FROM jadwal";
              $resultlist = mysqli_query($conn,$sqllist);
              if(mysqli_num_rows($resultlist) > 0)
               {
              ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Semester</th>
                                            <th>Tahun AJaran</th>
                                            <th>Mulai Pendaftaran KP</th>
                                            <th>Akhir Pendaftaran KP</th>
                                            <th>Mulai Registrasi KP</th>
                                            <th>Akhir Registrasi KP</th>
                                            <th>Mulai Proses KP</th>
                                            <th>Akhir Proses KP</th>
                                            <th>Mulai Monitoring KP</th>
                                            <th>Akhir Monitoring KP</th>
                                            <th>Mulai Daftar Ujian KP</th>
                                            <th>Akhir Daftar Ujian KP</th>
                                            <th>Mulai Ujian KP</th>
                                            <th>Akhir Ujian KP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        <?php
                                         $query = "SELECT * FROM jadwal";
                                          $sql = mysqli_query($conn,$sqllist);
                                          while($data = mysqli_fetch_array($sql)){
                                        ?>
                                        <tr>
                                          <td><font face=tahoma size=2><?php echo $data['semester']; ?></font></td>
                                          <td><font face=tahoma size=2><?php echo $data['tahun']; ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['spendaftarankp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['ependaftarankp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['sregistrasikp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['eregistrasikp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['sproseskp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['eproseskp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['smonitoringkp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['emonitoringkp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['sdafujiankp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['edafujiankp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['sujiankp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['eujiankp'])); ?></font></td>
                                          </tr>
                                          <?php
                                            }
                                          ?>
                                        
                                    </tbody>
                                </table>
                                <?php
                                }
                                else{
                                  echo "<p>Tidak ada pengumuman</p>";
                                }
                                ?>
                            </div>
        </div>
      </div>
    </section><!-- #about -->
    <br>
    <br>
    <?php
    if(isset($_SESSION['id'])){
    ?>
    <section id="pengajuanKp">
      <div class="container">
        <header class="section-header">
          <h3>Pengajuan KP</h3>
        </header>
          <?php
            include('koneksi.php');
            $last_pengajuan = "NONE";
            $last_registration = "NONE";
            $last_kp = "NONE";
            $sql = "SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE google_id='".$_SESSION['id']."'";
            $num = $conn->query($sql);
            $num = $num->fetch_assoc();
            $num = $num['num'];
          
//            $sql = "SELECT id_lamaran, status_registrasi, status_kp FROM lamaran WHERE google_id='".$_SESSION['id']."' ORDER BY id_lamaran DESC";
//            $res = $conn->query($sql);
//            $res = $res->fetch_assoc();
            if($num!=0)
            {
              echo '<table>
                  <thead>
                    <th>No</th>
                    <th>Perusahaan</th>
                    <th>Tipe KP</th>
                    <th>Status Pengajuan</th>
                    <th>Status Registrasi</th>
                    <th>Status KP</th>
                    <th>Dosen Pembimbing</th>
                  </thead>
                <tbody>';
              
              $sql = "SELECT id_lamaran, kpc1, kpc2, tipe, status_pengajuan, status_registrasi, status_kp FROM lamaran, perusahaan
              WHERE perusahaan.id_perusahaan=lamaran.id_perusahaan AND google_id='".$_SESSION['id']."' ORDER BY tanggal_input ASC";
              $q = $conn->query($sql);
              $i=0;
              while($row = $q->fetch_array())
              {
                echo '<tr>
                    <td>'.($i+1).'</td>';
                
                $sql = "SELECT nama_perusahaan, job_desc FROM lamaran, perusahaan
                WHERE id_lamaran='".$row['id_lamaran']."' AND perusahaan.id_perusahaan=lamaran.id_perusahaan ORDER BY tanggal_input ASC";
                $query = $conn->query($sql);
                $kpcperusahaan = $query->fetch_assoc();
                $perusahaan='<abbr title="'.$kpcperusahaan['job_desc'].'"><u>'.$kpcperusahaan['nama_perusahaan'].'</abbr>';
                if($row['kpc1']!=-1)
                {
                  $sql = "SELECT nama_perusahaan, kpc1_jd FROM lamaran, perusahaan
                  WHERE id_lamaran='".$row['id_lamaran']."' AND perusahaan.id_perusahaan=lamaran.kpc1";
                  $query = $conn->query($sql);
                  $kpcperusahaan = $query->fetch_assoc();
                  $perusahaan=$perusahaan.'<br><abbr title="'.$kpcperusahaan['kpc1_jd'].'">'.$kpcperusahaan['nama_perusahaan'].'</abbr>';
                  if($row['kpc2']!=-1)
                  {
                    $sql = "SELECT nama_perusahaan, kpc2_jd FROM lamaran, perusahaan
                    WHERE id_lamaran='".$row['id_lamaran']."' AND perusahaan.id_perusahaan=lamaran.kpc2";
                    $query = $conn->query($sql);
                    $kpcperusahaan = $query->fetch_assoc();
                    $perusahaan=$perusahaan.'<br><abbr title="'.$kpcperusahaan['kpc2_jd'].'">'.$kpcperusahaan['nama_perusahaan'].'</abbr>';
                  }
                }
                echo '</u><td>'.$perusahaan.'</td>
                    <td>'.$row['tipe'].'</td>';
                
                    switch ($row['status_pengajuan'])
                    {
                      case "ACCEPT":     echo '<td>DITERIMA</td>'; break;
                      case "DECLINE":    echo '<td>DITOLAK</td>'; break;
                      case "PENDING":    echo '<td>MENUNGGU KEPUTUSAN</td>'; break;
                    }
                if(strcmp($row['status_registrasi'], "NONE")!=0)
                {
                  if(strcmp($row['status_registrasi'], "ACCEPT")==0)
                  {
                    echo      '<td>DITERIMA</td>';
                    if(strcmp($row['status_kp'], "LULUS")==0)      echo '<td>LULUS</td>';
                    else if(strcmp($row['status_kp'], "GUGUR")==0) echo '<td>GUGUR</td>';
                    else if(strcmp($row['status_kp'], "NONE")==0)  echo '<td>SEDANG BERLANGSUNG</td>';
                    
                  }
                  else if(strcmp($row['status_registrasi'], "DECLINE")==0)
                    echo  '<td>DITOLAK</td><td>-</td>';
                  else if(strcmp($row['status_registrasi'], "PENDING")==0)
                    echo  '<td>MENUNGGU KEPUTUSAN</td><td>-</td>';
                }
                else
                {
                  echo '<td>-</td><td>-</td>';
                }
                
                
                $sqlcek = "SELECT mahasiswa.dosen_pembimbing, dosen.nama AS nama_dosen FROM lamaran, mahasiswa, dosen WHERE lamaran.nim=mahasiswa.nim AND dosen.dosen_pembimbing=mahasiswa.dosen_pembimbing AND google_id='".$_SESSION['id']."'";
                $resultcek = mysqli_query($conn,$sqlcek);
                $cekdata = mysqli_fetch_array($resultcek);

                if($cekdata['dosen_pembimbing']!=NULL||$cekdata['dosen_pembimbing']!=""){
                  echo  '<td>'.$cekdata['nama_dosen'].'</td></tr>';
                }
                else{
                  echo "<td>-</td></tr>";
                }

                $last_pengajuan = $row['status_pengajuan'];
                $last_registration = $row['status_registrasi'];
                $last_kp = $row['status_kp'];
                $i++;
              }
              
              echo  '</tbody>
                </table>';
            }
            if($num==0||strcmp($last_pengajuan, "DECLINE")==0||strcmp($last_registration, "DECLINE")==0||strcmp($last_kp, "GUGUR")==0)
            {
              echo '<center>
              <div class="container">
              <center>
              <div class="row">

              <div class="col-md-6">
              <a href="\templatekp\kpreguler">
                <Strong>Kerja Praktik Reguler</Strong>
                 <br>
                 <br>
                    <i class="fa fa-building" style="font-size:100px;"></i>
                </a>
                </div>  
               

               <div class="col-md-6">
                <a href="\templatekp\kpfakultas">
                    <strong>Kerja Praktik Fakultas</strong>
                    <br>
                    <br>
                    <i class="fa fa-university" style="font-size:100px;"></i> 
                </a>
                </div>
               
              </div>
              </center>
              </div></center><br><br>';
            }
            else if($_SESSION['last_statPengajuan']=="ACCEPT" && strcmp($last_registration, "NONE")==0)
            {
              echo '<br><br>
              <header class="section-header">
          <h3>REGISTRASI</h3>
        </header>
        <center>
              <div id="surat-keterangan">
                  <div>
                    <strong>Download Surat Pengantar:  <a href="download.php" target="_blank"><button class="btn"><i class="fa fa-download"></i> Download</button></a></strong>
                  </div>
                </div>
                <p class="surat-desc">Apabila sudah melakukan proses penerimaan KP di perusahaan dan telah mendapat Surat keterangan diterima,</p>
              <p class="surat-desc">Surat tersebut dapat diupload pada form di bawah ini.</p>
              <div class="surat">
                <div>
                  <pre>Upload Surat Keterangan (Hasil seleksi perusahaan):</pre>
                  <pre><form action="upload.php" method="post" enctype="multipart/form-data"><input name="file_sk" type="file" accept="application/pdf" required><input name="submit" class="upload-btn-wrapper"type="submit" value="Upload"></pre>
                </div>
              </div></center>';
            }
          ?>
      </div>
    </section>
    <br>
    <br>
<!-- 
==================================
    DOWNLOAD
================================== -->
<section id="download">
      <div class="container">
        <header class="section-header">
          <h3>Download</h3>
        </header>
        <div id="cpanel">
          <table>
            <thead>
              <th>No</th>
              <th>Nama Berkas</th>
              <th>Deskripsi Berkas</th>
            </thead>
            <?php
              include('koneksi.php');
              $sql = "SELECT id_file, file, file_desc, link, lokasi FROM storage";
              $res = $conn->query($sql);
              $numb=1;
              while($row = $res->fetch_assoc())
              {
                echo '<tr>';
                echo '<td>'.$numb.'</td>';
                if($row['link']!=null)
                {
                  $link = $row['link'];
                  echo '<td><a href="'.$link.'" target="_blank" style="color: #000000;">'.$row['file'].'</a></td>';
                }
                else {$link = $row['lokasi'];
                echo '<td><a href="koordinator/'.$link.'" target="_blank" style="color: #000000;">'.$row['file'].'</a></td>';
                }
                echo '<td>'.$row['file_desc'].'</td>';
                echo '</tr>';
                $numb++;
              }
            ?>
            </table>
      </div>
    </div>
    </section>
<?php
  }
  ?>


  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>KaPeTI</h3>
            <p>Merupakan...</p>
          </div>


          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontak</h4>
            <p>
              Laurentius Kuncoro <br>
              Koordinator KP<br>
              Fakultas Informatika Universitas Kristen Duta Wacana<br>
              <strong>Nomor Handphone:</strong> ... <br>
              <strong>Email:</strong> ... <br>
            </p>

          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; <strong>2016 Informatika UKDW</strong>
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

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
