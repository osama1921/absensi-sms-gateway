<?php
include('../koneksi.php');//memanggil koneksis
$id=$_POST['id'];//mengambil data dari inputan user
$nama=$_POST['nama'];
$Pikethari=$_POST['Pikethari'];
$status=$_POST['status'];
$user="SiAbSis123";
$pass="0975315653221";
if(isset($_POST['submit'])){
    mysql_query("INSERT INTO `gurpiket`(`id_gurpik`, `nama_gurpik`,`status`, `pikethari`, `username`, `password`) VALUES ('$id','$nama','$status', '$Pikethari','$user','$pass')") or die(mysql_error());
    $_SESSION['msg']="success";//memasukkan data ke database tabel gurpiket
    header("location:../piket.php");//redirect ke halaman piket.php
    }
 ?>