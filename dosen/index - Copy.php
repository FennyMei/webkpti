<?php
  include('header.php');
?>
<body>

<?php
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kpukdw');
$searchlamaran = "";
  ?>
<div class="container">
<form class="col-md-3 input-group pull-right" style="margin-top: -80px;" method="post" enctype="multipart/form-data">
        <span class="icon"><a onclick="psSearch();" class="searchbutton"><i class="fa fa-search"></i></a></span>
        <input type="text" type="txtSearch" id="id_search" class="searchtext" placeholder="Pencarian"
        maxlength="200">
        </form>
        <br>
        <br>

  <div class="divider" id="section1"></div>
  <div class="row">
  <?php

// find out how many rows are in the table 
$sql = mysql_query("SELECT count(l.nim) from mahasiswa m ,lamaran l, perusahaan p where l.id_perusahaan = p.id_perusahaan and m.dosen_pembimbing = '$asd'");
$r = mysql_fetch_row($sql);
$numrows = $r[0];

// number of rows to show per page
$rowsperpage = 1;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db 
$result = mysql_query("SELECT l.nim, l.nama, p.nama_perusahaan, p.cp_perusahaan, p.telpon_perusahaan, l.job_desc, l.tipe from mahasiswa m ,lamaran l, perusahaan p where l.id_perusahaan = p.id_perusahaan and m.dosen_pembimbing = '$asd' LIMIT $offset, $rowsperpage");
$no =1;
  if(mysql_num_rows($result)>0){
echo "<table class = 'styletable'>
  <tr>
    <th>Nomor</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Nama Perusahaan</th>
    <th>Contact Person Perusahaan</th>
    <th>Nomor Telpon Perusahaan</th>
    <th>Deskripsi Pekerjaan</th>
    <th>Tipe</th>
  </tr> ";

// while there are rows to be fetched...
while($data = mysql_fetch_array($result)){
  ?>
    
  <tr>
    <td><font face=tahoma size=2><?php echo $no;?></font></td>
    <td><font face=tahoma size=2><?php echo $data['nim']; ?></font></td>
    <td><font face=tahoma size=2><?php echo $data['nama']; ?></font></td>
    <td><font face=tahoma size=2><?php echo $data['nama_perusahaan']; ?></font></td>
    <td><font face=tahoma size=2><?php echo $data['cp_perusahaan']; ?></font></td>
    <td><font face=tahoma size=2><?php echo $data['telpon_perusahaan']; ?></font></td>
    <td><div><textarea rows="4" cols="40" style="background:transparent; border:none; height:100%;" disabled><?php echo ($data['job_desc']); ?></textarea></div></td>
    <td><font face=tahoma size=2><?php echo $data['tipe']; ?></font></td>
  </tr>
  <?php
    $no++;    
  }// end while
echo "</table>";
}
?>
  
<?php 
/******  build the pagination links ******/
// range of num links to show
$range = 3;
if($totalpages > 0){
?>
<div style="margin-left:60px ; margin-top:20px">
<?php
// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " [<b>$x</b>] ";
      // if not current page...
      } else {
         // make it a link
         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
      } // end else
   } // end if 
} // end for
                 
// if not on last page, show forward and last page links        

if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
   // echo forward link for lastpage
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a> ";
} // end if
}
/****** end build pagination links ******/
?>
</div>
</div>
</div><!--/container-->
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

</body>

