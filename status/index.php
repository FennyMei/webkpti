<?php
	session_start();
	include('header.php');

?>
<html>
	<body>
		<div id="content">
			<div id="headcontainer">
				<link rel="stylesheet" type="text/css" href="status/index.css">
				<div id="cpanel">
					<?php
						include('../koneksi.php');
						$last_pengajuan = "NONE";
						$last_registration = "NONE";
						$last_kp = "NONE";
						$sql = "SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE google_id='".$_SESSION['id']."'";
						$num = $conn->query($sql);
						$num = $num->fetch_assoc();
						$num = $num['num'];
					
//						$sql = "SELECT id_lamaran, status_registrasi, status_kp FROM lamaran WHERE google_id='".$_SESSION['id']."' ORDER BY id_lamaran DESC";
//						$res = $conn->query($sql);
//						$res = $res->fetch_assoc();
						if($num!=0)
						{
							echo '<div class="col-md-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
							<table class="table" id="dataTables-example">
									<thead>
										<th>No</th>
										<th>Perusahaan</th>
										<th>Tipe KP</th>
										<th>Status Pengajuan</th>
										<th>Status Registrasi</th>
										<th>Status KP</th>
									</thead>
								<tbody>';
							
							$sql = "SELECT id_lamaran, kpc1, kpc2, tipe, status_pengajuan, status_registrasi, status_kp FROM lamaran, perusahaan
							WHERE perusahaan.id_perusahaan=lamaran.id_perusahaan AND google_id='".$_SESSION['id']."' ORDER BY tanggal_input ASC";
							$q = $conn->query($sql);
							$i=0;
							while($row = $q->fetch_array())
							{
								echo '<tr>
										<td>'.($i+1).'</td>';
								
								$sql = "SELECT nama_perusahaan, job_desc FROM lamaran, perusahaan
								WHERE id_lamaran='".$row['id_lamaran']."' AND perusahaan.id_perusahaan=lamaran.id_perusahaan ORDER BY tanggal_input ASC";
								$query = $conn->query($sql);
								$kpcperusahaan = $query->fetch_assoc();
								$perusahaan='<abbr title="'.$kpcperusahaan['job_desc'].'"><u>'.$kpcperusahaan['nama_perusahaan'].'</abbr>';
								if($row['kpc1']!=-1)
								{
									$sql = "SELECT nama_perusahaan, kpc1_jd FROM lamaran, perusahaan
									WHERE id_lamaran='".$row['id_lamaran']."' AND perusahaan.id_perusahaan=lamaran.kpc1";
									$query = $conn->query($sql);
									$kpcperusahaan = $query->fetch_assoc();
									$perusahaan=$perusahaan.'<br><abbr title="'.$kpcperusahaan['kpc1_jd'].'">'.$kpcperusahaan['nama_perusahaan'].'</abbr>';
									if($row['kpc2']!=-1)
									{
										$sql = "SELECT nama_perusahaan, kpc2_jd FROM lamaran, perusahaan
										WHERE id_lamaran='".$row['id_lamaran']."' AND perusahaan.id_perusahaan=lamaran.kpc2";
										$query = $conn->query($sql);
										$kpcperusahaan = $query->fetch_assoc();
										$perusahaan=$perusahaan.'<br><abbr title="'.$kpcperusahaan['kpc2_jd'].'">'.$kpcperusahaan['nama_perusahaan'].'</abbr>';
									}
								}
								echo '</u><td>'.$perusahaan.'</td>
										<td>'.$row['tipe'].'</td>';
								
								switch ($row['status_pengajuan'])
								{
									case "ACCEPT":     echo	'<td>DITERIMA</td>'; break;
									case "DECLINE":    echo	'<td>DITOLAK</td>'; break;
									case "PENDING":    echo	'<td>MENUNGGU KEPUTUSAN</td>'; break;
								}
                                if(strcmp($row['status_registrasi'], "NONE")!=0)
                                {
									if(strcmp($row['status_registrasi'], "ACCEPT")==0)
									{
										echo	    '<td>DITERIMA</td>';
	                                    if(strcmp($row['status_kp'], "LULUS")==0)      echo '<td>LULUS</td>';
										else if(strcmp($row['status_kp'], "GUGUR")==0) echo '<td>GUGUR</td>';
										else if(strcmp($row['status_kp'], "NONE")==0)  echo '<td>SEDANG BERLANGSUNG</td>';
										echo		'</tr>';
									}
									else if(strcmp($row['status_registrasi'], "DECLINE")==0)
										echo	'<td>DITOLAK</td><td>-</td></tr>';
									else if(strcmp($row['status_registrasi'], "PENDING")==0)
										echo	'<td>MENUNGGU KEPUTUSAN</td><td>-</td></tr>';
                                }
								else
								{
									echo '<td>-</td><td>-</td></tr>';
								}
								
								$last_pengajuan = $row['status_pengajuan'];
								$last_registration = $row['status_registrasi'];
								$last_kp = $row['status_kp'];
								$i++;
							}
							
							echo 	'</tbody>
								</table></div></div></div></div>';
						}
						if($num==0||strcmp($last_pengajuan, "DECLINE")==0||strcmp($last_registration, "DECLINE")==0||strcmp($last_kp, "GUGUR")==0)
						{
							echo '<div class="container">
              <div class="row">
              
							
									<div class="col-md-4">
									<a onclick="goLoad(\'kpreguler\')" href="#">
										KP Reguler
										<br>
										<br>
										<i class="fa fa-building" style="font-size:50px;"></i>
										</a>
									</div>
								
								
									<div class="col-md-4">
									<a onclick="goLoad(\'kpfakultas\')" href="#">
										KP Fakultas
										<br>
										<br>
										<i class="fa fa-university" style="font-size:50px;"></i>
										</a>
									</div>
								
								
								</div>
								</div>';
						}
						else if($_SESSION['last_statPengajuan']=="ACCEPT" && strcmp($last_registration, "NONE")==0)
						{
							echo '<div id="surat-keterangan">
									<div>
										<pre>Download Surat Pengantar:	<a href="download.php" target="_blank"><button>Download</button></a></pre>
									</div>
								</div>';
						}
					?>
				</div>
			</div>
		</div>

<!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>KaPeTI</h3>
            <p>Sistem informasi kerja praktik di Prodi Informatika Universitas Kristen Duta Wacana. Sistem ini mempermudah mahasiswa, dosen dan koordinator untuk memperoleh informasi, mengelola data (Koordinator) dan melakukan pengajuan kerja praktik (Mahasiswa).</p>
          </div>


          <div class="col-lg-3 col-md-6 footer-info">
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
  <script src="js/main.js"></script		
	</body>
</html>