<?php
include('../koneksi.php');
$id=$_POST['id'];
$nama=$_POST['nama'];
$jk=$_POST['jk'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$idkel=$_POST['idkel'];

if(isset($_POST['submit'])){
    mysql_query("UPDATE `walikel` SET `nama_guru`='$nama',`jk`='$jk',`username`='user',`password`='$pass',`id_kelas`='$idkel' WHERE `id_wali`='$id'") or die(mysql_error());
    mysql_query("UPDATE `kelas` SET `nama_walikel`='$nama' WHERE `id_kelas`='$idkel'");
    $_SESSION['edit']="success";
    header("location:../walikel.php");
    }
?>