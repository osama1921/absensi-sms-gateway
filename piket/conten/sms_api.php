<?php
include('../../koneksi.php');
$query=mysql_query("SELECT * FROM `kehadiran` WHERE tgl='$harini' AND status='Tidak Terkirim'");
while ($data=mysql_fetch_array($query)) { //mengecek data yang di pilih
$id_absen=$data['id_absen'];
    if (isset($_POST[$id_absen])) {
        if ($data['Izin']==1) {
     $status="Izin";
    } elseif ($data['Alfa']==1) {
      $status="Alfa";
    } elseif ($data['Sakit']==1) {
      $status="Sakit";
    }
   $id=$_POST[$id_absen];//mengambil id absen yang dipilih
    $carinis=mysql_fetch_array(mysql_query("SELECT NIS FROM kehadiran WHERE id_absen='$id_absen'"));//mencari NIS sesuai id absen
    $NIS=$carinis['NIS'];
    $datasiswa=mysql_fetch_array(mysql_query("SELECT * FROM siswa WHERE NIS='$NIS'"));//mencari data siswa sesuai NIS
    $nohp=$datasiswa['no_hp'];//mengambil no hp
	$pesan="YTH Wali Murid, Memberitahukan Bahwa ".$data['nama_siswa']." Tanggal ".$harini." Tidak Masuk Sekolah Karena ".$status."";//pesan yang akan dikirim ke hp orangtua
   $isipesan=urlencode($pesan);//menjadikan pesan menjadi url code
  $no_hp=str_replace('+62', '0', $nohp);
  $no_hp=str_replace(' ', '', $no_hp);
  $no_hp=str_replace('.', '', $no_hp);
  $no_hp=str_replace(',', '', $no_hp);
  $no=trim($no_hp);
  $userkey="gns0xe";//username untuk membuka api sms
  $passkey="9d7chnmg53";//password untuk membuka api sms
  $url="https://reguler.zenziva.net/apps/smsapi.php?userkey=gns0xe&passkey=9d7chnmg53&nohp=$no&pesan=$isipesan";//link untuk mengirim sms
  $data=file_get_contents($url);//mengambil data dari url
  if (eregi('success', $data)) {//mengcek apakah pengiriman berhasil atau tidak
    $hasil=1;//jika berhasil akan bernilai 1
  }else{
    $hasil=0; //jika gagal akan bernilai 0
  }
    if($hasil>0){
      mysql_query("UPDATE `kehadiran` SET `status`='Terkirim' WHERE id_absen='$id_absen'");//mengubah status
      $_SESSION['msg']="success";//memberi tahu jika pengiriman success
      header("location:../index.php?halaman=SMS");//mengalihkan ke halaman SMS Kembali
    }else{
      $_SESSION['gagal']="gagal";//memberi tahu jika pengirirman gagal
      header("location:../index.php?halaman=SMS");   
    }
    }
    }
    if ($id=="") {
       header("location:../index.php?halaman=SMS&msg=gagal"); //jika tidak ada id yang dipilih akan dialihkan ke halaman sms
   
    }
//     function kirimsms($nohp,$pesan){
  
//   return $hasil;
// }
?>
