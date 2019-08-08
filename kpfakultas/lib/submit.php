<?php
	session_start();
	require_once("koneksi.php");

	//kirim ke database
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if($_GET['type']=="kpreguler")
		{
            if(isset($_POST["submit"])) {
				// Upload file
				$sql="SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE google_id='".$_SESSION['id']."'";
				$submission = $conn->query($sql);
				$submission = $submission->fetch_assoc();
				$submission = $submission['num'] + 1;
				
				// Create Path
				$target_dir_transkrip_nilai = "../uploads/transkrip_nilai/";
				$target_dir_rencana_matkul = "../uploads/rencana_mata_kuliah/";
				$imageFileType_tn = strtolower(pathinfo(basename($_FILES["transkrip_nilai"]["name"]),PATHINFO_EXTENSION));
				$imageFileType_rmk = strtolower(pathinfo(basename($_FILES["rencana_matkul"]["name"]),PATHINFO_EXTENSION));
				
            


				// Allow certain file formats
				if($imageFileType_tn != "pdf" || $imageFileType_rmk != "pdf") {
					$uploadOk = 0;
				}

					//insert data
					$nama = $_POST['nama'];
					$nim = $_POST['nim'];
					$telp = $_POST['telp'];
					$sks = $_POST['sks'];
					if($_POST['kpa']!="other")
					{
						//KP A
						$id_perusahaan = $_POST['kpa'];
						$sql = "SELECT status FROM perusahaan WHERE id_perusahaan='".$id_perusahaan."'";
						$type = $conn->query($sql);
						$type = $type->fetch_assoc();
						$type = $type['status'];
					}
					else
					{
						//KP B
						//tambah id_perusahaan
						$sql = "INSERT INTO perusahaan(nama_perusahaan, cp_perusahaan, telpon_perusahaan, alamat_perusahaan, status, aktif, list)
						VALUES('".$_POST['kpb_nama']."','".$_POST['kpb_cp']."','".$_POST['kpb_telp']."','".$_POST['kpb_alamat']."','B','T','PENDING')";
						$conn->query($sql);
						$sql = "SELECT id_perusahaan FROM perusahaan ORDER BY id_perusahaan DESC";
						$id_perusahaan = $conn->query($sql);
						$id_perusahaan = $id_perusahaan->fetch_assoc();
						$id_perusahaan = $id_perusahaan['id_perusahaan'];
						$type = "B";
					}
					$startdate = $_POST['startmonth'].$_POST['startyear'];
					$enddate = $_POST['endmonth'].$_POST['endyear'];
					
					$jobdesc = $_POST['jobdesc'];
					$stat_pengajuan = "PENDING";

					$month = intval(date("n"));
					$year = date("y");

					if($month>=1&&$month<=6) //Genap
					{
						$month = 2;
						$year = ($year-1).($year);
					}
					else //Gasal
					{
						$month = 1;
						$year = ($year).($year+1);
					}

					$id_lamaran = $type.$year.$month;

					$sql = "SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE id_lamaran LIKE '".$id_lamaran."%'";
					$res = $conn->query($sql);
					$res = $res->fetch_assoc();
					$res = $res['num'];

					$id_lamaran = $id_lamaran.str_pad(($res+1), 4, "0", STR_PAD_LEFT);
					$g_id = $_SESSION['id'];
					
					// path/to/tn_00000nim_0000000id.jpg
					$file_tn = "tn_".$_POST['nim']."_".$id_lamaran.".".$imageFileType_tn;
					$file_rmk = "rmk_".$_POST['nim']."_".$id_lamaran.".".$imageFileType_rmk;
					$target_file_transkrip_nilai = $target_dir_transkrip_nilai.$file_tn;
					$target_file_rencana_matkul = $target_dir_rencana_matkul.$file_rmk;

					$sql = "INSERT INTO lamaran(id_lamaran,google_id,nim,nama,no_kontak,sks,id_perusahaan,startdate,enddate,job_desc,tipe,transkrip_nilai,rencana_mata_kuliah)
					VALUES('$id_lamaran','$g_id','$nim','$nama','$telp','$sks','$id_perusahaan','$startdate','$enddate','$jobdesc','$type','$file_tn','$file_rmk')";
					$conn->query($sql);
					move_uploaded_file($_FILES["transkrip_nilai"]["tmp_name"], $target_file_transkrip_nilai);
					move_uploaded_file($_FILES["rencana_matkul"]["tmp_name"], $target_file_rencana_matkul);
				
            }
		}
		else if($_GET['type']=="kpfakultas")
		{
			if(isset($_POST["submit"])) {
				// Upload file
				$sql="SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE google_id='".$_SESSION['id']."'";
				$submission = $conn->query($sql);
				$submission = $submission->fetch_assoc();
				$submission = $submission['num'] + 1;
				
				// Create Path
				$target_dir_transkrip_nilai = "../uploads/transkrip_nilai/";
				$target_dir_rencana_matkul = "../uploads/rencana_mata_kuliah/";
				$imageFileType_tn = strtolower(pathinfo(basename($_FILES["transkrip_nilai"]["name"]),PATHINFO_EXTENSION));
				$imageFileType_rmk = strtolower(pathinfo(basename($_FILES["rencana_matkul"]["name"]),PATHINFO_EXTENSION));


				// Allow certain file formats
				if($imageFileType_tn != "pdf" || $imageFileType_rmk != "pdf") {
					$uploadOk = 0;
				}
				

					//insert data
					$nama = $_POST['nama'];
					$nim = $_POST['nim'];
					$telp = $_POST['telp'];
					$sks = $_POST['sks'];
					
					if($_POST['jeniskp']=='kpc'){
						//KP C
							$sql="SELECT id_perusahaan, job_desc FROM joblist WHERE id_job='".$_POST['kpc_1']."'";
							$res=$conn->query($sql);
							$res=$res->fetch_assoc();

							$id_perusahaan = $res['id_perusahaan'];
							$jobdesc = $res['job_desc'];
							
							if($_POST['kpc_2']!="none")
							{
								$sql="SELECT id_perusahaan, job_desc FROM joblist WHERE id_job='".$_POST['kpc_2']."'";
								$res=$conn->query($sql);
								$res=$res->fetch_assoc();
								
								$kpc1 = $res['id_perusahaan'];
								$kpc1_jd = $res['job_desc'];
								if($_POST['kpc_3']!="none")
								{
									$sql="SELECT id_perusahaan, job_desc FROM joblist WHERE id_job='".$_POST['kpc_3']."'";
									$res=$conn->query($sql);
									$res=$res->fetch_assoc();

									$kpc2 = $res['id_perusahaan'];
									$kpc2_jd = $res['job_desc'];
								}
								else
								{
									$kpc2=-1;
									$kpc2_jd=-1;
								}
							}
							else
							{
								$kpc1=-1;
								$kpc1_jd=-1;
								$kpc2=-1;
								$kpc2_jd=-1;
							}
							$type = "C";


					}
					else if($_POST['jeniskp']=='kpd'){
						$id_perusahaan = $_POST['kpd'];
						$sql = "SELECT status FROM perusahaan WHERE id_perusahaan='".$id_perusahaan."'";
						$type = $conn->query($sql);
						$type = $type->fetch_assoc();
						$type = $type['status'];

						$sql="SELECT job_desc FROM joblist WHERE id_perusahaan='".$id_perusahaan."'";
							$res=$conn->query($sql);
							$res=$res->fetch_assoc();
							$jobdesc = $res['job_desc'];
						
					}
					else{
						$id_perusahaan = $_POST['kpe'];
						$sql = "SELECT status FROM perusahaan WHERE id_perusahaan='".$id_perusahaan."'";
						$type = $conn->query($sql);
						$type = $type->fetch_assoc();
						$type = $type['status'];

						$sql="SELECT job_desc FROM joblist WHERE id_perusahaan='".$id_perusahaan."'";
							$res=$conn->query($sql);
							$res=$res->fetch_assoc();
							$jobdesc = $res['job_desc'];
					}
					
					
					$startdate = $_POST['startmonth'].$_POST['startyear'];
					$enddate = $_POST['endmonth'].$_POST['endyear'];
					
					$stat_pengajuan = "PENDING";

					$month = intval(date("n"));
					$year = date("y");

					if($month>=1&&$month<=6) //Genap
					{
						$month = 2;
						$year = ($year-1).($year);
					}
					else //Gasal
					{
						$month = 1;
						$year = ($year).($year+1);
					}

					$id_lamaran = $type.$year.$month;

					$sql = "SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE id_lamaran LIKE '".$id_lamaran."%'";
					$res = $conn->query($sql);
					$res = $res->fetch_assoc();
					$res = $res['num'];

					$id_lamaran = $id_lamaran.str_pad(($res+1), 4, "0", STR_PAD_LEFT);
					$g_id = $_SESSION['id'];
					
					$desc = addslashes($_POST['desc']);
					$tools = addslashes($_POST['tools']);
					$miniproject = addslashes($_POST['mini_project']);
					
					// path/to/tn_00000nim_0000000id.jpg
					$file_tn = "tn_".$_POST['nim']."_".$id_lamaran.".".$imageFileType_tn;
					$file_rmk = "rmk_".$_POST['nim']."_".$id_lamaran.".".$imageFileType_rmk;
					$target_file_transkrip_nilai = $target_dir_transkrip_nilai.$file_tn;
					$target_file_rencana_matkul = $target_dir_rencana_matkul.$file_rmk;

					if($_POST['jeniskp']=='kpc'){
						$sql = "INSERT INTO lamaran(id_lamaran,google_id,nim,nama,no_kontak,sks,id_perusahaan,kpc1,kpc2,startdate,enddate,job_desc,kpc1_jd,kpc2_jd,desc_diri,keahlian,mini_project,tipe,transkrip_nilai,rencana_mata_kuliah)
						VALUES('$id_lamaran','$g_id','$nim','$nama','$telp','$sks','$id_perusahaan','$kpc1','$kpc2','$startdate','$enddate','$jobdesc','$kpc1_jd','$kpc2_jd','$desc','$tools','$miniproject','$type','$file_tn','$file_rmk')";
						$conn->query($sql);
					}
					else{
						$sql = "INSERT INTO lamaran(id_lamaran,google_id,nim,nama,no_kontak,sks,id_perusahaan,startdate,enddate,job_desc,desc_diri,keahlian,mini_project,tipe,transkrip_nilai,rencana_mata_kuliah)
						VALUES('$id_lamaran','$g_id','$nim','$nama','$telp','$sks','$id_perusahaan','$startdate','$enddate','$jobdesc','$desc','$tools','$miniproject','$type','$file_tn','$file_rmk')";
						$conn->query($sql);
					}

					move_uploaded_file($_FILES["transkrip_nilai"]["tmp_name"], $target_file_transkrip_nilai);
					move_uploaded_file($_FILES["rencana_matkul"]["tmp_name"], $target_file_rencana_matkul);
					
				
			}
		}
	}
	
	header("location: ..\index.php");
?>