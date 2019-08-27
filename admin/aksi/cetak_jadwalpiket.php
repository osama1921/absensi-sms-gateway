<?php
include ('../koneksi.php');//memanggil koneksi
$content ='
<style type="text/css">
th {
  width:100px;
  height:30px;
  text-align: center;
  
  }
  table,tr,td,th{
    border: 1px solid black;
    border-collapse: collapse;
  }
  td{
    width:100px;
  text-align: center;
  }p{
    margin-left:560px;
      }
</style>
';
$content .='
<page>
';
$se=mysql_query("SELECT * FROM `gurpiket` WHERE pikethari='Senin'");
$content .='
<h1 align="center">Jadwal Guru PIket</h1>
<table>
<tr>
<th>Senin</th>
  ';  
while ($senin=mysql_fetch_array($se)) {
$content .='
<td>'.$senin['nama_gurpik'].'</td>
';
}
$content .='
</tr>
<tr>
<th>Selasa</th>
';
$selasa=mysql_query("SELECT * FROM `gurpiket` WHERE pikethari='Selasa'");
while ($selasa=mysql_fetch_array($selasa)) {
  $content .='
<td>'.$selasa['nama_gurpik'].'</td>
  ';
}
$content .='
</tr>
<tr>
<th>Rabu</th>
';
$selasa=mysql_query("SELECT * FROM `gurpiket` WHERE pikethari='Rabu'");
while ($selasa=mysql_fetch_array($selasa)) {
  $content .='
<td>'.$selasa['nama_gurpik'].'</td>
  ';
}
$content .='
</tr>
<tr>
<th>Kamis</th>
';
$selasa=mysql_query("SELECT * FROM `gurpiket` WHERE pikethari='Kamis'");
while ($selasa=mysql_fetch_array($selasa)) {
  $content .='
<td>'.$selasa['nama_gurpik'].'</td>
  ';
}
$content .='
</tr>
<tr>
<th>Jumat</th>
';
$selasa=mysql_query("SELECT * FROM `gurpiket` WHERE pikethari='Jumat'");
while ($selasa=mysql_fetch_array($selasa)) {
  $content .='
<td>'.$selasa['nama_gurpik'].'</td>
  ';
}
$content .='
</tr>
</table>
<p class="p">Pandeglang, '.date("d-m-y").'<br>
Kepala Sekolah</p>
<br><br><br>
<p>Drs. H. Sudi, MM <br>
NIP. 196003301987031005</p>
</page>
';


require_once("../../assets/html2pdf/html2pdf.class.php");//memanggil html2pdf
$html2pdf = new HTML2PDF('P','A4','fr');//ukuran kertas
$html2pdf->WriteHTML($content);//menampilkan conten/isi
$html2pdf->Output('Kartu Password Guru Piket.pdf','FI');//hasil dengan nama kartu password guru piket.pdf
?>
