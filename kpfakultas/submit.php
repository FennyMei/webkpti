<?php
	session_start();
	require_once("../koneksi.php");

	//kirim ke database
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if($_GET['type']=="kpfakultas")
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
				$target_dir_foto = "../uploads/foto_mahasiswa/";
				$imageFileType_tn = strtolower(pathinfo(basename($_FILES["transkrip_nilai"]["name"]),PATHINFO_EXTENSION));
				$imageFileType_rmk = strtolower(pathinfo(basename($_FILES["rencana_matkul"]["name"]),PATHINFO_EXTENSION));
				$imageFileType_foto = strtolower(pathinfo(basename($_FILES["foto_lampiran"]["name"]),PATHINFO_EXTENSION));

				// Allow certain file formats
				if($imageFileType_tn != "pdf" || $imageFileType_rmk != "pdf") {
					$uploadOk = 0;
				}
				

					//insert data
					$nama = $_POST['nama'];
					$nim = $_POST['nim'];
					$telp = $_POST['telp'];
					$sks = $_POST['sks'];

					echo $_POST['jeniskp'];
					
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
						$type = "D";

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
						$type = "E";

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
					$file_foto = "foto_".$_POST['nim']."_".$id_lamaran.".".$imageFileType_foto;
					$target_file_transkrip_nilai = $target_dir_transkrip_nilai.$file_tn;
					$target_file_rencana_matkul = $target_dir_rencana_matkul.$file_rmk;
					$target_file_foto = $target_dir_foto.$file_foto;

					if($_POST['jeniskp']=='kpc'){
						$sql = "INSERT INTO lamaran(id_lamaran,google_id,nim,nama,no_kontak,sks,id_perusahaan,kpc1,kpc2,startdate,enddate,job_desc,kpc1_jd,kpc2_jd,desc_diri,keahlian,mini_project,tipe,transkrip_nilai,rencana_mata_kuliah,foto_mahasiswa)
						VALUES('$id_lamaran','$g_id','$nim','$nama','$telp','$sks','$id_perusahaan','$kpc1','$kpc2','$startdate','$enddate','$jobdesc','$kpc1_jd','$kpc2_jd','$desc','$tools','$miniproject','C','$file_tn','$file_rmk','$file_foto')";
						$conn->query($sql);
					}
					if($_POST['jeniskp']=='kpd'){
						$sql = "INSERT INTO lamaran(id_lamaran,google_id,nim,nama,no_kontak,sks,id_perusahaan,kpc1,kpc2,startdate,enddate,job_desc,kpc1_jd,kpc2_jd,desc_diri,keahlian,mini_project,tipe,transkrip_nilai,rencana_mata_kuliah,foto_mahasiswa)
						VALUES('$id_lamaran','$g_id','$nim','$nama','$telp','$sks','$id_perusahaan','$kpc1','$kpc2','$startdate','$enddate','$jobdesc','$kpc1_jd','$kpc2_jd','$desc','$tools','$miniproject','D','$file_tn','$file_rmk','$file_foto')";
						$conn->query($sql);
					}
					if($_POST['jeniskp']=='kpe'){
						$sql = "INSERT INTO lamaran(id_lamaran,google_id,nim,nama,no_kontak,sks,id_perusahaan,kpc1,kpc2,startdate,enddate,job_desc,kpc1_jd,kpc2_jd,desc_diri,keahlian,mini_project,tipe,transkrip_nilai,rencana_mata_kuliah,foto_mahasiswa)
						VALUES('$id_lamaran','$g_id','$nim','$nama','$telp','$sks','$id_perusahaan','$kpc1','$kpc2','$startdate','$enddate','$jobdesc','$kpc1_jd','$kpc2_jd','$desc','$tools','$miniproject','E','$file_tn','$file_rmk','$file_foto')";
						$conn->query($sql);
					}
					else{
						$sql = "INSERT INTO lamaran(id_lamaran,google_id,nim,nama,no_kontak,sks,id_perusahaan,startdate,enddate,job_desc,desc_diri,keahlian,mini_project,tipe,transkrip_nilai,rencana_mata_kuliah,foto_mahasiswa)
						VALUES('$id_lamaran','$g_id','$nim','$nama','$telp','$sks','$id_perusahaan','$startdate','$enddate','$jobdesc','$desc','$tools','$miniproject','$type','$file_tn','$file_rmk','$file_foto')";
						$conn->query($sql);
					}

					move_uploaded_file($_FILES["transkrip_nilai"]["tmp_name"], $target_file_transkrip_nilai);
					move_uploaded_file($_FILES["rencana_matkul"]["tmp_name"], $target_file_rencana_matkul);
					move_uploaded_file($_FILES["foto_lampiran"]["tmp_name"], $target_file_foto);
				
			}
		}
	}
	
	header("location: ..\index.php");
?>