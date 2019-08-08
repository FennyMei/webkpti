<?php
include('header.php');
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kpukdw');
    $searchperusahaan = $_POST['searchperusahaan']; 
    // gets value sent over search form
     $no=1;
    $min_length = 3;
    echo '<div class="container"><div class="row">';  
    // you can set minimum length of the searchperusahaan if you want
     
    if(strlen($searchperusahaan) >= $min_length){ // if searchperusahaan length is more or equal minimum length then
         
        $searchperusahaan = htmlspecialchars($searchperusahaan); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $searchperusahaan = mysql_real_escape_string($searchperusahaan);
        // makes sure nobody uses SQL injection
         
         $raw_results = mysql_query("SELECT * FROM perusahaan WHERE (`nama_perusahaan` LIKE '%".$searchperusahaan."%') OR (`cp_perusahaan` LIKE '%".$searchperusahaan."%') OR (`telpon_perusahaan` LIKE '%".$searchperusahaan."%') OR (`alamat_perusahaan` LIKE '%".$searchperusahaan."%')") or die(mysql_error());
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$searchperusahaan%' is what we're looking for, % means anything, for example if $searchperusahaan is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$searchperusahaan'
        // or if you want to match just full word so "gogohello" is out use '% $searchperusahaan %' ...OR ... '$searchperusahaan %' ... OR ... '% $searchperusahaan'
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             echo ' <div class="col-md-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div class="panel-heading">
                                     TABEL PERUSAHAAN
                                </div>
                                    <table class="table" id="dataTables-example">
                                    <thead>
                                    <tr>
                                      <th>Nomor</th>
                                      <th>Nama Perusahaan</th>
                                      <th>Contact Person Perusahaan</th>
                                      <th>Nomor Telepon Perusahaan</th>
                                      <th>Alamat Perusahaan</th>
                                      <th>Status</th>
                                      <th>Aktif</th>
                                      <th>Blacklist</th>
                                      <th>Action</th>
                                    </tr>
                                    </thead>';
            while($data = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             ?>
                <tr>
      <td><font face=tahoma size=2><?php echo $no;?></font></td>
      <td><font face=tahoma size=2><?php echo $data['nama_perusahaan']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['cp_perusahaan']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['telpon_perusahaan']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['alamat_perusahaan']; ?></font></td>
      <td><font face=tahoma size=2><?php echo $data['status']; ?></font></td>
      <?php 
      
      echo "<td><a href='editperusahaan.php?id=".$data['id_perusahaan']."'><button>".$data['aktif']."</button></a></td></font></td>";
      echo "<td><a href='edit2perusahaan.php?id=".$data['id_perusahaan']."'><button>".$data['list']."</button></a></td></font></td>";
      echo "<td><a href='deleteperusahaan.php?id=".$data['id_perusahaan']."'><button>Hapus</button></a></td></font></td>";
      
      


      ?>
      
    </tr>
  <?php
    $no++;    
  }
  echo "</table></div></div></div></div>";
}
            }
             
        
        else{ // if there is no matching rows do following
            echo "TIDAK DITEMUKAN";
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