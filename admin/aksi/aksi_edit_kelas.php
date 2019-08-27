<?php
include('../koneksi.php');//memanggil koneksi
$id=$_GET['id'];//mengambil id dari link
$nama=$_POST['nama'];//mengambil nama dari inputan user
$jur=$_POST['jurusan'];//mengambil jurusan
$user=$_POST['user'];//mengambil username
$pass=$_POST['pass'];//mengambil password

if(isset($_POST['submit'])){
    mysql_query("UPDATE `kelas` SET `nama_kelas`='$nama',`jurusan`='$jur',`username`='$user',`password`='$pass' WHERE `id_kelas`='$id'") or die(mysql_error());//proses edit ke database 
    $_SESSION['edit']="success";
    header("location:../kelas.php");//mengalihkan ke halaman kelas.php
    }
?>