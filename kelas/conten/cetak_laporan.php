<?php
include ('../../koneksi.php');
$awal=$_GET['date'];
$akhir=$_GET['akhir'];
$id=$_GET['kelas'];
$qk=mysql_fetch_array(mysql_query("SELECT * FROM kelas WHERE id_kelas='$id'"));
$nama_kelas=$qk['nama_kelas'];
$jawab=$_POST['jawab'];
$no=1;
$content='

<style type="text/css">
th {
  width:80px;
}
table,tr,td,th{
	border: 1px solid black;
	border-collapse: collapse;
}p{
    margin-left:560px;
      }

</style>
<page>
<div style="font-size: 25px; text-align: center; text-transform: uppercase; font-weight: 3px; margin-bottom: 20px">Laporan Absensi</div>
<div style="margin-bottom: 13px">Kelas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$nama_kelas.'<br>
Tanggal : '.$awal.' s/d '.$akhir.'</div>
<table>
<tr style="text-align:center">
	<th style="padding: 8px 5px">No</th>
	<th style="padding: 8px 5px">NIS</th>
	<th style="padding: 8px 5px">Nama Siswa</th>
	<th style="padding: 8px 5px">Hadir</th>
	<th style="padding: 8px 5px">Alpa</th>
	<th style="padding: 8px 5px">Izin</th>
	<th style="padding: 8px 5px">Sakit</th>
</tr>

';
$query=mysql_query("SELECT DISTINCT `NIS`, `nama_siswa` FROM `kehadiran` WHERE `tgl`='$awal' or `tgl`='$akhir' AND id_kelas='$id'");
while ($data=mysql_fetch_array($query)) {  
	$nis=$data['NIS'];
	$nama_siswa=$data['nama_siswa'];
	$q1=mysql_query("SELECT SUM(Hadir) as jmlhadir FROM `kehadiran` WHERE `tgl` BETWEEN '


		$awal' AND '$akhir' AND  `NIS`='$nis'");
		 $d1=mysql_fetch_array($q1);
		 $q2=mysql_query("SELECT SUM(Alfa) as jmlalfa FROM `kehadiran` WHERE `tgl` BETWEEN '$awal' AND '$akhir' AND  `NIS`='$nis'");
	$d2=mysql_fetch_array($q2);
	$q3=mysql_query("SELECT SUM(Izin) as jmlizin FROM `kehadiran` WHERE `tgl` BETWEEN '$awal' AND '$akhir' AND `NIS`='$nis'");
	$d3=mysql_fetch_array($q3);
	 $q4=mysql_query("SELECT SUM(Sakit) as jmlsakit FROM `kehadiran` WHERE `tgl` BETWEEN '$awal' AND '$akhir' AND  `NIS`='$nis'");
	$d4=mysql_fetch_array($q4);
	$content.='
<tr>
	<td style="text-align: center">'.$no++.'</td>
	<td>'.$data['NIS'].'</td>
	<td>'.$data['nama_siswa'].'</td>
	<td style="text-align: center">'.$d1['jmlhadir'].'</td>
	<td style="text-align: center">'.$d2['jmlalfa'].'</td>
	<td style="text-align: center">'.$d3['jmlizin'].'</td>
	<td style="text-align: center">'.$d4['jmlsakit'].'</td>
</tr>

';
}

$q5=mysql_query("SELECT SUM(`Hadir`) as jml, SUM(`Alfa`) as jmlalfa, SUM(`Izin`) as jmlizin, COUNT(`NIS`) as jmldata, SUM(`Sakit`) as jmlsakit FROM `kehadiran` WHERE `tgl` BETWEEN '$awal' AND '$akhir' AND `id_kelas`='$id'");
$d5=mysql_fetch_array($q5);
$jml=$d5['jml'];
$jmldata=$d5['jmldata'];
$jmlalfa=$d5['jmlalfa'];
$jmlizin=$d5['jmlizin'];
$jmlsakit=$d5['jmlsakit'];
$persen1=($d5["jml"]/$d5["jmldata"])*100;$persen1=round($persen1);
	$persen2=($d5["jmlalfa"]/$d5["jmldata"])*100;$persen2=round($persen2);
	$persen3=($d5["jmlizin"]/$d5["jmldata"])*100;$persen3=round($persen3);
	$persen4=($d5["jmlsakit"]/$d5["jmldata"])*100;$persen4=round($persen4);
$content.='
<tr style="text-align: center">
	<td colspan="3">Jumlah</td>
	<td>'.$jml.'</td>
	<td>'.$jmlalfa.'</td>
	<td>'.$jmlizin.'</td>
	<td>'.$jmlsakit.'</td>
</tr>
<tr style="text-align: center">
	<td colspan="3">Total</td>
	<td colspan="4">'.$jmldata.'</td>
</tr>
<tr style="text-align: center">
	<td colspan="3">Presentase</td>
	<td>'.$persen1.'%</td>
	<td>'.$persen2.'%</td>
	<td>'.$persen3.'%</td>
	<td>'.$persen4.'%</td>
</tr>';
if ($_POST['jabatan']=="Sekeretaris" OR $_POST['jabatan']=="sekeretaris") {
	$content.='
</table>
<br>
<br>
<p class="p">Pandeglang, '.date("d-m-Y").'<br>
Penanggung Jawab</p>
<br><br><br>
<p>'.$jawab.'</p>
</page>
'; 	
}else{
$content.='
</table>
<br>
<br>
<p class="p">Pandeglang, '.date("d-m-Y").'<br>
Penanggung Jawab<br>
A.N Sekretaris</p>
<br><br><br>
<p>'.$jawab.'<br>
'.$_POST['jabatan'].'</p>
</page>
'; 	}

require_once("../../assets/html2pdf/html2pdf.class.php");
$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('Laporan.pdf');
header("localtion:../index.php?halaman=laporan'");
?>
