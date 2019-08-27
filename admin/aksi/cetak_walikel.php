<?php
include ('../koneksi.php');
$content ='
<style type="text/css">
.col-md-1{
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}.col-md-1{
   float: left;
   width:20%;
   display:flex;
   margin: 0 auto;
}
.box{
	width:220px;
	height: 200px;
	border-style: double;
  border: 1pt;
  margin-top:10px
}.p1{
  padding-top: 1px;
  font-size: 14px;
  text-align: center;
}
.p2{
  font-size: 13px;
  text-align: center;
  margin-bottom: 10px;
}.head{
width: 100%;
border-bottom-style: outset;
border:1pt;
}.body{
  margin-top: 15px;
}
</style>
';
$content .='
<page>
';
$qk=mysql_query("SELECT * FROM `walikel`");
while($data=mysql_fetch_array($qk)) {
$id=$data['id_kelas'];
$kelas=mysql_fetch_array(mysql_query("SELECT * FROM kelas WHERE id_kelas='$id'"));
$content .='
<div class="box col-md-1">
  <div class="head"> 
    <p class="p1">Kartu Username & Password</p>
    <p class="p2">Wali Kelas</p>
  </div>
  <div class="body">
    <table>
      <tr>
        <td>Id Wali Kelas</td><td>:</td><td>'.$data['id_wali'].'</td>
      </tr>
      <tr>
        <td>Nama Wali Kelas</td><td>:</td><td>'.$data['nama_guru'].'</td>
      </tr>
      <tr>
        <td>Kelas</td><td>:</td><td>'.$kelas['nama_kelas'].'</td>
      </tr>
            <tr>
        <td>Username</td><td>:</td><td>'.$data['username'].'</td>
      </tr>

            <tr>
        <td>Password</td><td>:</td><td>'.$data['password'].'</td>
      </tr>
    </table>
    </div>
  </div>
  ';  
}
$content .='
</page>
';


require_once("../../assets/html2pdf/html2pdf.class.php");
$html2pdf = new HTML2PDF('P','A4','fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('Kartu Password Wali Kelas.pdf','FI');
header("localtion:../walikel.php");
?>
