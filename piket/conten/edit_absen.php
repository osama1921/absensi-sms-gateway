<?php
$id=$_GET['id'];
$data=mysql_fetch_array(mysql_query("SELECT * FROM `kehadiran` WHERE `id_absen`='$id' AND `tgl`='$harini'"));

?>
<header class="w3-container" style="padding-top:22px">
    <center><h5><b><i class="panel-heading"></i> Edit Data Absensi</b></h5></center>
  </header>

<center>
<div class="w3-container panel panel-default">
<form method="post" enctype="multipart/form-data" action="conten/aksi_edit.php" class="panel-body">   
<div class="w3-input-grup size">	<input name="id" type="text" required="required" class="w3-input " value="<?php echo $data['id_absen'];?>" style="display: none;" > 
Nama Siswa	<input name="nama" type="text" required="required" class="w3-input " value="<?php echo $data['nama_siswa'];?>" style="display: none;" > <input name="nama" type="text" required="required" class="w3-input " value="<?php echo $data['nama_siswa'];?>" disabled>
    <br></div>
    <div class="w3-input-grup size">	
	Keterangan <select name="ket" class="w3-select size" style="margin-bottom: 15px;">
    <?php 
    if($data['Hadir']==1){
      echo "
    <option>Hadir</option>
    <option>Alpa</option>
    <option>Sakit</option>
    <option>Izin</option>
      ";
    }elseif ($data['Izin']==1) {
     echo "
    <option>Izin</option>
     <option>Hadir</option>
    <option>Alpa</option>
    <option>Sakit</option>
    ";
    } elseif ($data['Alfa']==1) {
      echo "
    <option>Alpa</option>
      <option>Hadir</option>
    <option>Sakit</option>
    <option>Izin</option>
      ";
    } elseif ($data['Sakit']==1) {
      echo "
    <option>Sakit</option>
      <option>Hadir</option>
    <option>Alpa</option>
    <option>Izin</option>
      ";
    }

    ?>
    
    </select></td>
	<br></div>
    <input name="submit" type="submit" value="Simpan" class="w3-input btn btn-primary size">
    <input name="reset" type="reset" value="Batal" class="w3-input btn btn-warning size">
</form>

<br/><br/>
</div>
</center>
