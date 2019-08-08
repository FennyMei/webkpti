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
    <?php
        echo "<form  action='terimalamaran2.php?id=".$query2['id_lamaran']."' method='post' enctype='multipart/form-data'>";
        if($tipe=='C'){

        }
        else{

    ?>
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
    <?php
    }
    ?>
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
    <span class="label-input100">Status Registrasi</span>
    <input class="input100" type="text" name="nim" value="<?php echo $query2['status_registrasi']; ?>" disabled>
    </div>
   
   <div class="wrap-input100 validate-input bg1">
    <span class="label-input100">Dosen Pembimbing</span>
    <?php
    $sqlcek = "SELECT mahasiswa.nim, mahasiswa.dosen_pembimbing, dosen.nama AS nama_dosen FROM dosen, mahasiswa where mahasiswa.dosen_pembimbing=dosen.dosen_pembimbing AND mahasiswa.nim='".$query2['nim']."'";
    $resultcek = mysql_query($sqlcek);
    $rowcek = mysql_num_rows($resultcek);
    if($rowcek==1){
      $row1 = mysql_fetch_array($resultcek);

      $sql = "SELECT * FROM dosen WHERE dosen_pembimbing<>'".$row1['dosen_pembimbing']."'";
      $result = mysql_query($sql);

      
      echo "<select style='width:300px;' name='dosen' required>";
      echo "<option value='" . $row1['dosen_pembimbing'] ."'>" . $row1['nama_dosen'] ."</option>";
      while ($row = mysql_fetch_array($result)) {
      echo "<option value='" . $row['dosen_pembimbing'] ."'>" . $row['nama'] ."</option>";
      }
      echo "</select></div>";
    }
    else{
      $sql = "SELECT * FROM dosen";
      $result = mysql_query($sql);

      echo "<select style='width:300px;' name='dosen' required>";
      while ($row = mysql_fetch_array($result)) {
      echo "<option value='" . $row['dosen_pembimbing'] ."'>" . $row['nama'] ."</option>";
      }
    echo "</select></div>";

    }

    
    ?> 
    
    </div>

    <hr>
      <div class="row">
           <div class="col-md-6 col-sm-12 col-xs-12">                     
            <div class="panel panel-default">
                <div class="panel-heading">
                    File Lampiran Surat Keterangan
                </div>
                <div class="panel-body">
                <?php
                
                $fileKeterangan=$query2['surat_keterangan'];

                if ($fileKeterangan==null) {
                    echo "<h4 class='text-center'>--- Tidak ada file tersedia ---</h4>";
                }
                else{
                $info = pathinfo($fileKeterangan);            //mendapatkan isi dari database dan membacanya
                $exten=$info['extension'];
                    
                if($exten=="jpg"||$exten=="png"||$exten=="jpeg"){
                    echo '<img src="../uploads/surat_keterangan/'.$fileKeterangan.'" style="width: 100%"> ';
                }
                else if($exten=="pdf"){
                    ?>
                    <button class="google-viewer btn">Google Docs Viewer</button>
                    <iframe class="google-docs iframe" src="../uploads/surat_keterangan/<?php echo $fileKeterangan?>"  frameborder="0" style="width: 100%; height: 400px;" 
                    scrolling="no" marginheight="0" marginwidth="0" role="document" aria-label="PDF document" title="PDF document">Click to view the document</iframe>
            <?php
                }
                else if($exten=="doc"||$exten=="docx"){
                  ?>
                  <button class="office-viewer btn">Office Apps Viewer</button>
                  <iframe class = "office iframe" src="../uploads/surat_keterangan/<?php echo $fileKeterangan?>" frameborder="0"
                    scrolling="no" marginheight="0" marginwidth="0" role="document" aria-label="Doc document" title="Doc document" >
                </iframe> 
                  <?php
                }
            }
                ?>

                  
                </div>
            </div>  
            <?php
           if ($fileKeterangan!=null) {
            ?>
            <center><a class="btn btn-primary" href="downloadfile.php?sk_id=<?php echo $fileKeterangan;?>"><i class="fa fa-download"></i> Download</a></center>        
            <?php
                }
            ?> 
             </div>
            
          </div>
          <br>
          <br>
          <center>
<table>
    <th>
    <td><input class="contact100-form-btn" type='submit' value='Diterima' name='submit'></td>
    <td><input class="contact100-form-btn" type='submit' value='Ditolak' name='submit'></td>
    <td><input class="contact100-form-btn" type='submit' value='Hapus' name='submit' onclick='return confirmHapus()'></td>
  </th>
</table>
</center>
    </form>
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
<script>
function confirmHapus() {
    var confirmed = confirm("Apakah anda yakin ingin menghapus Lamaran ini ?");
    return confirmed;
}
</script> 
</body>