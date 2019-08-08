<?php
  include('header.php');
?>
<body>

<?php
$id="";
$query=mysql_connect("localhost","root","");
mysql_select_db("kpukdw",$query);
if(isset($_GET['id']))
$id=$_GET['id'];
$query1=mysql_query("select * from lamaran, perusahaan where id_lamaran='$id' and (perusahaan.id_perusahaan = lamaran.id_perusahaan or perusahaan.id_perusahaan = lamaran.kpc1 or perusahaan.id_perusahaan = lamaran.kpc2)");
$query2=mysql_fetch_array($query1);
  $tipe = $query2['tipe'];

?>

<div class="container-contact100">
    <div class="wrap-contact100">

        <span class="contact100-form-title">
          Tanggapan
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
          <span class="label-input100">Nomor Telepon Mahasiswa (Langsung Terhubung ke Whatsapp)</span>
          <span><a href="https://api.whatsapp.com/send?phone=<?php echo $query2['no_kontak']; ?>">
                  <img src="img/whatsapp.png"></a></span> 
          <input class="input100" type="text" name="nim" value="<?php echo $query2['no_kontak']; ?>" disabled>
        </div>
        <?php
        echo "<form  action='terimalamaran.php?id=".$query2['id_lamaran']."' method='post' enctype='multipart/form-data'>";
            if($tipe=='C'){
                $query3=mysql_query("SELECT id_perusahaan, kpc1, kpc2, job_desc, kpc1_jd, kpc2_jd from lamaran where id_lamaran = '".$query2['id_lamaran']."'");
                $query4=mysql_fetch_assoc($query3);
            
                for($angka=1;$angka<=3;$angka++){
                    if($angka==1){
                        $id_perusahaan=$query4['id_perusahaan'];
                    }
                    else if($angka==2){
                        if($query4['kpc1']!=NULL) $id_perusahaan=$query4['kpc1'];
                        else break;
                    }
                    else if($angka==3){
                        if($query4['kpc2']!=NULL) $id_perusahaan=$query4['kpc2'];
                        else break;
                    }
                    $query5=mysql_query("SELECT nama_perusahaan, cp_perusahaan, alamat_perusahaan, telpon_perusahaan from perusahaan where id_perusahaan='$id_perusahaan'");
                    $query6=mysql_fetch_assoc($query5);

                    switch($angka)
                    {
                        case 1: $job_desc=$query4['job_desc']; break;
                        case 2: $job_desc=$query4['kpc1_jd']; break;
                        case 3: $job_desc=$query4['kpc2_jd']; break;
                    }
                    echo'<div style="background-color:#DCDCDC; margin-top:10px;margin-bottom:10px; display:inline-block" class="wrap-input100 validate-input bg1"><input type="radio" name="prioritas" value="'.$angka.'"><br>';
                    ?>
                    <input type="radio" value="none" name="prioritas" hidden default>
                    <span class="label-input100">Nama Perusahaan :             </span>
                    <input class="input100" type="text" name="nim" value="<?php echo $query6['nama_perusahaan']; ?>" disabled>
                    <br><br>
                    <span class="label-input100">Contact Person Perusahaan :   </span>
                    <input class="input100" type="text" name="nim" value="<?php echo $query6['cp_perusahaan']; ?>" disabled>
                    <br><br>
                    <span class="label-input100">Alamat Perusahaan :           </span>
                    <input class="input100" type="text" name="nim" value="<?php echo $query6['alamat_perusahaan']; ?>" disabled>
                    <br><br>
                    <span class="label-input100">Nomor Telepon Perusahaan :           </span>
                    <input class="input100" type="text" name="nim" value="<?php echo $query6['telpon_perusahaan']; ?>" disabled>
                    <br><br>
                    <span class="label-input100">Deskripsi Pekerjaan :           </span>
                    <textarea class="input100" rows="5" cols="40" disabled><?php echo $job_desc; ?></textarea>
                    
                    <br><br>
                  </div>
                    <?php
                }

            }

        ?>

    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Tipe :                        </span>
    <input class="input100" type="text" name="nim" value="<?php echo $query2['tipe']; ?>" disabled>
</div>
    <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">SKS :                         </span>
    <input class="input100" type="text" name="nim" value="<?php echo $query2['sks']; ?>" disabled>
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
    <span class="label-input100">Status Pengajuan :            </span>
    <input class="input100" type="text" name="nim" value="<?php echo $query2['status_pengajuan']; ?>" disabled>
</div>

