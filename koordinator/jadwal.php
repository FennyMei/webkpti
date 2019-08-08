<?php
  include('header.php');
?>
<body>

<?php
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kpukdw');
$tahun = $spendaftarankp = $ependaftarankp = $sregistrasikp = $eregistrasikp = $sproseskp = $eproseskp = $smonitoringkp = $emonitoringkp = $sdafujiankp = $edafujiankp = $sujiankp = $eujiankp = "";
  ?>

  <div class="row">
    <span class="contact100-form-title" style="margin-top: 25px;">
          Daftar Jadwal
        </span>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                              <?php
                                $sql = mysql_query("SELECT * FROM jadwal");
                                 if(mysql_num_rows($sql)>0){

                                  echo '
                                  
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Semester</th>
                                            <th>Tahun AJaran</th>
                                            <th>Mulai Pendaftaran KP</th>
                                            <th>Akhir Pendaftaran KP</th>
                                            <th>Mulai Registrasi KP</th>
                                            <th>Akhir Registrasi KP</th>
                                            <th>Mulai Proses KP</th>
                                            <th>Akhir Proses KP</th>
                                            <th>Mulai Monitoring KP</th>
                                            <th>Akhir Monitoring KP</th>
                                            <th>Mulai Daftar Ujian KP</th>
                                            <th>Akhir Daftar Ujian KP</th>
                                            <th>Mulai Ujian KP</th>
                                            <th>Akhir Ujian KP</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    
                                       ';

                                         $sql = mysql_query("SELECT * FROM jadwal order by id_jadwal");
                                            while($data = mysql_fetch_array($sql)){
  
                                        ?>
                                        <tbody>
                                        <tr>
                                          <td><font face=tahoma size=2><?php echo $data['semester']; ?></font></td>
                                          <td><font face=tahoma size=2><?php echo $data['tahun']; ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['spendaftarankp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['ependaftarankp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['sregistrasikp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['eregistrasikp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['sproseskp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['eproseskp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['smonitoringkp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['emonitoringkp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['sdafujiankp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['edafujiankp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['sujiankp'])); ?></font></td>
                                          <td><font face=tahoma size=2><?php echo date('d F Y', strtotime($data['eujiankp'])); ?></font></td>
                                          <?php
                                          echo "<td><a href='editkegiatan.php?id=".$data['id_jadwal']."'class='btn btn-info'><button>Edit</button></a></td></font></td>";
                                          echo "<td><a href='deletekegiatan.php?id=".$data['id_jadwal']."'class='btn btn-danger' onclick='return confirmHapus()'><button>Hapus</button></a></td></font></td>";
                                          ?>
                                        </tr>


                                              
                                    </tbody>
                                    <?php
        
                                      }
                                      echo "</table>";
                                    }
                                    ?>

                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->


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