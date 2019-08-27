<?php
include('../../koneksi.php');
session_start();
$id=$_GET['id'];
$query=mysql_query("SELECT * FROM `siswa` WHERE id_kelas='$id' ORDER BY nama_siswa ASC");
while($data=mysql_fetch_array($query)){ 
$NIS=$data['NIS'];
$nama_siswa=$data['nama_siswa'];
$id_kelas=$data['id_kelas'];

$ket=$_POST[$NIS];
if($ket=="Alpa"){
	$Alfa=1;
	$Hadir=0;
	$Sakit=0;
	$izin=0;
	$status="Tidak Terkirim";
} elseif ($ket=="Hadir") {
	$Hadir=1;
	$Alfa=0;
	$Sakit=0;
	$izin=0;
	$status="Tidak Perlu Dikirim";
} elseif($ket=="Izin"){
	$izin=1;
	$Alfa=0;
	$Hadir=0;
	$Sakit=0;
	$status="Tidak Terkirim";
} elseif ($ket=="Sakit") {
	$Sakit=1;
	$Alfa=0;
	$Hadir=0;
	$izin=0;
	$status="Tidak Terkirim";
}
mysql_query("INSERT INTO `kehadiran`(`id_absen`, `NIS`, `nama_siswa`, `tgl`, `id_kelas`, `Hadir`, `Alfa`, `Izin`, `Sakit`, `status`) VALUES (null,'$NIS','$nama_siswa','$harini','$id_kelas','$Hadir','$Alfa','$izin','$Sakit','$status')");
header("location:../index.php?halaman=kehadiran");
}
$query=mysql_query("SELECT * FROM `kehadiran` WHERE `tgl`='$harini'");
$cek=mysql_num_rows($query);
$_SESSION['tgl']=$cek;
$_SESSION['msg']="success";
?>
