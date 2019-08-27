<?php
include('../koneksi.php');
$id=$_POST['id'];
$nama=$_POST['nama'];
$jk=$_POST['jk'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$idkel=$_POST['idkel'];
session_start();
$cekdata=mysql_num_rows(mysql_query("SELECT * FROM walikel WHERE `id_kelas`='$idkel'"));
if(isset($_POST['submit'])){
	if ($idkel=="--Id Kelas---" OR $jk=="-- Jenis Kelamin --") {
			$_SESSION['not']="not";
		header("location:../input_walikelas.php");
	}else{
		if ($cekdata==0) {
			mysql_query("INSERT INTO `walikel`(`id_wali`, `nama_guru`, `jk`, `username`, `password`, `id_kelas`) VALUES ('$id','$nama','$jk','$user','$pass','$idkel')") or die(mysql_error());
			  mysql_query("UPDATE `kelas` SET `nama_walikel`='$nama' WHERE `id_kelas`='$idkel'");
			$_SESSION['msg']="success";
   			 header("location:../walikel.php");
		}
		else{ 
			$_SESSION['ada']="ada";

			header("location:../input_walikelas.php");

			}
	}
    
    }
?>