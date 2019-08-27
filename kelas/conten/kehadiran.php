    <?php
   if ($cek==0) {
    
    ?>

  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-calendar"></i> Input Data Kehadiran</b></h5>
  </header>

<div class="w3-container w3-padding">
    <div class="table-responsive">
      <table  id="wew" class="table table-striped table-bordered table-hover"  > 
        <thead>
      <tr>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Nama Orang tua</th>
        <th>No Telepon</th>
        <th>Kelas</th>
        <th>Keterangan</th>
</tr>
</thead>
<tbody>
<?php 
include('../koneksi.php');
$query=mysql_query("SELECT * FROM `siswa` WHERE id_kelas='$id' ORDER BY nama_siswa ASC");
while($data=mysql_fetch_array($query)){ ?>
<tr>
    <td><?php echo $data['NIS'];?></td>
    <td><?php echo $data['nama_siswa'];?></td>
    <td><?php echo $data['jk'];?></td>
    <td><?php echo $data['alamat'];?></td>
    <td><?php echo $data['nama_ortu'];?></td>
    <td><?php echo $data['no_hp'];?></td>
    <td><?php echo $data['id_kelas'];?></td>
    <td>
    <form action="conten/aksi_kehadiran.php?id=<?php echo $id?>" method="POST"><select name="<?php echo $data['NIS'];?>" class="w3-select" style="width: 150px"><option>Hadir</option>
    <option>Alpa</option>
    <option>Sakit</option>
    <option>Izin</option>
    </select></td>
 
</tr>
<?php } 
?>
</tbody>
</table>
<input type="submit" name="submit" value="simpan" class="btn btn-info" style="width: 100%">
</form>
</div>
 <?php
  }elseif(!empty($_SESSION['msg'])){
  	echo "<header class='w3-container' style='padding-top:22px'>";
 unset($_SESSION['msg']);
  	echo "<p class='alert alert-success' style='padding-top:22px'>Data Kehadiran Berhasil Di Simpan</p>";
echo "<p class='alert alert-danger' >Jika Ingin Merubah Data Kehadiran Silahkan Batal Simpan Terlebih Dahulu Atau Silahkan Hubungi Guru Piket Yang Bertugas</p></header>";
  }else{
  	echo "<header class='w3-container' style='padding-top:22px'>";
  	echo "<p class='alert alert-danger' >Jika Ingin Merubah Data Kehadiran Silahkan Batal Simpan Terlebih Dahulu Atau Silahkan Hubungi Guru Piket Yang Bertugas</p></header>";
  }
  ?>
