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
$spendaftarank = $_POST['spendaftarankp']; 
$spendaftarankp = strtotime($spendaftarank);
$spendaftarankps = date('Y-m-d', $spendaftarankp);
$ependaftarank = $_POST['ependaftarankp']; 
$ependaftarankp = strtotime($ependaftarank);
$ependaftarankps = date('Y-m-d', $ependaftarankp);
$sregistrasik = $_POST['sregistrasikp']; 
$sregistrasikp = strtotime($sregistrasik);
$sregistrasikps = date('Y-m-d', $sregistrasikp);
$eregistrasik = $_POST['eregistrasikp']; 
$eregistrasikp = strtotime($eregistrasik);
$eregistrasikps = date('Y-m-d', $eregistrasikp);
$sprosesk = $_POST['sproseskp']; 
$sproseskp = strtotime($sprosesk);
$sproseskps = date('Y-m-d', $sproseskp);
$eprosesk = $_POST['eproseskp']; 
$eproseskp = strtotime($eprosesk);
$eproseskps = date('Y-m-d', $eproseskp);
$smonitoringk = $_POST['smonitoringkp']; 
$smonitoringkp = strtotime($smonitoringk);
$smonitoringkps = date('Y-m-d', $smonitoringkp);
$emonitoringk = $_POST['emonitoringkp']; 
$emonitoringkp = strtotime($emonitoringk);
$emonitoringkps = date('Y-m-d', $emonitoringkp);
$sdafujiank = $_POST['sdafujiankp']; 
$sdafujiankp = strtotime($sdafujiank);
$sdafujiankps = date('Y-m-d', $sdafujiankp);
$edafujiank = $_POST['edafujiankp']; 
$edafujiankp = strtotime($edafujiank);
$edafujiankps = date('Y-m-d', $edafujiankp);
$sujiank = $_POST['sujiankp']; 
$sujiankp = strtotime($sujiank);
$sujiankps = date('Y-m-d', $sujiankp);
$eujiank = $_POST['eujiankp']; 
$eujiankp = strtotime($eujiank);
$eujiankps = date('Y-m-d', $eujiankp);
$semester = $_POST['semester'];
$year1 = $_POST['year1'];
$query3=mysql_query("update jadwal set semester='$semester', tahun='$year1', spendaftarankp='$spendaftarankps', ependaftarankp='$ependaftarankps',sregistrasikp='$sregistrasikps',eregistrasikp='$eregistrasikps', sproseskp='$sproseskps', eproseskp='$eproseskps', smonitoringkp='$smonitoringkps', emonitoringkp='$emonitoringkps', sdafujiankp='$sdafujiankps', edafujiankp='$edafujiankps',sujiankp='$sujiankps',eujiankp='$eujiankps' where id_jadwal='$id'");
if($query3)
{
header('location:jadwal.php');
}
else
{
 header('location:jadwal.php');   
}
}
$query1=mysql_query("select * from jadwal where id_jadwal='$id'");
$query2=mysql_fetch_array($query1);
  include('header.php');
?>
    
<div class="container-contact100">
    <div class="wrap-contact100">
     <form class="contact100-form validate-form" id="download"action="" method="post" enctype="multipart/form-data">
        <span class="contact100-form-title">
          Edit Jadwal
        </span>

        <div class="wrap-input100 validate-input bg1">
          <span class="label-input100">SEMESTER</span>
          <div>
            <?php
                echo '
                <select class="js-select2" name="semester">
                <option value="Ganjil"'; 
                if ($query2['semester'] == 'Ganjil') { echo '
                selected'; } echo '>Ganjil</option>
                <option value="Genap"'; if ($query2['semester'] == 'Genap') { echo '
                selected'; } echo ">Genap</option>
                
                <br><br>
                ";
                ?>
                </select>
            <div class="dropDownSelect2"></div>
          </div>
        </div>
        


        <div class="wrap-input100 validate-input bg1">
          <span class="label-input100">TAHUN AJARAN</span>
          <div>
            <select class="js-select2" id="year1" name="year1">
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
          <input type="date" name="spendaftarankp" value="<?php echo $query2['spendaftarankp']; ?>" required>
          <div class="dropDownSelect2"></div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">AKHIR PENDAFTARAN KP</span><br>
          <input type="date" name="ependaftarankp" value="<?php echo $query2['ependaftarankp'];?>" required>
          <div class="dropDownSelect2"></div>
        </div>


        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">MULAI REGISTRASI KP</span><br>
          <input type="date" name="sregistrasikp" value="<?php echo $query2['sregistrasikp'];?>" required>
          <div class="dropDownSelect2"></div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">AKHIR REGISTRASI KP</span><br>
          <input type="date" name="eregistrasikp" value="<?php echo $query2['eregistrasikp'];?>" required>
          <div class="dropDownSelect2"></div>
        </div> 

<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">MULAI PROSES KP</span><br>
          <input type="date" name="sproseskp" value="<?php echo $query2['sproseskp'];?>" required>
          <div class="dropDownSelect2"></div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">AKHIR PROSES KP</span><br>
          <input type="date" name="eproseskp" value="<?php echo $query2['eproseskp'];?>" required>
          <div class="dropDownSelect2"></div>
        </div> 

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">MULAI MONITORING KP</span><br>
          <input type="date" name="smonitoringkp" value="<?php echo $query2['smonitoringkp'];?>" required>
          <div class="dropDownSelect2"></div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">AKHIR MONITORING KP</span><br>
          <input type="date" name="emonitoringkp" value="<?php echo $query2['emonitoringkp'];?>" required>
          <div class="dropDownSelect2"></div>
        </div> 

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">MULAI DAFTAR UJIAN KP</span><br>
          <input type="date" name="sdafujiankp" value="<?php echo $query2['sdafujiankp'];?>" required>
          <div class="dropDownSelect2"></div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">AKHIR DAFTAR UJIAN KP</span><br>
          <input type="date" name="edafujiankp" value="<?php echo $query2['edafujiankp'];?>" required>
          <div class="dropDownSelect2"></div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">MULAI UJIAN KP</span><br>
          <input type="date" name="sujiankp" value="<?php echo $query2['sujiankp'];?>" required>
          <div class="dropDownSelect2"></div>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
          <span class="label-input100">AKHIR UJIAN KP</span><br>
          <input type="date" name="eujiankp" value="<?php echo $query2['eujiankp'];?>" required>
          <div class="dropDownSelect2"></div>
        </div>

        

          <input class="contact100-form-btn" type="submit" value="update" name="submit">

      </form>
      <?php
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
</body>