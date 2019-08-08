<?php
  include('header.php');
?>
<body>

<?php
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kpukdw');
$tahun = $spendaftarankp = $ependaftarankp = $sregistrasikp = $eregistrasikp = $sproseskp = $eproseskp = $smonitoringkp = $emonitoringkp = $sdafujiankp = $edafujiankp = $sujiankp = $eujiankp = "";
  ?>



  <div class="container-contact100">
    <div class="wrap-contact100">
     <form class="contact100-form validate-form" id="download"action="inskeg.php" method="post" enctype="multipart/form-data">
        <span class="contact100-form-title">
          Jadwal
        </span>

        <div class="wrap-input100 validate-input bg1">
          <span class="label-input100">SEMESTER</span>
          <div>
            <select class="js-select2" name="semester">
              <option value = "Ganjil">Ganjil</option>
    <option value = "Genap">Genap</option>
            </select>
            <div class="dropDownSelect2"></div>
          </div>
        </div>


        <div class="wrap-input100 validate-input bg1">
          <span class="label-input100">TAHUN AJARAN</span>
          <div>
            <select class="js-select2" name="year1">
    <?PHP
    $thn = date('Y')+2;
    $i = date('Y')-2;
    while($i <= $thn)
    {
        $th_ajaran = $i + 1;
        $th_ajaran = $i . "/" . $th_ajaran;
        if($query2['tahun'] == $th_ajaran)
            { 
            echo '<option value="'.$th_ajaran .'" selected>'.$th_ajaran .'</option>';
            }
        else
            {
            echo '<option value="'.$th_ajaran .'">'.$th_ajaran .'</option>';
            }
        $i++;
    }
    ?>
            </select>
            <div class="dropDownSelect2"></div>
          </div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">MULAI PENDAFTARAN KP</span><br>
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input style="font-size:18px;color:#000" type="date" name="spendaftarankp" value="<?php echo $spendaftarankp;?>" required>
          <div class="dropDownSelect2"></div>
        </div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">AKHIR PENDAFTARAN KP</span><br>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input style="font-size:18px;color:#000" type="date" name="ependaftarankp" value="<?php echo $ependaftarankp;?>" required>
            <div class="dropDownSelect2"></div>
        </div>
        </div>


        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">MULAI REGISTRASI KP</span><br>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input style="font-size:18px;color:#000" type="date" name="sregistrasikp" value="<?php echo $sregistrasikp;?>" required>
          <div class="dropDownSelect2"></div>
        </div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">AKHIR REGISTRASI KP</span><br>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input style="font-size:18px;color:#000" type="date" name="eregistrasikp" value="<?php echo $eregistrasikp;?>" required>
          <div class="dropDownSelect2"></div>
        </div>
        </div> 

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">MULAI PROSES KP</span><br>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input style="font-size:18px;color:#000" type="date" name="sproseskp" value="<?php echo $sproseskp;?>" required>
          <div class="dropDownSelect2"></div>
        </div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">AKHIR PROSES KP</span><br>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input style="font-size:18px;color:#000" type="date" name="eproseskp" value="<?php echo $eproseskp;?>" required>
          <div class="dropDownSelect2"></div>
        </div>
        </div> 

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">MULAI MONITORING KP</span><br>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input style="font-size:18px;color:#000" type="date" name="smonitoringkp" value="<?php echo $smonitoringkp;?>" required>
          <div class="dropDownSelect2"></div>
        </div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">AKHIR MONITORING KP</span><br>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input style="font-size:18px;color:#000" type="date" name="emonitoringkp" value="<?php echo $emonitoringkp;?>" required>
          <div class="dropDownSelect2"></div>
        </div>
        </div> 

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">MULAI DAFTAR UJIAN KP</span><br>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input style="font-size:18px;color:#000" type="date" name="sdafujiankp" value="<?php echo $sdafujiankp;?>" required>
          <div class="dropDownSelect2"></div>
        </div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">AKHIR DAFTAR UJIAN KP</span><br>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input  style="font-size:18px;color:#000" type="date" name="edafujiankp" value="<?php echo $edafujiankp;?>" required>
          <div class="dropDownSelect2"></div>
        </div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">MULAI UJIAN KP</span><br>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input style="font-size:18px;color:#000" type="date" name="sujiankp" value="<?php echo $sujiankp;?>" required>
          <div class="dropDownSelect2"></div>
        </div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">AKHIR UJIAN KP</span><br>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input style="font-size:18px;color:#000" type="date" name="eujiankp" value="<?php echo $eujiankp;?>" required>
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
    var confirmed = confirm("Apakah anda yakin ingin menghapus proses ini ?");
    return confirmed;
    
}
</script>

</body>