<hr>
<div class="row">
           <div class="col-md-6 col-sm-12 col-xs-12">                     
            <div class="panel panel-default">
                <div class="panel-heading">
                    File Lampiran Transkrip Nilai
                </div>
                <div class="panel-body">
                <?php
                
                $fileTranskrip=$query2['transkrip_nilai'];

                if ($fileTranskrip==null) {
                    echo "<h4 class='text-center'>--- Tidak ada file tersedia ---</h4>";
                }
                else{
                $info = pathinfo($fileTranskrip);            //mendapatkan isi dari database dan membacanya
                $exten=$info['extension'];
                    
                if($exten=="jpg"||$exten=="png"||$exten=="jpeg"){
                    echo '<img src="../uploads/transkrip_nilai/'.$fileTranskrip.'" style="width: 100%"> ';
                }
                else if($exten=="pdf"){
                    ?>
                    <button class="google-viewer btn">Google Docs Viewer</button>
                    <iframe class="google-docs iframe" src="../uploads/transkrip_nilai/<?php echo $fileTranskrip?>"  frameborder="0" style="width: 100%; height: 400px;" 
                    scrolling="no" marginheight="0" marginwidth="0" role="document" aria-label="PDF document" title="PDF document">Click to view the document</iframe>
            <?php
                }
                else if($exten=="doc"||$exten=="docx"){
                  ?>
                  <button class="office-viewer btn">Office Apps Viewer</button>
                  <iframe class = "office iframe" src="../uploads/transkrip_nilai/<?php echo $fileTranskrip?>" frameborder="0"
                    scrolling="no" marginheight="0" marginwidth="0" role="document" aria-label="Doc document" title="Doc document" >
                </iframe> 
                  <?php
                }
            }
                ?>

                  
                </div>
            </div>   
             <center><a class="btn btn-primary" href="downloadfile.php?tn_id=<?php echo $fileTranskrip;?>"><i class="fa fa-download"></i> Download</a></center>        
            </div>
            

            <div class="col-md-6 col-sm-12 col-xs-12">                     
            <div class="panel panel-default">
                <div class="panel-heading">
                    File Lampiran Rencana Mata Kuliah
                </div>
                <div class="panel-body">
                <?php
                
                $fileMatkul=$query2['rencana_mata_kuliah'];

                if ($fileMatkul==null) {
                    echo "<h4 class='text-center'>--- Tidak ada file tersedia ---</h4>";
                }
                else{
                $info = pathinfo($fileMatkul);            //mendapatkan isi dari database dan membacanya
                $exten=$info['extension'];
                    
                if($exten=="jpg"||$exten=="png"||$exten=="jpeg"){
                    echo '<img src="../uploads/rencana_mata_kuliah/'.$fileMatkul.'" style="width: 100%"> ';
                }
                else if($exten=="pdf"){
                    ?>
                    <button class="google-viewer btn">Google Docs Viewer</button>
                    <iframe class="google-docs iframe" src="../uploads/rencana_mata_kuliah/<?php echo $fileMatkul?>"  frameborder="0" style="width: 100%; height: 400px;" 
                    scrolling="no" marginheight="0" marginwidth="0" role="document" aria-label="PDF document" title="PDF document">Click to view the document</iframe>
            <?php
                }
                else if($exten=="doc"||$exten=="docx"){
                  ?>
                  <button class="office-viewer btn">Office Apps Viewer</button>
                  <iframe class = "office iframe" src="../uploads/rencana_mata_kuliah/<?php echo $fileMatkul?>" frameborder="0"
                    scrolling="no" marginheight="0" marginwidth="0" role="document" aria-label="Doc document" title="Doc document" >
                </iframe> 
                  <?php
                }
            }
                ?>

                  
                </div>
            </div>   
             <center><a class="btn btn-primary" href="downloadfile.php?rmk_id=<?php echo $fileMatkul;?>"><i class="fa fa-download"></i> Download</a></center>        
            </div>
          </div>
          <br>
          <br>
          <center>
          <table>
        <th>
            <td><input class="contact100-form-btn" type="submit" value="Accept" name="submit"></td>
            <td><input class="contact100-form-btn" type="submit" value="Decline" name="submit"></td>
        </th>
    </table>
    </center>
    </form>
    </div>
    </div>
</div>




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

  <script type="text/javascript">
    $(document).ready(function(){
  $('.google-viewer').on('click', function(){
    if($('.office').css('display') !== 'none')
      $('.office').slideToggle();
    $('.google-docs').slideToggle();
  });

  $('.office-viewer').on('click', function(){
    if($('.google-docs').css('display') !== 'none')
      $('.google-docs').slideToggle();
    $('.office').slideToggle();
  });
});
  </script>

</body>
