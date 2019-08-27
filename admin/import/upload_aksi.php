

<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
$q2=mysql_query("SELECT `id_kelas` FROM `kelas` ");
$dat= mysql_fetch_array($q2);
$id=$dat['id_kelas'];
?>

<?php
// upload file xls
$target = basename($_FILES['filepegawai']['name']) ;
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nis     = $data->val($i, 1);
	$nama   = $data->val($i, 2);
	$jk  = $data->val($i, 3);
	$alamat  = $data->val($i, 4);
	$namaortu  = $data->val($i, 5);
	$no_hp  = $data->val($i, 6);
	$id_kelas  = $data->val($i, 7);

	if($nama != "" && $nis!=""){
		$jurusan=mysql_fetch_array(mysql_query("SELECT jurusan FROM kelas WHERE id_kelas='$id_kelas'"));
		$jurusan=$jurusan['jurusan'];
		mysql_query("INSERT INTO `siswa`(`NIS`, `nama_siswa`, `jk`, `alamat`, `nama_ortu`, `no_hp`, `id_kelas`, `jurusan`) VALUES ('$nis','$nama','$jk','$alamat','$namaortu','$no_hp','$id_kelas','$jurusan')");
		$berhasil++;

	}
}
if ($berhasil>0) {
	$_SESSION['msg']="Data Berhasil Di Import";
}
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);

// alihkan halaman ke index.php
header("location:../siswa.php?berhasil=$berhasil");
?>