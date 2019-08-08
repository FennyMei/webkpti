<?php
include('header.php');
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kpukdw');
    $searchlamaran = $_POST['searchlamaran']; 
     $no=1;
    $min_length = 3;
    echo '<div class="container"><div class="row">';  

  // hmmmm yg ini masih blm sempurna pencariannya

    // you can set minimum length of the searchlamaran if you want
     
    if(strlen($searchlamaran) >= $min_length){ // if searchlamaran length is more or equal minimum length then
         
        $searchlamaran = htmlspecialchars($searchlamaran); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $searchlamaran = mysql_real_escape_string($searchlamaran);
        // makes sure nobody uses SQL injection
         
         $raw_results = mysql_query("SELECT * FROM lamaran,perusahaan WHERE perusahaan.id_perusahaan = lamaran.id_perusahaan AND (perusahaan.nama_perusahaan LIKE '%".$searchlamaran."%' OR perusahaan.cp_perusahaan LIKE '%".$searchlamaran."%' OR perusahaan.telpon_perusahaan LIKE '%".$searchlamaran."%' OR lamaran.nim LIKE '%".$searchlamaran."%' OR lamaran.nama LIKE '%".$searchlamaran."%')") or die(mysql_error());
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$searchlamaran%' is what we're looking for, % means anything, for example if $searchlamaran is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$searchlamaran'
        // or if you want to match just full word so "gogohello" is out use '% $searchlamaran %' ...OR ... '$searchlamaran %' ... OR ... '% $searchlamaran'
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             echo '<div class="col-md-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
             <div class="panel-heading">
             TABEL DATA MAHASISWA
                                </div>
                                    <table class="table" id="dataTables-example">
                                    <thead>
  <tr>
    <th>Nomor</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Nama Perusahaan</th>
    <th>Nomor Telepon Perusahaan</th>
    <th>Contact Person Perusahaan</th>
    <th>Action</th>
 </tr>
  </thead>';           
                 while($data = mysql_fetch_array($raw_results)){
                          // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                           ?>
                <tr>
                    <td><font face=tahoma size=2><?php echo $no;?></font></td>
                    <td><font face=tahoma size=2><?php echo $data['nim']; ?></font></td>
                    <td><font face=tahoma size=2><?php echo $data['nama']; ?></font></td>
                    <td><font face=tahoma size=2><?php echo $data['nama_perusahaan']; ?></font></td>
                    <td><font face=tahoma size=2><?php echo $data['telpon_perusahaan']; ?></font></td>
                    <td><font face=tahoma size=2><?php echo $data['cp_perusahaan']; ?></font></td>
                    <?php 
                    if($data['status_pengajuan']=="PENDING")
                     echo "<td><a href='tanggapan.php?id=".$data['id_lamaran']."'><button>Rincian</button></a></td></font></td>";
                    else if($data['status_registrasi']=="PENDING")
                     echo "<td><a href='tanggapan2.php?id=".$data['id_lamaran']."'><button>Rincian</button></a></td></font></td>";
                    else if($data['status_registrasi']=="ACCEPT"){
                     if($data['status_kp']=="NONE")
                     echo "<td><a href='tanggapan3.php?id=".$data['id_lamaran']."'><button>Rincian</button></a></td></font></td>";
                      else
                        echo "<td><a href='tanggapan4.php?id=".$data['id_lamaran']."'><button>Rincian</button></a></td></font></td>";
                    }
                    else
                        echo "<td><a href='tanggapan5.php?id=".$data['id_lamaran']."'><button>Rincian</button></a></td></font></td>";


                    ?>
                    
                  </tr>
                <?php
                  $no++;    
                }
                echo "</table></div></div></div></div>";
              }
            }
             
        
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    
?>
</div>
</div>

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
