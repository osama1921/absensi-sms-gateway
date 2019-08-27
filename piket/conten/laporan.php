 <header class="w3-container" style="padding-top:22px">
 <h5><b><i class="fa fa-paperclip "></i> Laporan</b></h5>
  </header>
<div class="w3-container panel panel-default">
<br>
<form action="conten/cetak.php" method="POST">
<label>Penanggung Jawab</label>
	<input type="text" name="jawab" class="w3-input " required="required">
	<label>NIP Penanggung Jawab</label>
	<input type="number" name="nipjawab" class="w3-input ">
<button type="submit" style="margin-top: 10px; width: 150px" class="btn btn-success fa fa-print">  Export As PDF</button>
</form>
<div class="table-responsive w3-padding">
<table class="table w3-container table-bordered" id="export">
<tr style="border-style: outset;">
	<th style="text-align: center;">No</th>
	<th style="text-align: center;">Nama Kelas</th>
	<th style="text-align: center;">Jumlah Siswa</th>
	<th style="text-align: center;">Jumlah Siswa Masuk</th>
	<th style="text-align: center;">Jumlah Siswa Tidak Masuk</th>
	<th style="text-align: center;">Ket</th>
</tr>
<?php
$no=1;
$kelas=mysql_query("SELECT DISTINCT nama_kelas,id_kelas FROM kelas");
while ($datakelas=mysql_fetch_array($kelas)) {
$id_kelas=$datakelas['id_kelas'];
$kehadiran=mysql_query("SELECT * FROM kehadiran WHERE id_kelas='$id_kelas' AND `tgl`='$harini'");
	$jumdata=mysql_fetch_array(mysql_query("SELECT COUNT(NIS) as jml FROM `siswa` WHERE id_kelas='$id_kelas'"));
	$id_kelas=$datakelas['id_kelas'];
	$jum=mysql_fetch_array(mysql_query("SELECT SUM(Alfa) as Alfa, SUM(Izin) as Izin, SUM(Sakit) as Sakit, SUM(Hadir) as Hadir FROM `kehadiran` WHERE `tgl`='$harini' AND id_kelas='$id_kelas'"));
 ?>
<tr style="border-left-style: outset; border-right-style: outset; border-bottom-style:outset; ">
	<td><?php echo $no++;?></td>
	<td><?php echo $datakelas['nama_kelas'];?></td>
	<td>
	<?php
	echo $jumdata['jml'];
	?>
	</td>
	<?php

			;?>
	<td><?php
	if ($jum['Hadir']>0) {
echo $jum['Hadir'];
	} else{
		echo "0";
	}
	?>
	</td>
	<td style="">
		<?php 
	$jml=$jum['Alfa']+$jum['Sakit']+$jum['Izin'];
	echo $jml;
	?>
	</td>
	<td>
		<?php
		if ($jml==0) {
		
		}else{
		while ($datakehadiran=mysql_fetch_array($kehadiran)) { ?>

			<p style="margin: 0 auto;"><?php 
			if($datakehadiran['Alfa']==1){
				echo $datakehadiran['nama_siswa']."(Alpa)";
				} elseif ($datakehadiran['Sakit']==1) {		
					echo $datakehadiran['nama_siswa']."(Sakit)";
				} elseif ($datakehadiran['Izin']==1) {
					echo $datakehadiran['nama_siswa']."(Izin)";
				}else{
					echo "";
				}
				?>
			<p>
			

	<?php	}

		?>
</td>
</tr>
	<?php	}
		
}


?>
</table>

</div>
</div>