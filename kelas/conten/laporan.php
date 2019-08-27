 <header class="w3-container" style="padding-top:22px">
 <h5><b><i class="fa fa-paperclip"></i>  Laporan Absensi </b></h5>
  </header>
<div class="w3-container">
<div class="w3-container panel panel-default">
<form method="post" enctype="multipart/form-data" action="" class="panel-body">
	<div style="float:left;">
		<p style="font-weight: bold;margin:0 auto;display: flex;">Tanggal Awal</p>
		<input type="date" name="awal" class="w3-input " style="width:250px;" required="required">
	</div>

	<div class="let">
	<p style="font-weight: bold;margin:0 auto;display: flex;">Tanggal Akhir</p>
	<input type="date" style="width:250px;" name="akhir" class="w3-input" required="required">
	</div>
	<div style="clear: both;padding-top: 25px;">
	<input name="submit" type="submit" value="Cari" class="btn btn-primary " style="margin-top: 8px;margin-left: 10px; width: 100px; float: right;">
	<div style="clear: both;"></div>
</form>
</div>
</div>
<?php
if (isset($_POST['submit'])) { 
	$awal=$_POST['awal'];
$akhir=$_POST['akhir'];

$query=mysql_query("SELECT DISTINCT `NIS`, `nama_siswa` FROM `kehadiran` WHERE `tgl` BETWEEN '$awal' AND '$akhir' AND id_kelas='$id'");
$num=mysql_num_rows($query);
if ($num==0) {
	echo "<p class='alert alert-info'>Mohon Maaf Untuk Data kehadiran Tanggal Tersebut Tidak tersedia</p>";
}else{ ?>

<div class="w3-container panel panel-default">
<form action="conten/cetak_laporan.php?date=<?php echo $awal;?>&akhir=<?php echo $akhir;?>&kelas=<?php echo $id;?>" method="POST">
<label>Penanggung Jawab</label>
	<input type="text" name="jawab" class="w3-input " required="required">
	<label>Jabatan Di Kelas</label>
	<input type="text" name="jabatan" class="w3-input " required="required">

<button type="submit" style="margin-top: 10px; width: 150px" class="btn btn-success fa fa-print">  Export</button>
</form>
<table class="table w3-container table-bordered" id="export">
<tr style="border-style: outset;">
	<th>No</th>
	<th>NIS</th>
	<th>Nama Siswa</th>
	<th>Hadir</th>
	<th>Alpa</th>
	<th>Izin</th>
	<th>Sakit</th>
</tr>
<?php
$no=1;
while ($data=mysql_fetch_array($query)) { 
	?>
<tr style="border-left-style: outset; border-right-style: outset;">
	<td style="text-align: center;"><?php echo $no++?></td>
	<td><?php $nis=$data['NIS']; echo $nis?></td>
	<td><?php echo $data['nama_siswa']?></td>
	<td style="text-align: center;">
		 <?php $q1=mysql_query("SELECT SUM(Hadir) as jmlhadir FROM `kehadiran` WHERE `tgl` BETWEEN '$awal' AND '$akhir' AND  `NIS`='$nis'");
		 $d1=mysql_fetch_array($q1);
		 echo $d1['jmlhadir'];?></td>
	<td style="text-align: center;">
		<?php $q2=mysql_query("SELECT SUM(Alfa) as jmlalfa FROM `kehadiran` WHERE `tgl` BETWEEN '$awal' AND '$akhir' AND  `NIS`='$nis'");
	$d2=mysql_fetch_array($q2);
	echo $d2['jmlalfa'];?></td>
	<td style="text-align: center;">
		<?php $q3=mysql_query("SELECT SUM(Izin) as jmlizin FROM `kehadiran` WHERE `tgl` BETWEEN '$awal' AND '$akhir' AND `NIS`='$nis'");
	$d3=mysql_fetch_array($q3);
	echo $d3['jmlizin'];?></td>
	<td style="text-align: center;">
		<?php $q4=mysql_query("SELECT SUM(Sakit) as jmlsakit FROM `kehadiran` WHERE `tgl` BETWEEN '$awal' AND '$akhir' AND  `NIS`='$nis'");
	$d4=mysql_fetch_array($q4);
	echo $d4['jmlsakit'];?></td>
</tr>
<?php }
$q5=mysql_query("SELECT SUM(`Hadir`) as jml, SUM(`Alfa`) as jmlalfa, SUM(`Izin`) as jmlizin, COUNT(`NIS`) as jmldata, SUM(`Sakit`) as jmlsakit FROM `kehadiran` WHERE `tgl` BETWEEN '$awal' AND '$akhir' AND `id_kelas`='$id'");
$d5=mysql_fetch_array($q5);
$jmldata=$d5['jml'];
?>
<tr style="border-style: outset; text-align: center; font-weight: bold;">
	<td colspan="3">Jumlah</td>
	<td><?php echo $jmldata;?></td>
	<td><?php echo $d5['jmlalfa'];?></td>
	<td><?php echo $d5['jmlizin'];?></td>
	<td><?php echo $d5['jmlsakit'];?></td>
</tr>
<tr style="border-style: outset; text-align: center; font-weight: bold;">
	<td colspan="3">Total</td>
	<td colspan="4"><?php echo $d5['jmldata'];?></td>
</tr>
<tr style="border-style: outset; text-align: center; font-weight: bold;">
	<td colspan="3">Presentase</td>
	<td><?php 
	$persen=($d5['jml']/$d5['jmldata'])*100;
	$persen=round($persen);
	echo $persen." %";

	 ?></td>
	<td><?php 
	$persen=($d5['jmlalfa']/$d5['jmldata'])*100;
	$persen=round($persen);
	echo $persen." %";

	 ?></td>
	<td><?php 
	$persen=($d5['jmlizin']/$d5['jmldata'])*100;
	$persen=round($persen);
	echo $persen." %";

	 ?></td>
	<td><?php 
	$persen=($d5['jmlsakit']/$d5['jmldata'])*100;
	$persen=round($persen);
	echo $persen." %";

	 ?></td>
</tr>
</table>
</div>
</div>	<?php
}
?>
<?php } ?>
