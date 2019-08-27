<?php
include('../koneksi.php');
$NIS=$_GET['id'];//mengambbil idi dari link
$id=$_POST['nis'];//mengambil dari inputan user
$nama=$_POST['nama'];//mengambil dari inputan user
$jk=$_POST['jurusan'];//mengambil dari inputan user
$alamat=$_POST['user'];//mengambil dari inputan user
$ortu=$_POST['pass'];//mengambil dari inputan user
$no=$_POST['no'];//mengambil dari inputan user
$idkel=$_POST['idkel'];//mengambil dari inputan user

if($jk=="Pilih"){
	$_SESSION['jk']=$jk;
		header("location:../edit_siswa.php?id=$id");//mengalihkan ke halaman edit siswa kembali jika gagal
	} else{
if(isset($_POST['submit'])){
	$jurusan=mysql_fetch_array(mysql_query("SELECT jurusan FROM kelas WHERE id_kelas='$idkel'"));
	$jurusan=$jurusan['jurusan'];
	    mysql_query("UPDATE `siswa` SET `NIS`='$id',`nama_siswa`='$nama',`jk`='$jk',`alamat`='$alamat',`nama_ortu`='$ortu',`no_hp`='$no',`id_kelas`='$idkel', `jurusan`='$jurusan' WHERE `NIS`='$NIS'") or die(mysql_error());//proses update
$cek=mysql_num_rows(mysql_query("SELECT * FROM kehadiran WHERE NIS='$NIS'"));
	if ($cek>0) {
		mysql_query("UPDATE `kehadiran` SET `nama_siswa`='$nama' WHERE `NIS`='$NIS'");
		$_SESSION['edit']="success";//memeberitahu jika succcess
		header("location:../siswa.php");//mengalihkan kehalaman 
	}else{
		$_SESSION['edit']="success";//memeberitahu jika succcess
		header("location:../siswa.php");//mengalihkan kehalaman 
	}
    


    }
}
?>