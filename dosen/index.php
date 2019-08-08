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
  
  
<?php
// get the info from the db 
$result = mysql_query("SELECT l.id_lamaran, l.nim, l.nama, p.nama_perusahaan, p.cp_perusahaan, p.telpon_perusahaan, l.job_desc, l.tipe, p.provinsi from mahasiswa m ,lamaran l, perusahaan p where p.id_perusahaan = l.id_perusahaan and m.dosen_pembimbing = '$asd' and m.nim = l.nim order by l.tanggal_input DESC");
$no =1;


  if(mysql_num_rows($result)>0){

  ?>

<div class="row">
                <div class="col-md-18">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <span class="contact100-form-title">
                          Daftar Mahasiswa Bimbingan
                        </span>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Provinsi Perusahaan</th>
                                            <th>Kontak Perusahaan</th>
                                            <th>Nomor Telepon Perusahaan</th>
                                            <th>Deskripsi Pekerjaan</th>
                                            <th>Tipe KP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                      <?php
                                      while($data = mysql_fetch_array($result)){
                                        ?>
                                          
                                        <tr>
                                          <td><?php echo $no;?></td>
                                          <td><?php echo $data['nim']."<br><br><a href='profilemahasiswa.php?id=".$data['id_lamaran']."'><strong>(Lihat Profil Mahasiswa)</strong></a>"; ?></td>
                                          <td><?php echo $data['nama']; ?></td>
                                          <td><?php echo $data['nama_perusahaan']; ?></td>
                                          <td><?php echo $data['provinsi']; ?></td>
                                          <td><?php echo $data['cp_perusahaan']; ?></td>
                                          <td><?php echo $data['telpon_perusahaan']; ?></td>
                                          <td><?php echo ($data['job_desc']); ?></td>
                                          <td><?php 
                                          if($data['tipe']=="A"){
                                          	echo "KP Reguler (".$data['tipe'].")";
                                          	}
                                          	else if($data['tipe']=="B"){
                                          		echo "KP Reguler (".$data['tipe'].")";
                                          	}
                                          	else if($data['tipe']=="C"){
                                          		echo "KP Fakultas (".$data['tipe'].")";
                                          	}
                                          	else if($data['tipe']=="D"){
                                          		echo "KP Pengabdian (".$data['tipe'].")";
                                          	}
                                          	else if($data['tipe']=="E"){
                                          		echo "KP Penelitian (".$data['tipe'].")";
                                          	}

                                          	 ?></td>
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
                          </div>
                        </div>

<?php
}

else{
  echo '   <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tidak Ada Daftar Bimbingan
                        </div>
                        </div>
                        </div>';
}
?>


</div><!--/container-->
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

</body>

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


