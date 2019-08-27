<?php
include('../koneksi.php');
$id=$_POST['id'];//mengambil id
$nama=$_POST['nama'];//mengambil nama
$Pikethari=$_POST['Pikethari'];//mengambil hari piket
$status=$_POST['status'];

if(isset($_POST['submit'])){
    mysql_query("UPDATE `gurpiket` SET `nama_gurpik`='$nama',`status`='$status',`pikethari`='$Pikethari' WHERE `id_gurpik`='$id'") or die(mysql_error());//proses mengupdate data ke database ke tabel gurpiket
    $_SESSION['edit']="success";//memberitahu kalau success
    header("location:../piket.php");//di alihkan ke halaman piket.php
    }
?>