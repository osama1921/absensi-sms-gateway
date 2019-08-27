<?php 
error_reporting(0);
mysql_connect("localhost","root","");
mysql_select_db("absen");
session_start();
include('i.php');
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
if($hostname=="osama-PC"&&$macp=="02-BB-AE-16-00-82"){
if (!isset($_SESSION['username'])){
  $_SESSION['msg']="Untuk Mengakses Halaman Administrator Anda Harus Login Terlebih Dahulu";
header("Location:../login/login.php");
}
//Menghasilkan backup DB
function backupDatabaseTables($dbHost,$dbUsername,$dbPassword,$dbName){
  //menghubungkan & memilih DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
 //Mendapatkan semua Table
    $tables="gurpiket,kehadiran,kelas,siswa,walikel";
    $table="gurpiket,kehadiran,kelas,siswa,walikel";
 if($tables == 'gurpiket,kehadiran,kelas,siswa,walikel'){
  $tables = array('gurpiket','kehadiran','kelas','siswa','walikel');
  $result = $db->query("SHOW TABLES");
  while($row = $result->fetch_row()){
   $tables[''] = $row[0];
  }
 }else{
  $tables = is_array($tables)?$tables:explode(',',$tables);
 }
 //Loop melalui Table
 foreach($tables as $table){
  $result = $db->query("SELECT * FROM $table");
  $numColumns = $result->field_count;
        $result2 = $db->query("SHOW CREATE TABLE $table");
        $row2 = $result2->fetch_row();
  $return .= "\n\n".$row2[1].";\n\n";
  for($i = 0; $i < $numColumns; $i++){
   while($row = $result->fetch_row()){
    $return .= "INSERT INTO $table VALUES(";
    for($j=0; $j < $numColumns; $j++){
     $row[$j] = addslashes($row[$j]);
     $row[$j] = ereg_replace("\n","\\n",$row[$j]);
     if (isset($row[$j])) { $return .= '"'.$row[$j].'"' ; } else { $return .= '""'; }
     if ($j < ($numColumns-1)) { $return.= ','; }
    }
    $return .= ");\n";
   }
  }
  $return .= "\n\n\n";
 }
 //simpan file
 $handle = fopen('../tmp/Backup-SiABSis'.date('d-m-y').'.sql','w+');
 fwrite($handle,$return);
 fclose($handle);
}
}else{
  header("Location:000.html");
}

$siswa=mysql_num_rows(mysql_query("SELECT * FROM siswa"));
$wali=mysql_num_rows(mysql_query("SELECT * FROM walikel"));
$kelas=mysql_num_rows(mysql_query("SELECT * FROM kelas"));
$piket=mysql_num_rows(mysql_query("SELECT * FROM gurpiket"));
$kehadiran=mysql_num_rows(mysql_query("SELECT * FROM kehadiran"));
?>


