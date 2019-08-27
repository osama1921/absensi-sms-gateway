<?php
include('../../koneksi.php');
$user=$_POST['user'];
$pass=$_POST['pass'];
session_start();
if ($pass=="" OR $user=="") {
	$_SESSION['msg']="Username dan Atau Password Kosong, Silahkan Isi Terlebih Dahulu";
	header("location:../login.php");
}else{
	if (isset($_POST['submit'])) {
		$query=mysql_query("SELECT * FROM admin WHERE username='$user' AND password='$pass'");
		$cek=mysql_num_rows($query);
		if ($cek>0) {
			$_SESSION['username']=$user;
			header("location:../../admin/index.php");
		}else{
			$_SESSION['msg']="Username dan Password Tidak di Temukan";
			header("location:../login.php");
		}
	}
}

?>