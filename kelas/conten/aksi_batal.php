<?php
include('../../koneksi.php');
$id=$_GET['id'];
mysql_query("DELETE FROM `kehadiran` WHERE id_kelas='$id' AND tgl='$harini'");
header("location:../index.php?halaman=kehadiran");
?>