<?php
include('../../koneksi.php');
$user=$_POST['user'];
$pass=$_POST['pass'];
session_start();
if ($pass=="" OR $user=="") {
	$_SESSION['msg']="Username dan Atau Password Kosong, Silahkan Isi Terlebih Dahulu";
	header("location:../log_piket.php");
}else{
	if (isset($_POST['submit'])) {
		$query=mysql_query("SELECT * FROM gurpiket WHERE username='$user' AND password='$pass'");
		$cek=mysql_num_rows($query);
		if ($cek>0) {
			$_SESSION['username']=$user;
			header("location:../../piket/index.php?halaman=");
		}else{
			$_SESSION['msg']="Username dan Password Tidak di Temukan";
			header("location:../log_piket.php");
		}
	}
}

?>