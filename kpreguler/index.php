<?php
	include('header.php');
	$tipe=null;
	if($_GET['tipe']=='a'){
		$tipe='a';
	}else{
		$tipe='b';
	}
?>


<body>

<div class="container-contact100">
    <div class="wrap-contact100">
      <form class="contact100-form validate-form" id="download" action="submit.php?type=kpreguler" method="post" enctype="multipart/form-data">
        <span class="contact100-form-title">
          KP Reguler
        </span>

        <div class="wrap-input100 validate-input bg1">
          <span class="label-input100">NAMA </span>         
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
        <div class="wrap-input100 validate-input bg1" >
          <span class="label-input100">Nama Perusahaan</span>
          
          	
          <?php
   			include('../koneksi.php');
			//Ambil data dari database
			
			if($tipe=='a'){
				$sql = "SELECT id_perusahaan, nama_perusahaan, status FROM perusahaan WHERE status='A' AND aktif='A' AND list='WHITELIST' ORDER BY nama_perusahaan ASC";
				echo '<select class="input100" id="kpa" name="kpa" required onchange="kpab();">';
				$q = $conn->query($sql); 
					while($res=$q->fetch_assoc())
					{
						echo '<option value="'.$res['id_perusahaan'].'">'.$res['nama_perusahaan'].' [KP'.$res['status'].']</option>';	
					}
					echo '</select>';
			}else{
				echo '<select class="input100" id="kpa" name="kpa" required onchange="kpab();" style="display: none;">';
				$sql = "SELECT id_perusahaan, nama_perusahaan, status FROM perusahaan WHERE status='B' AND aktif='A' AND list='WHITELIST' ORDER BY nama_perusahaan ASC";
				echo '<option value="other" >Lainnya...</option>';
				echo '</select>';

				
			}
			
			
			?>
			
		
								<br>
								<?php
								if($tipe=='b'){
								?>
								<input type="text" id="hasilPerusahaan" style="margin-bottom: 20px; margin-top: 10px; display: none;" disabled> <br>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="other">Tambahkan Perusahaan </button>
								<?php
								}
								?>
								<br>
								<br>
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Data Perusahaan (Kerja Praktik Tipe B)</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      
								        <div id="kpb">

								        	<label>Nama Perusahaan: </span></label>
	                                        <div class="form-group input-group">
	                                            
	                                            <input id="kpb_name" name="kpb_nama" placeholder="Masukkan Nama Perusahaan" type="text" class="form-control" required>
	                                        </div>
											
											<label>Contact Person: </span></label>
	                                        <div class="form-group input-group">
	                                            
	                                            <input id="kpb_cp" name="kpb_cp" placeholder="Masukkan Nama Kontak" type="text" class="form-control" required>
	                                        </div>

	                                        <label>Telepon Perusahaan: </span></label>
	                                        <div class="form-group input-group">
	                                            
	                                            <input id="kpb_telp" name="kpb_telp" type="number" placeholder="Masukkan Nomor Telepon" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" minlength="10" maxlength="13" onKeyUp="if(this.value.substring(0,2) != '08'){this.value='08';}else if(this.value<0){this.value='0';}" class="form-control" required>
	                                        </div>
											
											<label>Alamat Perusahaan: </span></label>
	                                        <div class="form-group input-group">
	                                            
	                                            <input id="kpb_alamat" name="kpb_alamat" placeholder="Masukkan Alamat Perusahaan" type="text" class="form-control" required>
	                                        </div>

	                                        <label>Provinsi Perusahaan: </span></label>
	                                        
	                                           <!--  <div class="autocomplete">
	                                            	<input id="kpb_provinsi" name="kpb_provinsi" type="text" class="form-control" required>
	                                        	</div> -->

	                                        	<?php
	                                        
												echo '<select class="js-select2" name="kpb_provinsi" required">';
											
													$sqlLoc = "SELECT * FROM inf_lokasi where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama";
												$q = $conn->query($sqlLoc);
												
												while($res=$q->fetch_assoc())
													{
														echo '<option value="'.$res['lokasi_nama'].'">'. $res['lokasi_nama'].'</option>';		
													}
													echo '</select>';


	                                        	?>
	                                       		<div class="dropDownSelect2"></div>
											
										</div>
									
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" type="reset" value="Reset">Hapus</button>
								        <button type="button" class="btn btn-primary" data-dismiss="modal" id="clickModal">OK</button>
								      </div>
								    </div>
								  </div>
								</div>
								
							<pre class="label-input100">Durasi Kerja Praktik:	</pre>
							<select name="startmonth" class="datemonth">
								<option value="01">Januari</option>
								<option value="02">Februari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Juli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
							<select name="startyear" class="dateyear" id="startyear">
								<?php
									$thisyear = date("Y");
									for($i=0;$i<=1;$i++)
									{
										echo '<option value="'.($thisyear+$i).'">'.($thisyear+$i).'</option>';
									}
								?>
							</select>
							<span>s/d</span>
							<select name="endmonth" class="datemonth">
								<option value="01">Januari</option>
								<option value="02">Februari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Juli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
							<select name="endyear" class="dateyear" id="endyear">
								<?php
									$thisyear = date("Y");
									for($i=0;$i<=2;$i++)
									{
										echo '<option value="'.($thisyear+$i).'">'.($thisyear+$i).'</option>';
									}
								?>
							</select>
							<p id="errorYear" style="color: red; display: none;">Harap masukkan format tanggal yang benar!</p>
							<br>
							<br>
							<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Harap masukkan deskripsi pekerjaan">
          <span class="label-input100">DESKRIPSI PEKERJAAN</span>
          
          <textarea class="input100" name="jobdesc" placeholder="Isi deskripsi..." rows="5" cols="40" value="<?php echo $jobdesc;?>"></textarea>
        </div>
        </div>
        <div class="wrap-input100 validate-input bg1" >
        <span class="label-input100">Lampiran (Scan) :</span>
							<br>
							<br>
							<pre>Transkrip Nilai (<i>format file harus pdf</i>)</pre>
							<input id="file-input" name="transkrip_nilai" type="file"  accept="application/pdf" onchange="fileTypeValidation()" required>
							<br>
							<br>
							<pre>Rencana Mata Kuliah (<i>format file harus pdf</i>)</pre>
							<input id="file-input" name="rencana_matkul" type="file" accept="application/pdf" onchange="fileTypeValidation()" required>
							<br>
		</div>
		<div class="wrap-input100 validate-input bg1" >
        <span class="label-input100">Lampiran Foto :</span>
							<br>
							<pre>Foto Identitas (<i>format file harus jpg/png</i>)</pre>
							<input id="file-input" name="foto_lampiran" type="file" accept=".png, .jpg, .jpeg" required>
		</div>
       <input class="contact100-form-btn" type="submit" value="Ajukan" name="submit" id="btnSubmit" onSubmit="return confirmation();">
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
            <p>Sistem informasi kerja praktik di Prodi Informatika Universitas Kristen Duta Wacana. Sistem ini mempermudah mahasiswa, dosen dan koordinator untuk memperoleh informasi, mengelola data (Koordinator) dan melakukan pengajuan kerja praktik (Mahasiswa).</p>
          </div>


          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Kontak</h3>
            <p>
              Laurentius Kuncoro Probo Saputra., S.T., M.Eng<br>
              Koordinator Kerja Praktik Informatika<br>
              Fakultas Informatika Universitas Kristen Duta Wacana<br>
              <strong>Nomor Handphone :</strong> 08985400258<br>
              <strong>Email :</strong> kuncoro@staff.ukdw.ac.id<br>
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
    var namaPerusahaan;
    // function onload() { 
    //     // namaPerusahaan = document.getElementById('kpb_name');
    //     // document.getElementById('hasilPerusahaan').value = namaPerusahaan.value;
    //     // alert(namaPerusahaan.value);

    //     var name = $(element).parent().prev().find("#kpb_name");
    //     document.getElementById('hasilPerusahaan').value = nama.value;
    //     alert(nama.value);
    // }

    $('#clickModal').click(function(){
    	$('#hasilPerusahaan').show();
    	$('#hasilPerusahaan').val($('#kpb_name').val());
   // alert($('#kpb_name').val());
	});
