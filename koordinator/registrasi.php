<?php
  include('header.php');
?>
<body>

<?php
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kpukdw');
$searchlamaran = "";
  ?>
<div class="container">
  <br>
  <br>
  <div class="divider" id="section1"></div>
  <div class = 'row'>

<?php





// find out how many rows are in the table 
$sql = mysql_query("SELECT count(*) FROM lamaran, perusahaan where lamaran.id_perusahaan = perusahaan.id_perusahaan AND lamaran.status_registrasi = 'PENDING' order by lamaran.tanggal_input");
$r = mysql_fetch_row($sql);
$numrows = $r[0];

if($numrows==0){
  echo '   <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tidak Ada Daftar Konfirmasi Lamaran
                        </div>
                        </div>
                        </div>';
}
else{
// get the info from the db 
$result = mysql_query("SELECT * FROM lamaran, perusahaan where lamaran.id_perusahaan = perusahaan.id_perusahaan AND lamaran.status_registrasi = 'PENDING' order by lamaran.tanggal_input");
$no =1;
?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Daftar Konfirmasi Mahasiswa Registrasi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nim</th>
                                            <th>Nama</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        // while there are rows to be fetched...
                                        while($data = mysql_fetch_array($result)){
                                          ?>
                                            <tr>
                                              <td><font face=tahoma size=2><?php echo $no;?></font></td>
                                              <td><font face=tahoma size=2><?php echo $data['nim']; ?></font></td>
                                              <td><font face=tahoma size=2><?php echo $data['nama']; ?></font></td>
                                              <td><font face=tahoma size=2><?php echo $data['nama_perusahaan']; ?></font></td>
                                              <?php 
                                              echo "<td><a href='tanggapan2.php?id=".$data['id_lamaran']."'><button>Rincian</button></a></td></font></td>";

                                          ?>
                                        </tr>
                                        <?php
                                          $no++;    
                                        }// end while
                                      ?>

                                              
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->

<?php
}
?>
  
</div>
</div><!--/row-->
<?php
$sqllist = "SELECT * FROM lamaran, perusahaan, mahasiswa where lamaran.id_perusahaan = perusahaan.id_perusahaan AND lamaran.status_registrasi = 'ACCEPT' AND status_kp='NONE' AND lamaran.nim = mahasiswa.nim order by lamaran.tanggal_input";
$resultlist = mysql_query($sqllist);
$countrow = mysql_num_rows($resultlist);

if($countrow==0){
  echo '   <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tidak Ada Daftar Registrasi
                        </div>
                        </div>
                        </div>';
}
else{
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Daftar Lamaran
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Dosen Pembimbing</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $numb = 1;
                                        
                                        while($rowlist = mysql_fetch_array($resultlist))
                                        {
                                            $nim=$rowlist["nim"];
                                            $sqldosen = "SELECT * FROM mahasiswa, dosen where dosen.dosen_pembimbing = mahasiswa.dosen_pembimbing AND mahasiswa.nim='$nim'";
                                            $resultdosen = mysql_query($sqldosen);
                                            $rowdosen = mysql_fetch_array($resultdosen);
                                            echo '<tr>
                                        <td>'.$numb.'</td>
                                        <td>'.$rowlist["nim"].'</td>
                                        <td>'.$rowlist["nama"].'</td>
                                        <td>'.$rowlist["nama_perusahaan"].'</td>
                                        <td>'.$rowdosen["nama"].'</td>
                                        <td style="background-color: #2ecc71; color: white">'.$rowlist["status_registrasi"].'</td>
                                        <td><a href="tanggapan2.php?id='.$rowlist["id_lamaran"].'">Rincian</a></td>
                                      </tr>';
                       
                                        $numb++;
                                        }
                                       
                                    ?>
                                        
                                              
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->

  <?php
    }
  ?>

</div>
<br>
<br>
<br>
<br>
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

   <!-- JQUERY SCRIPTS -->
    <script src="js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->

    <!-- METISMENU SCRIPTS -->

     <!-- DATA TABLE SCRIPTS -->
    <script src="js/dataTables/jquery.dataTables.js"></script>
    <script src="js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>

</body>




























