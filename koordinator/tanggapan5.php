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
<div class="wrap-contact100">
<div id="download">
    <span class="contact100-form-title">
          Detail Mahasiswa
        </span>
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
<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Harap masukkan deskripsi pekerjaan">
          <span class="label-input100">DESKRIPSI PEKERJAAN</span>
          <textarea class="input100" placeholder="Isi deskripsi..." rows="4" cols="40" value="<?php echo ($query2['job_desc']); ?>"></textarea>
        </div>
        <?php

        if($tipe=="C"){
            ?>
            <div class="wrap-input100 validate-input bg0">
            <span class="label-input100">Deskripsi Diri :              </span>
            <textarea class="input100" rows="4" cols="40" disabled><?php echo ($query2['desc_diri']); ?></textarea>
        </div>
        <div class="wrap-input100 validate-input bg0">
            <span class="label-input100">Keahlian :                    </span>
            <textarea class="input100" rows="4" cols="40" disabled><?php echo ($query2['keahlian']); ?></textarea>
        </div>
        <div class="wrap-input100 validate-input bg0">
            <span class="label-input100">Mini Project :                </span>
            <textarea class="input100" rows="4" cols="40" disabled><?php echo ($query2['mini_project']); ?></textarea>
        </div>
        <?php
    }

    ?>
    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Surat Keterangan </span>
    <input class="input100" type="text" name="surat_keterangan" value="<?php echo $query2['surat_keterangan']; ?>" disabled>
</div>
<div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Status Pengajuan </span>
    <input class="input100" type="text" name="nim" value="<?php echo $query2['status_pengajuan']; ?>" disabled>
</div>
<div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Status Registrasi </span>
    <input class="input100" type="text" name="nim" value="<?php echo $query2['status_registrasi']; ?>" disabled>
</div>
<div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Status KP </span>
    <input class="input100" type="text" name="nim" value="<?php echo $query2['status_kp']; ?>" disabled>
</div>
</div>
</div>

</div>
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

<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <script>
    $(".js-select2").each(function(){
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });


      $(".js-select2").each(function(){
        $(this).on('select2:close', function (e){
          if($(this).val() == "Please chooses") {
            $('.js-show-service').slideUp();
          }
          else {
            $('.js-show-service').slideUp();
            $('.js-show-service').slideDown();
          }
        });
      });
    })
  </script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="vendor/noui/nouislider.min.js"></script>
  <script>
      var filterBar = document.getElementById('filter-bar');

      noUiSlider.create(filterBar, {
          start: [ 1500, 3900 ],
          connect: true,
          range: {
              'min': 1500,
              'max': 7500
          }
      });

      var skipValues = [
      document.getElementById('value-lower'),
      document.getElementById('value-upper')
      ];

      filterBar.noUiSlider.on('update', function( values, handle ) {
          skipValues[handle].innerHTML = Math.round(values[handle]);
          $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
          $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
      });
  </script>
<!--===============================================================================================-->
  <script src="js/main2.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
    
<?php
}
?>
