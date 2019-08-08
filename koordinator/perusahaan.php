<?php
  include('header.php');
?>
<body>

<?php
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kpukdw');
$nama_perusahaan = $cp_perusahaan = $searchperusahaan = $telpon_perusahaan = $id_perusahaan = $alamat_perusahaan = $status = "";
  ?>

 <div class="container-contact100">
  
    <div class="wrap-contact100"> 
        <br>
        <br>

     <form class="contact100-form validate-form" id="download" action="insper.php" method="post" enctype="multipart/form-data">
        <span class="contact100-form-title">
          Perusahaan
        </span>

        <div class="wrap-input100 validate-input bg1" data-validate="Harap masukkan nama perusahaan">
          <span class="label-input100">Nama Perusahaan</span>
          <input class="input100" type="text" name="nama_perusahaan" placeholder="Masukkan nama perusahaan" value="<?php echo $nama_perusahaan;?>" required>
        </div>

        <div class="wrap-input100 validate-input bg1" data-validate="Harap masukkan contact person perusahaan">
          <span class="label-input100">Contact Person Perusahaan</span>
          <input class="input100" type="text" name="cp_perusahaan" placeholder="Masukkan contact person perusahaan" value="<?php echo $cp_perusahaan;?>" required>
        </div>

        <div class="wrap-input100 validate-input bg1" data-validate="Harap masukkan nomor telepon perusahaan">
          <span class="label-input100">Nomor Telepon  Perusahaan</span>
          <input class="input100" type="text" name="telpon_perusahaan" placeholder="Masukkan nomor telepon perusahaan" value="<?php echo $telpon_perusahaan;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" minlength="10" maxlength="13" onKeyUp="if(this.value.substring(0,2) != '08'){this.value='08';}else if(this.value<0){this.value='0';}" required>
        </div>

        <div class="wrap-input100 validate-input bg1" data-validate="Harap masukkan alamat perusahaan">
          <span class="label-input100">Alamat  Perusahaan</span>
          <input class="input100" type="text" name="alamat_perusahaan" placeholder="Masukkan alamat perusahaan" value="<?php echo $alamat_perusahaan;?>" required>
        </div>

        <div class="wrap-input100 validate-input bg1" data-validate="Harap masukkan alamat perusahaan">
          <span class="label-input100">Provinsi  Perusahaan</span>
          <select class="js-select2" name="provinsi_perusahaan">
            
          <?php

            $result = mysql_query("SELECT * FROM inf_lokasi where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama");
            while($data = mysql_fetch_array($result)){
                echo "<option value='".$data['lokasi_nama']."'>".$data['lokasi_nama']."</option>";
            }
          ?>
          </select>
          <div class="dropDownSelect2"></div>
        </div>

        <div class="wrap-input100 validate-input bg1">
          <span class="label-input100">Tipe</span>
          <div>
            <select class="js-select2" name="status">
            <option value = "A">A</option>
            <option value = "C">C</option>
            <option value = "D">D</option>
            <option value = "E">E</option>
            </select>
            <div class="dropDownSelect2"></div>
          </div>
        </div>

          <input class="contact100-form-btn" type="submit" value="Ajukan" name="submit">

      </form>
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
<script>
function confirmHapus() {
    var confirmed = confirm("Apakah anda yakin ingin menghapus data ini ?");
    return confirmed;
    
}
</script> 
    <!-- JQUERY SCRIPTS -->
    <script src="js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
<script src="js/dataTables/jquery.dataTables.js"></script>
<script src="js/dataTables/dataTables.bootstrap.js"></script>
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
</body>








