<?php
include('../koneksi.php');
mysql_query("DROP TABLES gurpiket,kehadiran,kelas,siswa,walikel");//menghapus seluruh tabel kecuali tabel admin
$_SESSION['hapus']="HAPUS";
header("location:../backup.php");//mengalihkan ke halaman backup kembali
?>