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
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


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
  <meta name="google-signin-client_id" content="650232885328-e6gsbsa4vgi5gv0nbv87ntjgiar9cfaq.apps.googleusercontent.com">  <!-- fenny 59784609767-8iu2va81681hpvrolae10bds22dora30.apps.googleusercontent.com -->
                                                                                                                                  <!-- localhost 650232885328-e6gsbsa4vgi5gv0nbv87ntjgiar9cfaq.apps.googleusercontent.com -->
  <link rel="stylesheet" type="text/css" href="status/index.css">
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <a href="#intro" class="scrollto"><img src="img/intro-carousel/fti-logo.png" style="width: 18%; height: 75px; margin-left: -15px; margin-top: -25px;"/></a>

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
          <!-- <a href="#intro">Home</a></li> -->
            <li class="menu-has-children ">
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

          <!-- <div class="carousel-item active" style="">
            <div class="carousel-container">
              <div class="carousel-content">
                <div id="logo" class="pull-left">
                  <a href="#intro" class="scrollto"><img src="img/intro-carousel/fti-logo.png" style="width: 100%; height: 100%;"/></a>

                </div>
              </div>
            </div>
          </div> -->

        </div>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->

    


    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container wow fadeInUp">
        <header class="section-header">
          <h3>Pengumuman</h3>
          <p>Tanggal penting yang berhubungan dengan Pelaksanaan Kerja Praktik Prodi Informatika</p>
        </header>
        <div class="row about-cols">
              <?php
              $sqllist = "SELECT * FROM jadwal";
              $resultlist = mysqli_query($conn,$sqllist);
              if(mysqli_num_rows($resultlist) > 0)
               {
              ?>
                                <table class="table">
                                    <tbody>                                      
                                        <?php
                                         $query = "SELECT * FROM jadwal";
                                          $sql = mysqli_query($conn,$sqllist);
                                          while($data = mysqli_fetch_array($sql)){
                                        ?>
                                        <tr>
                                          <td><div style=text-align:left>Semester</div></td>
                                          <td><div style=text-align:right><?php echo $data['semester']; ?></div></td>
                                        </tr>

                                        <tr>
                                          <td><div style=text-align:left>Tahun Ajaran</div></td>
                                          <td><div style=text-align:right><?php echo $data['tahun']; ?></div></td>
                                        </tr>

                                        <tr>
                                          <td><div style=text-align:left>Mulai Pendaftaran KP</div></td>
                                          <td><div style=text-align:right><?php echo date('d F Y', strtotime($data['spendaftarankp'])); ?></div></td>
                                        </tr>

                                        <tr>
                                          <td><div style=text-align:left>Akhir Pendaftaran KP</div></td>
                                          <td><div style=text-align:right><?php echo date('d F Y', strtotime($data['ependaftarankp'])); ?></div></td>
                                        </tr>

                                        <tr>
                                          <td><div style=text-align:left>Mulai Registrasi KP</div></td>
                                          <td><div style=text-align:right><?php echo date('d F Y', strtotime($data['sregistrasikp'])); ?></div></td>
                                        </tr>

                                        <tr>
                                          <td><div style=text-align:left>Akhir Registrasi KP</div></td>
                                          <td><div style=text-align:right><?php echo date('d F Y', strtotime($data['eregistrasikp'])); ?></div></td>
                                        </tr>

                                        <tr>
                                          <td><div style=text-align:left>Mulai Proses KP</div></td> 
                                          <td><div style=text-align:right><?php echo date('d F Y', strtotime($data['sproseskp'])); ?></div></td>
                                        </tr>

                                        <tr>
                                          <td><div style=text-align:left>Akhir Proses KP</div></td>
                                          <td><div style=text-align:right><?php echo date('d F Y', strtotime($data['eproseskp'])); ?></div></td>
                                        </tr>

                                        <tr>
                                          <td><div style=text-align:left>Mulai Monitoring KP</div></td>
                                          <td><div style=text-align:right><?php echo date('d F Y', strtotime($data['smonitoringkp'])); ?></div></td>
                                        </tr>

                                        <tr>
                                          <td><div style=text-align:left>Akhir Monitoring KP</div></td>
                                          <td><div style=text-align:right><?php echo date('d F Y', strtotime($data['emonitoringkp'])); ?></div></td>
                                        </tr>

                                        <tr>
                                          <td><div style=text-align:left>Mulai Daftar Ujian KP</div></td>
                                          <td><div style=text-align:right><?php echo date('d F Y', strtotime($data['sdafujiankp'])); ?></div></td>
                                        </tr>

                                        <tr>
                                          <td><div style=text-align:left>Akhir Daftar Ujian KP</div></td>
                                          <td><div style=text-align:right><?php echo date('d F Y', strtotime($data['edafujiankp'])); ?></div></td>
                                        </tr>

                                        <tr>
                                          <td><div style=text-align:left>Mulai Ujian KP</div></td>
                                          <td><div style=text-align:right><?php echo date('d F Y', strtotime($data['sujiankp'])); ?></div></td>
                                        </tr>

                                        <tr>
                                          <td><div style=text-align:left>Akhir Ujian KP</div></td>
                                          <td><div style=text-align:right><?php echo date('d F Y', strtotime($data['eujiankp'])); ?></div></td>
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
    </section><!-- #about -->
    <br>
    <br>
    <?php
    if(isset($_SESSION['id'])){
    ?>
    <section id="pengajuanKp">
      <div class="container wow fadeInUp">
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
              echo '<div class="container text-center">
      <div class="row" style="margin-top: 20px;">
        <div class="col-sm-14">
        <div class="row">
             
        <div class="col-md-4 wow bounceInUp">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title"><strong>KP A (Reguler)</strong></h4>
            <p class="card-text">Mahasiswa mengajukan perusahaan yang telah bekerjasama dengan FTI (melakukan proses registrasi)</p>
          </div>
          <div class="card-footer">
            <a href="kpreguler/index.php?tipe=a" class="btn btn-primary">Pilih</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 wow bounceInUp">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title"><strong>KP B (Reguler)</strong></h4>
            <p class="card-text">Mahasiswa mengajukan perusahaan dengan mengisi kelengkapan data perusahaan yang diinginkan (melakukan proses registrasi)</p>
          </div>
          <div class="card-footer">
            <a href="kpreguler/index.php?tipe=b" class="btn btn-primary">Pilih</a>
          </div>
        </div>
      </div>

        <div class="col-md-4 wow bounceInUp">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title"><strong>KP C (Fakultas)</strong></h4>
            <p class="card-text">Mahasiswa mengajukan perusahaan yang telah bekerjasama dengan FTI (tanpa melakukan proses registrasi)</p>
          </div>
          <div class="card-footer">
            <a href="kpfakultas/index.php?tipe=c" class="btn btn-primary">Pilih</a>
          </div>
        </div>
      </div>

  </div>
</div>
    </div>


    </div>
    </div>
              <br><br>';
            }
            else if($_SESSION['last_statPengajuan']=="ACCEPT" && strcmp($last_registration, "NONE")==0)
            {
              echo '<br><br>
              <header class="section-header">
          <h3>REGISTRASI</h3>
        </header>
        <center>
              <div id="surat">
                  <div>
                    <p>Langkah-langkah untuk melakukan registrasi : </p>
                    <p>1. Download Surat Pengantar <a href="download.php" target="_blank"><button class="btn"><i class="fa fa-download"></i>Disini</button></a></p>
                    <p>2. Apabila data pada Surat Pengantar tersebut sudah benar, cetak Surat Pengantar.</p>
                    <p>3. Isi tanda tangan Anda dan Koordinator KP dibagian yang sudah tersedia.</p>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                    <p>4. Lampirkan Surat Pengantar dengan format .pdf <input name="file_sk" type="file" accept="application/pdf" required></p>
                    <p>5. Setelah itu <input name="submit" class="upload-btn-wrapper" type="submit" value="Upload"></p>
                    </form>
                  </div>
                </div>
               </center>';
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
      <div class="container wow fadeInUp">
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

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>KaPeTI</h3>
            <p>Sistem informasi kerja praktik di Prodi Informatika Universitas Kristen Duta Wacana.</p>
            <p>Sistem ini sebagai sarana mahasiswa, dosen dan koordinator untuk memperoleh informasi, mengelola data (Koordinator) dan melakukan pengajuan kerja praktik (Mahasiswa).</p>
          </div>


          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Kontak</h3>
            <p>
              Laurentius Kuncoro Probo Saputra., S.T., M.Eng<br>
              Koordinator Kerja Praktik Informatika<br>
              Email :<strong> kuncoro@staff.ukdw.ac.id</strong><br>
              Ext (Admin FTI) :<strong> 322</strong><br>
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
