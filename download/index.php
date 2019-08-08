<?php
session_start();
	include('header.php');
	
?>
<html>
	<body>
		<div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
					<table class="table" id="dataTables-example">
						<thead>
							<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Deskripsi</th>
						</tr>
						</thead>
						<?php
							include('../koneksi.php');
							$sql = "SELECT id_file, file, file_desc, link, lokasi FROM storage";
							$res = $conn->query($sql);

							while($row = $res->fetch_assoc())
							{
								if($row['link']!=null)
								{
									$link = $row['link'];
								}
								else $link = $row['lokasi'];
								echo '<tr>';
								echo '<td>'.$row['id_file'].'</td>';
								echo '<td><a href="'.$link.'" target="_blank" style="color: #000000;">'.$row['file'].'</a></td>';
								echo '<td>'.$row['file_desc'].'</td>';
								echo '</tr>';
							}
						?>
					</table>
				</div>
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
            <p>Merupakan...</p>
          </div>


          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontak</h4>
            <p>
              Laurentius Kuncoro <br>
              Koordinator KP<br>
              Fakultas Informatika Universitas Kristen Duta Wacana<br>
              <strong>Nomor Handphone:</strong> ... <br>
              <strong>Email:</strong> ... <br>
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
	</body>
</html>