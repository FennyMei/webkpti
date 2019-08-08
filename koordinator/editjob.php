<?php
  include('header.php');
?>
<body>
<?php
// $query=mysql_connect("localhost","fenny","cYWmFpr7rESR");
// mysql_select_db("fenny",$query);
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
if(isset($_GET['id']))
{
$id=$_GET['id'];
if(isset($_POST['submit']))
{
$id_perusahaan=$_POST['id_perusahaan'];
$job_desc=$_POST['job_desc'];
$divisi=$_POST['divisi'];
$query3=mysql_query("update joblist set id_perusahaan='$id_perusahaan', divisi='$divisi' , job_desc='$job_desc' where id_job='$id'");
if($query3)
{
header('location:joblist.php');
}
}
$query1=mysql_query("select joblist.id_job, joblist.id_perusahaan, joblist.divisi , joblist.job_desc, perusahaan.nama_perusahaan from joblist,perusahaan where id_job='$id' and joblist.id_perusahaan = perusahaan.id_perusahaan");
$query2=mysql_fetch_array($query1);
$ini = $query2['id_perusahaan'];
?>
<div class="container-contact100">
    <div class="divider" id="section1"></div>
    <div class="row">   
<form id="download" action="" method="post" enctype="multipart/form-data">
  <span class="label-input100">Nama Perusahaan</span> 
    <?php
    $sql = "SELECT id_perusahaan, nama_perusahaan FROM perusahaan  where aktif = 'Aktif' and list = 'Whitelist' and id_perusahaan != $ini";
    $result = mysql_query($sql);

    echo "<select style='width:300px;' name='id_perusahaan'>";
    echo "<option value='" . $query2['id_perusahaan'] ."' selected>" . $query2['nama_perusahaan'] ."</option>";
    while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['id_perusahaan'] ."'>" . $row['nama_perusahaan'] ."</option>";
    }
    echo "</select>";
    ?>
    <br><br>
    <span class="label-input100">Divisi</span>
                    <input class="input100" type="text" name="divisi" value="<?php echo $query2['divisi']; ?>" required>
    <span class="label-input100">Deskripsi Pekerjaan :           </span>
                    <textarea class="input100" placeholder="Isi deskripsi..." rows="5" cols="40"><?php echo ($query2['job_desc']); ?></textarea>
    <br><br>
    <input class="contact100-form-btn" type="submit" value="update" name="submit">
  </form>	
<?php
}
?>
</div><!--/container-->
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
</body>
