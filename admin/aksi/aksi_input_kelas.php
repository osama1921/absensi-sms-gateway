<?php
include('../koneksi.php');
$id=$_POST['id'];
$nama=$_POST['nama'];
$jur=$_POST['jurusan'];
$user=$_POST['user'];
$pass=$_POST['pass'];

if(isset($_POST['submit'])){
    mysql_query("INSERT INTO `kelas`(`id_kelas`, `nama_kelas`, `jurusan`, `username`, `password`) VALUES ('$id','$nama','$jur','$user','$pass')") or die(mysql_error());
    $_SESSION['msg']="success";
    header("location:../kelas.php");
    }
?>