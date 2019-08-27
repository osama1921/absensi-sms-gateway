<header class="w3-container" style="padding-top:22px">
 <h5><b><i class="fa fa-send-o "></i> Kirim SMS</b></h5>
  </header>
  <div class="w3-container">
  	<?php
  	if (!empty($_GET['msg'])) {
  		echo "<p class='alert alert-info'>Silahkan Pilih Data Absensi Yang Akan Dikirim</p>";
  	}
    elseif ($_SESSION['msg']) {
      echo "<p class='alert alert-info'>Pesan Telah Terkirim</p>";
    }elseif ($_SESSION['gagal']) {
      echo "<p class='alert alert-info'>Pesan Tidak Terkirim Silahkan Cek Credits</p>";
    }

  	?>
  </div>
  <div class="w3-container panel panel-default">
  <div class="table-responsive w3-padding">
 <table class="table w3-container table-bordered">
<tr>
<thead>
	<th>NIS</th>
	<th>Nama Siswa</th>
  <th>Kelas</th>
	<th>Ket</th>
	<th>Status</th>
	<th>Aksi</th>
</thead>
</tr>
<tbody>
<?php
$query=mysql_query("SELECT * FROM `kehadiran` WHERE `status`='Tidak Terkirim' AND `tgl`='$harini' ORDER BY id_kelas ASC");
while ($data=mysql_fetch_array($query)) { ?>
<tr>
	<td><?php echo $data['NIS'];?></td>
	<td><?php echo $data['nama_siswa'];?></td>
  <td><?php $idkel=$data['id_kelas'];
$datakelas=mysql_fetch_array(mysql_query("SELECT nama_kelas FROM kelas WHERE id_kelas='$idkel'"));
echo $datakelas['nama_kelas'];
  ?></td>
	<td><?php if($data['Hadir']==1){
      echo "Hadir";
    }elseif ($data['Izin']==1) {
     echo "Izin";
    } elseif ($data['Alfa']==1) {
      echo "Alpa";
    } elseif ($data['Sakit']==1) {
      echo "Sakit";
    }?></td>
	<td><?php echo $data['status'];?></td>
	<form action="conten/sms_api.php" method="POST">
	<td><input type="checkbox" name="<?php echo $data['id_absen'];?>" value="<?php echo $data['id_absen'];?>"></td>
</tr>
<?php }
?>

</tbody>
</table>
 </div>
 <button type="submit" class="btn btn-info " style="margin-bottom: 10px; margin-top: 10px;" name="submit"><i class="fa fa-send " >  Kirim</i></button>
 </form>
</div>
 
