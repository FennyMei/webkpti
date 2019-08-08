<?php
	session_start();
	require_once("../koneksi.php");

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
				$target_dir_foto = "../uploads/foto_mahasiswa/";
				$imageFileType_tn = strtolower(pathinfo(basename($_FILES["transkrip_nilai"]["name"]),PATHINFO_EXTENSION));
				$imageFileType_rmk = strtolower(pathinfo(basename($_FILES["rencana_matkul"]["name"]),PATHINFO_EXTENSION));
				$imageFileType_foto = strtolower(pathinfo(basename($_FILES["foto_lampiran"]["name"]),PATHINFO_EXTENSION));
				echo $imageFileType_rmk;

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

				// Allow certain file formats
				// if($imageFileType_tn != "pdf" || $imageFileType_rmk != "pdf") {
				// 	$uploadOk = 0;
				// }

					//insert data
					$nama = $_POST['nama'];
					$nim = $_POST['nim'];
					$telp = $_POST['telp'];
					$sks = $_POST['sks'];
					if($_POST['kpa']!="other")
					{
						//KP A

						$id_perusahaan = $_POST['kpa'];
						$sql2 = "SELECT status FROM perusahaan WHERE id_perusahaan='".$id_perusahaan."'";
						$type = $conn->query($sql2);
						$type = $type->fetch_assoc();
						$type = $type['status'];



						$id_lamaran = $type.$year.$month;

						$sql3 = "SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE id_lamaran LIKE '".$id_lamaran."%'";
						$res = $conn->query($sql3);
						$res = $res->fetch_assoc();
						$res = $res['num'];

						$id_lamaran = $id_lamaran.str_pad(($res+1), 4, "0", STR_PAD_LEFT);
						$g_id = $_SESSION['id'];
					
					
						// path/to/tn_00000nim_0000000id.jpg
						$file_tn = "tn_".$_POST['nim']."_".$id_lamaran.".".$imageFileType_tn;
						$file_rmk = "rmk_".$_POST['nim']."_".$id_lamaran.".".$imageFileType_rmk;
						$file_foto = "foto_".$_POST['nim']."_".$id_lamaran.".".$imageFileType_foto;
						$target_file_transkrip_nilai = $target_dir_transkrip_nilai.$file_tn;
						$target_file_rencana_matkul = $target_dir_rencana_matkul.$file_rmk;
						$target_file_foto = $target_dir_foto.$file_foto;
						

						$sqlInsert = "INSERT INTO lamaran(id_lamaran,google_id,nim,nama,no_kontak,sks,id_perusahaan,startdate,enddate,job_desc,tipe,transkrip_nilai,rencana_mata_kuliah,foto_mahasiswa)
						VALUES('$id_lamaran','$g_id','$nim','$nama','$telp','$sks','$id_perusahaan','$startdate','$enddate','$jobdesc','$type','$file_tn','$file_rmk','$file_foto')";
						$conn->query($sqlInsert);
					}
					else
					{
						$type = "B";


						$id_lamaran = $type.$year.$month;

						$sql3 = "SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE id_lamaran LIKE '".$id_lamaran."%'";
						$res = $conn->query($sql3);
						$res = $res->fetch_assoc();
						$res = $res['num'];

						$id_lamaran = $id_lamaran.str_pad(($res+1), 4, "0", STR_PAD_LEFT);
						$g_id = $_SESSION['id'];
					
						// path/to/tn_00000nim_0000000id.jpg
						$file_tn = "tn_".$_POST['nim']."_".$id_lamaran.".".$imageFileType_tn;
						$file_rmk = "rmk_".$_POST['nim']."_".$id_lamaran.".".$imageFileType_rmk;
						$file_foto = "foto_".$_POST['nim']."_".$id_lamaran.".".$imageFileType_foto;
						$target_file_transkrip_nilai = $target_dir_transkrip_nilai.$file_tn;
						$target_file_rencana_matkul = $target_dir_rencana_matkul.$file_rmk;
						$target_file_foto = $target_dir_foto.$file_foto;
						// if(!is_dir($target_dir_rencana_matkul) || !is_dir($target_dir_transkrip_nilai) || !is_dir($target_dir_foto)){
						// 	mkdir($target_dir_rencana_matkul,"0777",true);
						// 	mkdir($target_dir_transkrip_nilai,"0777",true);
						// 	mkdir($target_dir_foto,"0777",true);

						// 	move_uploaded_file($_FILES["transkrip_nilai"]["tmp_name"], $target_file_transkrip_nilai);
						// 	move_uploaded_file($_FILES["rencana_matkul"]["tmp_name"], $target_file_rencana_matkul);
						// 	move_uploaded_file($_FILES["foto_lampiran"]["tmp_name"], $target_file_foto);
						// }
						// else{
						// 	move_uploaded_file($_FILES["transkrip_nilai"]["tmp_name"], $target_file_transkrip_nilai);
						// 	move_uploaded_file($_FILES["rencana_matkul"]["tmp_name"], $target_file_rencana_matkul);
						// 	move_uploaded_file($_FILES["foto_lampiran"]["tmp_name"], $target_file_foto);
						// }


						
						$sql2 = "INSERT INTO perusahaan(nama_perusahaan, cp_perusahaan, telpon_perusahaan, alamat_perusahaan, status, aktif, list, provinsi)
						VALUES('".$_POST['kpb_nama']."','".$_POST['kpb_cp']."','".$_POST['kpb_telp']."','".$_POST['kpb_alamat']."','B','T','PENDING', '".$_POST['kpb_provinsi']."')";
						$conn->query($sql2);
						$sql = "SELECT id_perusahaan FROM perusahaan ORDER BY id_perusahaan DESC";
						$id_perusahaan = $conn->query($sql);
						$id_perusahaan = $id_perusahaan->fetch_assoc();
						$id_perusahaan = $id_perusahaan['id_perusahaan'];
						
						$sqlInsert = "INSERT INTO lamaran(id_lamaran,google_id,nim,nama,no_kontak,sks,id_perusahaan,startdate,enddate,job_desc,tipe,transkrip_nilai,rencana_mata_kuliah,foto_mahasiswa)
						VALUES('$id_lamaran','$g_id','$nim','$nama','$telp','$sks','$id_perusahaan','$startdate','$enddate','$jobdesc','$type','$file_tn','$file_rmk','$file_foto')";
						$conn->query($sqlInsert);
					}

					if(!is_dir($target_dir_rencana_matkul) || !is_dir($target_dir_transkrip_nilai) || !is_dir($target_dir_foto)){
							mkdir($target_dir_rencana_matkul,"0777",true);
							mkdir($target_dir_transkrip_nilai,"0777",true);
							mkdir($target_dir_foto,"0777",true);

							move_uploaded_file($_FILES["transkrip_nilai"]["tmp_name"], $target_file_transkrip_nilai);
							move_uploaded_file($_FILES["rencana_matkul"]["tmp_name"], $target_file_rencana_matkul);
							move_uploaded_file($_FILES["foto_lampiran"]["tmp_name"], $target_file_foto);
						}
						else{
							move_uploaded_file($_FILES["transkrip_nilai"]["tmp_name"], $target_file_transkrip_nilai);
							move_uploaded_file($_FILES["rencana_matkul"]["tmp_name"], $target_file_rencana_matkul);
							move_uploaded_file($_FILES["foto_lampiran"]["tmp_name"], $target_file_foto);
						}

						echo $target_file_transkrip_nilai;
						echo $target_file_rencana_matkul;
            }
				
		}
		
	}
	
	header("location: ..\index.php");
?>