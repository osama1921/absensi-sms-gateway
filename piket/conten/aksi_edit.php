<?php
include('../../koneksi.php');
$id=$_POST['id'];
$nama=$_POST['nama'];
$ket=$_POST['ket'];
if (isset($_POST['submit'])) {
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
	mysql_query("UPDATE `kehadiran` SET `Hadir`='$Hadir',`Alfa`='$Alfa',`Izin`='$izin',`Sakit`='$Sakit',`status`='$status' WHERE `id_absen`='$id'");
	header("location:../index.php?halaman=kehadiran&msg=success&nama".$nama."");
}
?>