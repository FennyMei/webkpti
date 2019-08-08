<?php
    session_start();
    require_once("koneksi.php");

    //kirim ke database
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["submit"])) {
        $sql="SELECT id_lamaran, nim FROM lamaran WHERE google_id='".$_SESSION['id']."' ORDER BY tanggal_input DESC";
        $res = $conn->query($sql);
        $res = $res->fetch_assoc();
        
        // Upload file
        $sql="SELECT COUNT(id_lamaran) AS num FROM lamaran WHERE google_id='".$_SESSION['id']."'";
        $submission = $conn->query($sql);
        $submission = $submission->fetch_assoc();
        $submission = $submission['num'];

        // Create Path
        $target_dir = "uploads/surat_keterangan/";
        $imageFileType = strtolower(pathinfo(basename($_FILES["file_sk"]["name"]),PATHINFO_EXTENSION));
        // path/to/sk_00000nim_0000000id.jpg
        $file_sk = "sk_".$res['nim']."_".$res['id_lamaran'].".".$imageFileType;
        $target_file = $target_dir."".$file_sk;
        $uploadOk = 1;

        // Check if image file is a actual image or fake image
        

        $target_dir2 = "uploads/foto_mahasiswa/";
        $imageFileType2 = strtolower(pathinfo(basename($_FILES["file_img"]["name"]),PATHINFO_EXTENSION));
        // path/to/sk_00000nim_0000000id.jpg
        $file_img = "sk_".$res['nim']."_".$res['id_lamaran'].".".$imageFileType2;
        $target_file_img = $target_dir2."".$file_img;
        

        // Allow certain file formats
        // if($imageFileType != "pdf") {
        //     $uploadOk = 0;
        // }

            if(!is_dir($target_dir)){
            mkdir($target_dir,"0777",true);
            $file_sk = "sk_".$res['nim']."_".$res['id_lamaran'].".".$imageFileType;
            move_uploaded_file($_FILES["file_sk"]["tmp_name"], $target_file);

            $file_img = "sk_".$res['nim']."_".$res['id_lamaran'].".".$imageFileType2;
            move_uploaded_file($_FILES["file_img"]["tmp_name"], $target_file_img);
            }else{
                $file_sk = "sk_".$res['nim']."_".$res['id_lamaran'].".".$imageFileType;
                 move_uploaded_file($_FILES["file_sk"]["tmp_name"], $target_file);

                 $file_img = "sk_".$res['nim']."_".$res['id_lamaran'].".".$imageFileType2;
                 move_uploaded_file($_FILES["file_img"]["tmp_name"], $target_file_img);
            }
            $sql="UPDATE lamaran SET status_registrasi = 'PENDING', surat_keterangan = '".$file_sk."' WHERE id_lamaran = '".$res['id_lamaran']."'";
            $conn->query($sql);
        }
    }
    
    header("location: index.php");
?>