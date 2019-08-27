<?php
include('../koneksi.php');
backupDatabaseTables("localhost","root","","absen");//memanggil function backup 
date_default_timezone_set("asia/jakarta");
$date=date('d-m-y');//jam
$filename = "Backup-SiABSis".$date.".sql";
$direktori = "../tmp/";
if(file_exists($direktori.$filename)){//proses download
    $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    switch($file_extension){
      case "sql": $ctype="application/sql"; break;
      default: $ctype="application/octet-stream";
    }
    if ($file_extension=='php'){
      echo "<h1>Access forbidden!</h1>
        <p>Please contact Administrator.</p>";
      exit;
    }
    else{
      header("Content-Type: octet/stream");
      header("Pragma: private"); 
      header("Expires: 0");
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      header("Cache-Control: private",false); 
      header("Content-Type: $ctype");
      header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
      header("Content-Transfer-Encoding: binary");
      header("Content-Length: ".filesize($direktori.$filename));
      readfile("$direktori$filename");
      exit();   
    }
}else{  echo "<h1>Access forbidden!</h1>
          <p>Please contact Administrator.</p>";
    exit;
}
?>
