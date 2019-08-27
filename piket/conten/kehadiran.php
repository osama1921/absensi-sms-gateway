 <header class="w3-container" style="padding-top:22px">
 <h5><b><i class="fa fa-calendar "></i> Data Kehadiran </b></h5>
  </header>
<div class="w3-container">
<div class="w3-container panel panel-default">
<form method="post" enctype="multipart/form-data" action="" class="panel-body">

<div>
<p style="font-weight: bold;margin:0 auto;display: flex;">Kelas</p><select class="w3-select" style="margin-bottom: 10px" name="kelas">
<?php
$qk=mysql_query("SELECT id_kelas,nama_kelas FROM kelas ORDER BY nama_kelas ASC");
while ($dk=mysql_fetch_array($qk)) { ?>

  // <option value="<?php echo $dk['id_kelas'];?>"><?php echo $dk['nama_kelas'];?></option>
<?php }
?>
</select>
</div>
  <div style="clear: both;padding-top: 25px;">
  <input name="submit" type="submit" value="Cari" class="btn btn-primary " style="margin-top: 8px;margin-left: 10px; width: 100px; float: right;">
  <div style="clear: both;"></div>
</form>
</div>
</div>
<?php
if (isset($_POST['submit'])) {
$id_kelas=$_POST['kelas']; 
  ?>
  <div class="w3-container w3-padding">
    <div class="table-responsive">
      <table  id="wew" class="table table-striped table-bordered table-hover"  > 
        <thead>
      <tr>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php 
include('../koneksi.php');
$kelas=mysql_fetch_array(mysql_query("SELECT * FROM kelas WHERE id_kelas='$id_kelas'"));
$nama_kelas=$kelas['nama_kelas'];
$query=mysql_query("SELECT * FROM `kehadiran` WHERE id_kelas='$id_kelas' AND tgl='$harini' ORDER BY nama_siswa ASC ");
$cekdata=mysql_num_rows(mysql_query("SELECT * FROM `kehadiran` WHERE id_kelas='$id_kelas' AND tgl='$harini'")); 
if ($cekdata>0) {
  

while($data=mysql_fetch_array($query)){ ?>
<tr>
    <td><?php echo $data['NIS'];?></td>
    <td><?php echo $data['nama_siswa'];?></td>
    <td><?php echo $nama_kelas;?></td>
    <td><?php echo $harini;?></td>
    <td><?php 
    if($data['Hadir']==1){
      echo "Hadir";
    }elseif ($data['Izin']==1) {
     echo "Izin";
    } elseif ($data['Alfa']==1) {
      echo "Alpa";
    } elseif ($data['Sakit']==1) {
      echo "Sakit";
    }
    ?></td>
    <td><a href="index.php?id=<?php echo $data['id_absen'];?>&halaman=editabsen" class="btn btn-default"> Edit</a></td>
 
</tr>
<?php } 
} else{
  echo "<tr><td colspan='6' style='font-style: italic;'><center><strong>Maaf Data Absensi Kelas ".$nama_kelas." Belum Di Input!! 
<p>Tunggu Sampai Data Absensi Di Input Oleh Sekretaris Kelas...</p>
  <strong><center></td>
  </tr>";
}
?>
</tbody>
</table>
</div>
 <?php
  }elseif(!empty($_GET['msg'])){
    echo "<header class='w3-container' style='padding-top:22px'>";
    echo "<p class='alert alert-success' style='padding-top:22px'>Data Kehadiran Berhasil Di Perbarui</p>";
  }

?>