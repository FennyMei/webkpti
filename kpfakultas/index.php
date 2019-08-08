<?php
	include('header.php');
	$tipe=null;
	if($_GET['tipe']=='c'){
		$tipe='c';
	}else if($_GET['tipe']=='d'){
		$tipe='d';
	}else{
		$tipe='e';
	}
?>

<body>

<div class="container-contact100">
    <div class="wrap-contact100">
      <form class="contact100-form validate-form" id="download" action="submit.php?type=kpfakultas" method="post" enctype="multipart/form-data">
        <span class="contact100-form-title">
          KP Fakultas
        </span>

        <div class="wrap-input100 validate-input bg1">
          <span class="label-input100">NAMA : </span>
          <input class="input100" type="text" name="nama" readonly value="<?php echo $_SESSION['user']; ?>" required>
        </div>

        <div class="wrap-input100 validate-input bg1" data-validate="Harap masukkan NIM">
          <span class="label-input100">NIM</span>
          <input class="input100" type="text" name="nim" placeholder="Masukkan NIM" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" required>
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-alert-validate" data-validate = "Harap masukkan jumlah SKS">
          <span class="label-input100">Jumlah SKS</span>
          <input class="input100" type="text" name="sks" placeholder="Masukkan jumlah SKS" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" required>
        </div>

        <div class="wrap-input100 validate-input bg1" data-validate="Harap masukkan nomor telepon">
          <span class="label-input100">Nomor Telepon</span>
          <input class="input100" type="text" name="telp" placeholder="Masukkan Nomor Telepon" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" id="phoneNumber" minlength="10" maxlength="13" onKeyUp="if(this.value.substring(0,2) != '08' && this.value.length > 2){this.value='08';}else if(this.value.length<=0){this.value='';}" required>
        </div>
        <p id="errorPhone" style="color: red; display: none;">Harap masukkan nomor telepon yang benar!</p>
        <br>

        <div id="kpc" class="wrap-input100 validate-input bg1" >
        <!-- <pre>Pilih Tipe KP : </pre> -->
        					<select class="input100" id="jeniskp" name="jeniskp" required hidden>
        					<?php
        					if($tipe=='c'){
        						echo '<option value="kpc" selected="selected">KP C</option>';
        					}else if($tipe=='d'){
        						echo '<option value="kpd" selected="selected">KP D</option>';
        					}else{
        						echo '<option value="kpe" selected="selected">KP E</option>';
        					}

        					?>

							</select>
							<br>
        <span class="label-input100"> Prioritas :</span>
        					
							<br>
							<pre>Prioritas KP 1:		</pre>
							<select class="input100" name="kpc_1"required>
								<?php
									include('../koneksi.php');
									if($tipe=='c'){
										$sql = "SELECT id_job, divisi, nama_perusahaan, job_desc, status FROM joblist, perusahaan WHERE joblist.id_perusahaan=perusahaan.id_perusahaan AND status='C' ORDER BY nama_perusahaan ASC";
									}else if($tipe=='d'){
										$sql = "SELECT id_job, divisi, nama_perusahaan, job_desc, status FROM joblist, perusahaan WHERE joblist.id_perusahaan=perusahaan.id_perusahaan AND status='D' ORDER BY nama_perusahaan ASC";
									}else{
										$sql = "SELECT id_job, divisi, nama_perusahaan, job_desc, status FROM joblist, perusahaan WHERE joblist.id_perusahaan=perusahaan.id_perusahaan AND status='E' ORDER BY nama_perusahaan ASC";
									}
									$res = $conn->query($sql);
									while($row=$res->fetch_assoc())
										echo '<option value="'.$row['id_job'].'">['.$row['status']."] ".$row['nama_perusahaan'].' - '.$row['job_desc'].' ('.$row['divisi'].')</option>';
								?>
							</select>
							<br>
							<pre>Prioritas KP 2:		</pre>
							<select class="input100"  id="kpc_2" name="kpc_2" onchange="kpc();">
								<option value="none">Tidak ada</option>
								<?php
									if($tipe=='c'){
										$sql = "SELECT id_job, divisi, nama_perusahaan, job_desc, status FROM joblist, perusahaan WHERE joblist.id_perusahaan=perusahaan.id_perusahaan AND status='C' ORDER BY nama_perusahaan ASC";
									}else if($tipe=='d'){
										$sql = "SELECT id_job, divisi, nama_perusahaan, job_desc, status FROM joblist, perusahaan WHERE joblist.id_perusahaan=perusahaan.id_perusahaan AND status='D' ORDER BY nama_perusahaan ASC";
									}else{
										$sql = "SELECT id_job, divisi, nama_perusahaan, job_desc, status FROM joblist, perusahaan WHERE joblist.id_perusahaan=perusahaan.id_perusahaan AND status='E' ORDER BY nama_perusahaan ASC";
									}
									$res = $conn->query($sql);
									while($row=$res->fetch_assoc())
										echo '<option value="'.$row['id_job'].'">['.$row['status']."] ".$row['nama_perusahaan'].' - '.$row['job_desc'].' ('.$row['divisi'].')</option>';
								?>
							</select>
							<br>
							<pre>Prioritas KP 3:		</pre>
							<select class="input100"  id="kpc_3" name="kpc_3" disabled>
								<option value="none">Tidak ada</option>
								<?php
									if($tipe=='c'){
										$sql = "SELECT id_job, divisi, nama_perusahaan, job_desc, status FROM joblist, perusahaan WHERE joblist.id_perusahaan=perusahaan.id_perusahaan AND status='C' ORDER BY nama_perusahaan ASC";
									}else if($tipe=='d'){
										$sql = "SELECT id_job, divisi, nama_perusahaan, job_desc, status FROM joblist, perusahaan WHERE joblist.id_perusahaan=perusahaan.id_perusahaan AND status='D' ORDER BY nama_perusahaan ASC";
									}else{
										$sql = "SELECT id_job, divisi, nama_perusahaan, job_desc, status FROM joblist, perusahaan WHERE joblist.id_perusahaan=perusahaan.id_perusahaan AND status='E' ORDER BY nama_perusahaan ASC";
									}
									$res = $conn->query($sql);
									while($row=$res->fetch_assoc())
										echo '<option value="'.$row['id_job'].'">['.$row['status']."] ".$row['nama_perusahaan'].' - '.$row['job_desc'].' ('.$row['divisi'].')</option>';
								?>
							</select>
							<br>
							<pre class="label-input100">Durasi Kerja Praktik:	</pre>
		
							<select name="startmonth" class="datemonth">
								<?php
									$month = intval(date('n'));
									
									if($month<2)
										$month = "0106";
									else if($month<8)
										$month = "0712";
									else
										$month = "0106";
									
									switch(substr($month,0,2))
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
										
									echo '<option value="'.substr($month,0,2).'">'.$monthcaption.'</option>';
								?>
							</select>

							<select name="startyear" class="dateyear">
								<?php
									$year = intval(date("Y"));
									if(intval(date('n'))>8)
										$year++;
									echo '<option value="'.$year.'">'.$year.'</option>';
								?>
							</select>
							<span>s/d</span>
							<select name="endmonth" class="datemonth">
								<?php
									switch(substr($month,2,2))
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
										
									echo '<option value="'.substr($month,2,2).'">'.$monthcaption.'</option>';
								?>
							</select>
							<select name="endyear" class="dateyear">
								<?php
									echo '<option value="'.$year.'">'.$year.'</option>';
								?>
							</select>
							<br>
		</div>

		<div id="kpd" class="wrap-input100 validate-input bg1" >
			<span class="label-input100">Nama Perusahaan</span>
          <select class="input100" name="kpd" required>
        
          <?php
   			include('../koneksi.php');
			//Ambil data dari database
			$sql = "SELECT id_perusahaan, nama_perusahaan, status FROM perusahaan WHERE status='D' AND aktif='A' AND list='WHITELIST' ORDER BY nama_perusahaan ASC";
			$q = $conn->query($sql); 
			while($res=$q->fetch_assoc())
			{
				echo '<option value="'.$res['id_perusahaan'].'">['.$res['status'].'] '.$res['nama_perusahaan'].' </option>';
			}
			?>
			
		</select>

			<pre class="label-input100">Durasi Kerja Praktik:	</pre>
		
							<select name="startmonth" class="datemonth">
								<?php
									$month = intval(date('n'));
									
									if($month<2)
										$month = "0106";
									else if($month<8)
										$month = "0712";
									else
										$month = "0106";
									
									switch(substr($month,0,2))
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
										
									echo '<option value="'.substr($month,0,2).'">'.$monthcaption.'</option>';
								?>
							</select>

							<select name="startyear" class="dateyear">
								<?php
									$year = intval(date("Y"));
									if(intval(date('n'))>8)
										$year++;
									echo '<option value="'.$year.'">'.$year.'</option>';
								?>
							</select>
							<span>s/d</span>
							<select name="endmonth" class="datemonth">
								<?php
									switch(substr($month,2,2))
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
										
									echo '<option value="'.substr($month,2,2).'">'.$monthcaption.'</option>';
								?>
							</select>
							<select name="endyear" class="dateyear">
								<?php
									echo '<option value="'.$year.'">'.$year.'</option>';
								?>
							</select>

		</div>

		<div id="kpe" class="wrap-input100 validate-input bg1" >
			<span class="label-input100">Nama Perusahaan</span>
          <select class="input100" name="kpe" required>
        
          <?php
   			include('../koneksi.php');
			//Ambil data dari database
			$sql = "SELECT id_perusahaan, nama_perusahaan, status FROM perusahaan WHERE status='E' AND aktif='A' AND list='WHITELIST' ORDER BY nama_perusahaan ASC";
			$q = $conn->query($sql); 
			while($res=$q->fetch_assoc())
			{
				echo '<option value="'.$res['id_perusahaan'].'">['.$res['status'].'] '.$res['nama_perusahaan'].' </option>';
			}
			?>
			
		</select>

			<pre class="label-input100">Durasi Kerja Praktik:	</pre>
		
							<select name="startmonth" class="datemonth" style="select::-ms-expand {display: none;}">
								<?php
									$month = intval(date('n'));
									
									if($month<2)
										$month = "0106";
									else if($month<8)
										$month = "0712";
									else
										$month = "0106";
									
									switch(substr($month,0,2))
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
										
									echo '<option value="'.substr($month,0,2).'">'.$monthcaption.'</option>';
								?>
							</select>

							<select name="startyear" class="dateyear">
								<?php
									$year = intval(date("Y"));
									if(intval(date('n'))>8)
										$year++;
									echo '<option value="'.$year.'">'.$year.'</option>';
								?>
							</select>
							<span>s/d</span>
							<select name="endmonth" class="datemonth">
								<?php
									switch(substr($month,2,2))
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
										
									echo '<option value="'.substr($month,2,2).'">'.$monthcaption.'</option>';
								?>
							</select>
							<select name="endyear" class="dateyear">
								<?php
									echo '<option value="'.$year.'">'.$year.'</option>';
								?>
							</select>

		</div>

							<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Harap masukkan deskripsi diri">
          <span class="label-input100">DESKRIPSI DIRI</span>
          <textarea class="input100" name="desc" placeholder="Isi deskripsi diri..." rows="5" cols="40" required></textarea>
        </div>

        <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Harap masukkan keahlian dan tools yang dikuasai">
          <span class="label-input100">KEAHLIAN DAN TOOLS YANG DIKUASI</span>
          <textarea class="input100" name="tools" placeholder="Isi keahlian dan tools yang dikuasai..." rows="5" cols="40" required></textarea>
        </div>

		<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Harap masukkan mini project">
          <span class="label-input100">MINI PROJECT</span>
          <textarea class="input100" name="mini_project" placeholder="Isi mini project..." rows="5" cols="40" required></textarea>
        </div>
		<div class="wrap-input100 validate-input bg1" >
        <span class="label-input100">Lampiran (Scan) :</span>
							<br>
							<br>
							<pre>Transkrip Nilai (<i>format file harus pdf</i>)</pre>
							<input id="file-input" name="transkrip_nilai" type="file" accept="application/pdf" onchange="fileTypeValidation()" required>
							<br>
							<br>
							<pre>Rencana Mata Kuliah:	</pre>
							<input id="file-input" name="rencana_matkul" type="file" accept="application/pdf" onchange="fileTypeValidation()" required>
							<br>
		</div>
		<div class="wrap-input100 validate-input bg1" >
        <span class="label-input100">Lampiran Foto :</span>
							<br>
							<pre>Foto Identitas (<i>format file harus jpg/png</i>)</pre>
							<input id="file-input" name="foto_lampiran" type="file" accept=".png, .jpg, .jpeg" required>
		</div>
		       <input class="contact100-form-btn" type="submit" value="Ajukan" id="btnSubmit" name="submit">
						</form>
						<script>
							$(".antimultirow").keypress(function(event) {
								if (event.which == 13) {
									alert("Hi");
									event.preventDefault();
								}
							});
						</script>
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
            <p>Sistem informasi kerja praktik di Prodi Informatika Universitas Kristen Duta Wacana. Sistem ini mempermudah mahasiswa, dosen dan koordinator untuk memperoleh informasi, mengelola data (Koordinator) dan melakukan pengajuan kerja praktik (Mahasiswa).</p>
          </div>


          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Kontak</h3>
            <p>
              Laurentius Kuncoro Probo Saputra., S.T., M.Eng<br>
              Koordinator Kerja Praktik Informatika<br>
              <strong>Nomor Handphone :</strong> 08985400258<br>
              <strong>Email :</strong> kuncoro@staff.ukdw.ac.id<br>
            </p>

          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; <strong>2016 Teknik Informatika UKDW</strong>
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

  function fileTypeValidation() {
    var fileType = document.getElementById('file-input').files[0].type;
    if (fileType === "application/pdf") {
    }
    else {
    document.getElementById('file-input').value = "";
      alert("format file tidak valid!");
      
    }
}

function kpc()
{
	if($('#kpc_2 option:selected').val() != "none")
	{
		$('#kpc_3').attr("disabled", false);
	}
	else
	{
		$('#kpc_3').attr("disabled", true);
		$('#kpc_3').val("none");
	}
}

$(function() {
	$('#kpd').hide();
  	$('#kpe').hide();
  $('#jeniskp').change(function(){
  	if($(this).val()=="kpc"){
  		 $('#kpc').show();
  		 $('#kpd').hide();
  		 $('#kpe').hide();
  	}
  	else if($(this).val()=="kpd"){
  		 $('#kpd').show();
  		 $('#kpc').hide();
  		 $('#kpe').hide();
  	}
  	else{
  		$('#kpe').show();
  		$('#kpc').hide();
  		$('#kpd').hide();
  	}
   
  });
});

$(function(){
	$('#phoneNumber').keyup(function () {
		if($(this).val().length < 10){
			$('#errorPhone').show();
			$("#btnSubmit").prop("disabled", true);
		}else{
			$('#errorPhone').hide();
			$("#btnSubmit").removeAttr('disabled');
		}
	});
});
</script>


</body>