<?php
include ('../../koneksi.php');
$no=1;
$jawab=$_POST['jawab'];
$nip=$_POST['nipjawab'];
date_default_timezone_set('Asia/Jakarta');
$harini=date("d-m-Y");
$content ='
<style type="text/css">
th {
	width:100px;
	text-align: center;
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
<div style="font-size: 14px; text-align: left; text-transform: uppercase; font-weight: 3px; margin-bottom: 10px">Tanggal : '.$harini.'</div>
<table>
<tr>
	<th style="text-align: center; padding:8px 5px">No</th>
	<th style="text-align: center; padding:8px 5px">Nama Kelas</th>
	<th style="text-align: center; padding:8px 5px">Jumlah Siswa</th>
	<th style="text-align: center; padding:8px 5px">Jumlah Siswa Masuk</th>
	<th style="text-align: center; padding:8px 5px">Jumlah Siswa Tidak Masuk</th>
	<th style="text-align: center; padding:8px 5px">Ket</th>
</tr>

';
$no=1;
$kelas=mysql_query("SELECT DISTINCT nama_kelas,id_kelas FROM kelas");
while ($datakelas=mysql_fetch_array($kelas)) {
$id_kelas=$datakelas['id_kelas'];
$kehadiran=mysql_query("SELECT * FROM kehadiran WHERE id_kelas='$id_kelas' AND `tgl`='$harini'");
$tidakhadir=mysql_query("SELECT * FROM kehadiran WHERE id_kelas='id_kelas' AND tgl='$harini'");
	$jumdata=mysql_fetch_array(mysql_query("SELECT COUNT(NIS) as jml FROM `siswa` WHERE id_kelas='$id_kelas'"));
	$id_kelas=$datakelas['id_kelas'];
	$jum=mysql_fetch_array(mysql_query("SELECT SUM(Alfa) as Alfa, SUM(Izin) as Izin, SUM(Sakit) as Sakit, SUM(Hadir) as Hadir FROM `kehadiran` WHERE `tgl`='$harini' AND id_kelas='$id_kelas'"));
	if ($jum['Hadir']>0) {
$jumdir=$jum['Hadir'];
	} else{
		$jumdir="0";
	}
	$jml=$jum['Alfa']+$jum['Sakit']+$jum['Izin'];
	$content.='
<tr style="border-left-style: outset; border-right-style: outset; border-bottom-style:outset; padding:9px; ">
	<td style="text-align:center">'.$no++.'</td>
	<td style="text-align:center">'.$datakelas["nama_kelas"].'</td>
	<td style="text-align:center">'.$jumdata["jml"].'</td>
	<td style="text-align:center">'.$jumdir.'</td>
	<td style="text-align:center">'.$jml.'</td>
	<td style="text-align:left;">';

		if ($jml==0) {
		
		}else{
		while ($datakehadiran=mysql_fetch_array($kehadiran)) { 
				if($datakehadiran['Alfa']==1){
			$dataabsen=$datakehadiran['nama_siswa']."(Alpa)";
				} elseif ($datakehadiran['Sakit']==1) {		
					$dataabsen=$datakehadiran['nama_siswa']."(Sakit)";
				} elseif ($datakehadiran['Izin']==1) {
					$dataabsen=$datakehadiran['nama_siswa']."(Izin)";
				}else{
					$dataabsen="";
				}
	$content .='
			<p style="border-bottom-style: outset;margin-bottom:1px;margin-left: 1px">'.$dataabsen.'</p>';
			}
		}
$content .='
	</td>';

	$content.='
</tr>

';
		
		
}

$content .='
</table>
<br>
<br>
<p class="p">Pandeglang, '.date("d-m-Y").'<br>
Penanggung Jawab</p>
<br><br><br>
<p>'.$jawab.'<br>
NIP. '.$nip.'</p>
</page>	

';


require_once("../../assets/html2pdf/html2pdf.class.php");
$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('Laporan.pdf');
header("localtion:../index.php?halaman=laporan'");
?>
