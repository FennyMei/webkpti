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

  <div class="divider" id="section1"></div>
  <?php

// find out how many rows are in the table 
$sql = mysql_query("SELECT count(dosen_pembimbing) from dosen");
$r = mysql_fetch_row($sql);
$numrows = $r[0];

if($numrows==0){
  echo '<div class="row">
                <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tidak Ada Daftar Dosen
                        </div>
                        </div>
                        </div>
                        </div>
                        ';
}
else{
?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <span class="contact100-form-title">
                                    Daftar Nama Dosen Informatika
                              </span>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">                                   
                                    <thead>
                                        <tr>
                                          <th>Nomor</th>
                                          <th>Email</th>
                                          <th>Nama Dosen</th>
                                          <th>Status</th>
                                          <th colspan="2">Pilihan</th>
                                        </tr>                                       
                                    </thead>
                                    <tbody>
                                      <?php
                                        // get the info from the db 
                                        $result = mysql_query("SELECT * from dosen");
                                        $no =1;
                                        // while there are rows to be fetched...
                                        while($data = mysql_fetch_array($result)){
                                          ?>
                                            
                                          <tr>
                                            <td><font face=roboto size=2><?php echo $no;?></font></td>
                                            <td><font face=roboto size=2><?php echo $data['dosen_pembimbing']; ?></font></td>
                                            <td><font face=roboto size=2><?php echo $data['nama']; ?></font></td>
                                            <td><font face=roboto size=2><?php echo $data['status']; ?></font></td>
                                            <?php
                                            if($data['status']=="KOORDINATOR"){
                                              $sqlcekkoor = mysql_query("SELECT * from dosen where status='KOORDINATOR'");
                                              $datakoor = mysql_num_rows($sqlcekkoor);
                                                if($datakoor==1){
                                                  echo '<td><a href="" class="btn btn-danger " onclick="return confirmDanger()">Hapus</a></td>';
                                                }
                                                else{
                                                  echo '<td><a href="deletedosen.php?dosen_pembimbing='.$data['dosen_pembimbing'].'" class="btn btn-danger " onclick="return confirmHarm()">Hapus</a></td>';
                                                }
                                            }
                                            else{
                                              echo '<td><a href="deletedosen.php?dosen_pembimbing='.$data['dosen_pembimbing'].'" class="btn btn-danger " onclick="return confirmHapus()">Hapus</a></td>';
                                            }
                                            ?>
                                            <?php
                                          echo "<td><a href='editdosen.php?id=".$data['dosen_pembimbing']."'class='btn btn-info'><button>Edit</button></a></td></font></td>";
                                          
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
  <script src="js/jquery-1.10.2.js"></script>
   <!-- DATA TABLE SCRIPTS -->
  <script src="js/dataTables/jquery.dataTables.js"></script>
  <script src="js/dataTables/dataTables.bootstrap.js"></script>

  <!-- JavaScript Libraries -->
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

      <script>
          $(document).ready(function () {
              $('#dataTables-example').dataTable();
          });
  </script>
  <script>
function confirmHapus() {
    var confirmed = confirm("Apakah anda yakin ingin menghapus daftar dosen ini ?");
    return confirmed;
}
function confirmDanger() {
    var confirmed = confirm("Anda tidak dapat menghapus koordinator ini!");
    return confirmed;
}
function confirmHarm() {
    var confirmed = confirm("Apakah anda yakin ingin menghapus daftar koordinator ini ?");
    return confirmed;
}
</script>
</body>