</script>


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



<script type="text/javascript">
$('[value=Reset]').on('click', function (e) {
    var $t = $(this),
        target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

  $(target)
    .find("input,textarea,select")
       .val('')
       .end()
})
</script>

<script type="text/javascript">


$(function() {
  $('#kpa').change(function(){
  	if($(this).val()=="other"){
  		 $('#other').show();
  		 document.getElementById("kpb_name").required = true;
			document.getElementById("kpb_cp").required = true;
			document.getElementById("kpb_telp").required = true;
			document.getElementById("kpb_alamat").required = true;
			document.getElementById("kpb_provinsi").required = true;
  	}
  	else{
  		$(".modal-body").find("input,textarea,select")
       .val('')
       .end()
  		$('#other').hide();
  		document.getElementById("kpb_name").required = false;
			document.getElementById("kpb_cp").required = false;
			document.getElementById("kpb_telp").required = false;
			document.getElementById("kpb_alamat").required = false;
			document.getElementById("kpb_provinsi").required = false;
  	}
   
  });
});

$(function() {
	$('#endyear').change(function(){
		if(parseInt($(this).val()) < parseInt($('#startyear').val())){
			$('#errorYear').show();
			$("#btnSubmit").prop("disabled", true);
		}else{
			$('#errorYear').hide();
			$("#btnSubmit").removeAttr('disabled');
		}
	});

	$('#startyear').change(function(){
		if(parseInt($(this).val()) > parseInt($('#endyear').val())){
			$('#errorYear').show();
			$("#btnSubmit").prop("disabled", true);
		}else{
			$('#errorYear').hide();
			$("#btnSubmit").removeAttr('disabled');
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

function fileTypeValidation() {
    var fileType = document.getElementById('file-input').files[0].type;
    if (fileType === "application/pdf") {
    }
    else {
    document.getElementById('file-input').value = "";
      alert("format file tidak valid!");
      
    }
}


</script>

 
</body>
