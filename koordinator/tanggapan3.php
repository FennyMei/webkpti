<?php
  include('header.php');
?>
<body>

<?php
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
if(isset($_GET['id']))
{
$id=$_GET['id'];

$query1=mysql_query("select * from lamaran, perusahaan where id_lamaran='$id' and perusahaan.id_perusahaan = lamaran.id_perusahaan");
$query2=mysql_fetch_array($query1);
  $tipe = $query2['tipe'];
?>

<div class="container-contact100">
<div class = "wrap-contact100">
  <span class="contact100-form-title">
          Rincian
        </span>
<div id="download">

    <div class="wrap-input100 validate-input bg1">
          <span class="label-input100">NIM</span>
          <input class="input100" type="text" name="nim" value="<?php echo $query2['nim']; ?>" disabled>
        </div>

        <div class="wrap-input100 validate-input bg1">
          <span class="label-input100">Nama</span> 
          <input class="input100" type="text" name="nim" value="<?php echo $query2['nama']; ?>" disabled>
        </div>
    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Nama Perusahaan</span>
    <input class="input100" type="text" name="nim" value="<?php echo $query2['nama_perusahaan']; ?>" disabled>
    </div>
    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Contact Person Perusahaan</span>
    <input class="input100" type="text" name="nim" value="<?php echo $query2['cp_perusahaan']; ?>" disabled>
    </div>
    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Alamat Perusahaan</span>
    <input class="input100" type="text" name="nim" value="<?php echo $query2['alamat_perusahaan']; ?>" disabled>
    </div>
    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Nomor Telepon Perusahaan</span>
    <input class="input100" type="text" name="nim" value="<?php echo $query2['telpon_perusahaan']; ?>" disabled>
    </div>
    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Tipe</span>
    <input class="input100" type="text" name="nim" value="<?php echo $query2['tipe']; ?>" disabled>
    </div>
    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">SKS</span>
    <input class="input100" type="text" name="nim" value="<?php echo $query2['sks']; ?>" disabled>
    </div>
    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Deskripsi Pekerjaan</span>
    <textarea class="input100" rows="4" cols="40" disabled><?php echo ($query2['job_desc']); ?></textarea>
    </div>
    <?php

        if($tipe=="C"){
            ?>
            <div class="wrap-input100 validate-input bg1">
            <span class="label-input100">Deskripsi Diri :              </span>
            <textarea class="input100" rows="4" cols="40" disabled><?php echo ($query2['desc_diri']); ?></textarea>
        </div>
            <div class="wrap-input100 validate-input bg1">
            <span class="label-input100">Keahlian :                    </span>
            <textarea class="input100" rows="4" cols="40" disabled><?php echo ($query2['keahlian']); ?></textarea>
        </div>
            <div class="wrap-input100 validate-input bg1">
            <span class="label-input100">Mini Project :                </span>
            <textarea class="input100" rows="4" cols="40" disabled><?php echo ($query2['mini_project']); ?></textarea>
        </div>
            <br><br>
        <?php
    }

    ?>
    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Surat Keterangan</span>
    <input class="input100" type="text" name="surat_keterangan" value="<?php echo $query2['surat_keterangan']; ?>" disabled>
    </div>
    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Status KP</span>
    <input class="input100" type="text" name="nim" value="<?php echo "Sedang KP"; ?>" disabled>
    </div>

    <?php
    $tglmulai=$query2['startdate'];
      switch(substr($tglmulai,0,2))
                  {
                    case "01": $monthcaption = "Januari"; break;
                    case "02": $monthcaption = "Februari"; break;
                    case "03": $monthcaption = "Maret"; break;
                    case "04": $monthcaption = "April"; break;
                    case "05": $monthcaption = "Mei"; break;
                    case "06": $monthcaption = "Juni"; break;
                    case "07": $monthcaption = "Juli"; break;
                    case "08": $monthcaption = "Agustus"; break;
                    case "09": $monthcaption = "September"; break;
                    case "10": $monthcaption = "Oktober"; break;
                    case "11": $monthcaption = "November"; break;
                    case "12": $monthcaption = "Desember"; break;
                  }
    $thnmulai=substr($tglmulai,2,4);
    ?>
    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Tanggal Mulai Kerja Praktik</span>
    <input class="input100" type="text" name="nim" value="<?php echo $monthcaption.' '.$thnmulai; ?>" disabled>
    </div>
     <?php
    $tglakhir=$query2['enddate'];
      switch(substr($tglakhir,0,2))
                  {
                    case "01": $monthcaption = "Januari"; break;
                    case "02": $monthcaption = "Februari"; break;
                    case "03": $monthcaption = "Maret"; break;
                    case "04": $monthcaption = "April"; break;
                    case "05": $monthcaption = "Mei"; break;
                    case "06": $monthcaption = "Juni"; break;
                    case "07": $monthcaption = "Juli"; break;
                    case "08": $monthcaption = "Agustus"; break;
                    case "09": $monthcaption = "September"; break;
                    case "10": $monthcaption = "Oktober"; break;
                    case "11": $monthcaption = "November"; break;
                    case "12": $monthcaption = "Desember"; break;
                  }
    $thnakhir=substr($tglakhir,2,4);
    ?>
    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Tanggal Akhir Kerja Praktik</span>
    <input class="input100" type="text" name="nim" value="<?php echo $monthcaption.' '.$thnakhir; ?>" disabled>
    </div>
    <br>
    <br>
    <center>
    <table>
        <th>
    <?php
    echo "<td><button class='contact100-form-btn'><a href='terimalamaran3.php?id=".$query2['id_lamaran']."'>Lulus</a></button></td>";
    echo "<td><button class='contact100-form-btn'><a href='tolaklamaran3.php?id=".$query2['id_lamaran']."'>Gugur</a></button></td>";
    ?>
  </th>
</table>
</center>
    <!-- ini hmmmmmm -->
    </div>
  </div>
  </div>

<?php
}
?>
</body>
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