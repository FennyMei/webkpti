<?php
if(!empty($_GET['tn_id'])){
	$fileName= $_GET['tn_id'];
	$filePath='../uploads/transkrip_nilai/'.$fileName;
	if(!empty($fileName) && file_exists($filePath)){
		header('Cache-Control: public');
		header('Content-Description: File Transfer');
		header("Content-Disposition: attachment; filename=$fileName");
		header('Content-Type: application/zip');
   		header('Content-Transfer-Encoding: binary');
   		readfile($filePath); //showing the path to the server where the file is to be download
    	exit;
	}
}
else if(!empty($_GET['rmk_id'])){
	$fileName= $_GET['rmk_id'];
	$filePath='../uploads/rencana_mata_kuliah/'.$fileName;
	if(!empty($fileName) && file_exists($filePath)){
		header('Cache-Control: public');
		header('Content-Description: File Transfer');
		header("Content-Disposition: attachment; filename=$fileName");
		header('Content-Type: application/zip');
   		header('Content-Transfer-Encoding: binary');
   		readfile($filePath); //showing the path to the server where the file is to be download
    	exit;
	}
}

else if(!empty($_GET['sk_id'])){
	$fileName= $_GET['sk_id'];
	$filePath='../uploads/surat_keterangan/'.$fileName;
	if(!empty($fileName) && file_exists($filePath)){
		header('Cache-Control: public');
		header('Content-Description: File Transfer');
		header("Content-Disposition: attachment; filename=$fileName");
		header('Content-Type: application/zip');
   		header('Content-Transfer-Encoding: binary');
   		readfile($filePath); //showing the path to the server where the file is to be download
    	exit;
	}
}
    
   
    
?>