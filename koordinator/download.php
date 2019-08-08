<?php
  include('header.php');
?>
<body>
<?php
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kpukdw');

  ?>

<div class="container-contact100">
  <div class="wrap-contact100">
	<div class="divider" id="section1"></div>
	<div class="row">	
    <form class="contact100-form validate-form" id="download" action="upload.php" method="post" enctype="multipart/form-data">
      <span class="contact100-form-title">
          Upload
        </span>
    <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Harap masukkan nama berkas">
          <span class="label-input100">Nama Berkas : </span>
          <input class="input100" type="text" name="filename" placeholder="Isi nama berkas..." required>
        </div>
    <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Harap masukkan deskripsi berkas">
          <span class="label-input100">Deskripsi Berkas</span>
          <textarea class="input100" name="filedesc" rows="5" cols="40" placeholder="Isi deskripsi berkas..." required></textarea>
        </div>
    <br><br>
    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Pilih cara upload berkas : </span><br><br>
    <script>
    $(document).ready(function() {
    $('input:radio[name=uploadmethod]').click(function() {
        var checkval = $('input:radio[name=uploadmethod]:checked').val();
        $('#urllink').prop('disabled', !(checkval == 'url'));
        document.getElementById('urllink').value = "";
    });
});
    </script>
        <script>
    $(document).ready(function() {
    $('input:radio[name=uploadmethod]').click(function() {
        var checkval = $('input:radio[name=uploadmethod]:checked').val();
        $('#file').prop('disabled', !(checkval == 'uploadfile'));
        document.getElementById('file').value = "";
    });
});
    </script>
    <input type="radio" name="uploadmethod" value="url" checked>
    <span class="label-input100">Link :                 </span>
    <input style="width:300px;" type="text" name="fileurl" id="urllink" required>
    <br><br>
    <input type="radio" name="uploadmethod" value="uploadfile"><input type="file" name="file" accept="application/pdf" onchange="fileTypeValidation()" id="file">
    <br><br>
    </div>
    <input class="contact100-form-btn" type="submit" value="Upload" name="Upload">
  </form>	
  </div>
  </div>					
	</div><!--/row-->
<!--/container-->

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
    <script src="js/dataTables/jquery.dataTables.js"></script>
    <script src="js/dataTables/dataTables.bootstrap.js"></script>
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });

            function fileTypeValidation() {
                var fileType = document.getElementById('file').files[0].type;
                if (fileType === "application/pdf") {
                }
                else {
                document.getElementById('file').value = "";
                  alert("format file tidak valid!");
                  
                }
            }
    </script>

    <script>
function confirmHapus() {
    var confirmed = confirm("Apakah anda yakin ingin menghapus proses ini ?");
    return confirmed;
    
}
</script> 
</body>















