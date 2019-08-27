<?php
include('koneksi.php');
$id=$_GET['id'];
$q1=mysql_query("SELECT * FROM `siswa` WHERE NIS='$id'");
$data=mysql_fetch_array($q1);
$q2=mysql_query("SELECT `id_kelas` FROM kelas");

?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>SiABSis</title>
  
  
  
      <link rel="stylesheet" href="assets/css/style.css">

  
</head>

<body>

  <html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="assets/css/font-awesome.css">

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-dark-drey">

<!-- Top container -->
<div class="w3-container w3-top w3-indigo w3-large w3-padding" style="z-index:4">
  <button class="w3-btn w3-indigo w3-hide-large w3-padding-0" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-right">SiABSis</span>
</div>

<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-collapse w3-blue w3-animate-left" style="z-index:3;width:300px;" id="mySidenav">
  <div class="w3-container">
  <a href="index.php"><h5>Dashboard</h5></a>
  </div>
  <a href="siswa.php" class="w3-padding"><i class="fa fa-users fa-fw"></i>  Data Siswa</a>
  <a href="walikel.php" class="w3-padding"><i class="fa fa-user fa-fw"></i>  Data Wali Kelas</a>
  <a href="piket.php" class="w3-padding"><i class="fa fa-user fa-fw"></i>  Data Guru Piket</a>
  <a href="kelas.php" class="w3-padding"><i class="fa fa-building fa-fw"></i>  Data Kelas</a>
  <a href="absen.php" class="w3-padding"><i class="fa fa-calendar fa-fw"></i>  Data Kehadiran</a>
<a href="backup.php" class="w3-padding"><i class="fa fa-database fa-fw"></i>  Backup & Restore</a>
  <a href="logut.php" class="w3-padding"><i class="fa fa-sign-out fa-fw"></i>  Log Out</a>
</nav>


<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
  <?php
if(!empty($_SESSION['jk'])){
  unset($_SESSION['jk']);
  echo "<p class='alert alert-info'> Silahkan Pilih Jenis Kelamin Terlebih Dahulu</p>";
}

  ?>
    <center><h5><b><i class="panel-heading"></i> Edit Data Siswa</b></h5></center>
  </header>

<center>
<div class="w3-container panel panel-default">
<form method="post" enctype="multipart/form-data" action="aksi/aksi_edit_siswa.php?id=<?php echo $data['NIS'];?>" class="panel-body">
 <div class="w3-input-grup size"> 
NIS<input name="nis" type="text" required="required" class="w3-input " value="<?php echo $data['NIS'];?>" style="display: none;" > <input name="nis" type="text" required="required" class="w3-input " value="<?php echo $data['NIS'];?>" disabled> 
    <br></div>
    <div class="w3-input-grup size">	
Nama Siswa 
	<input name="nama" type="text" required="required" class="w3-input " value="<?php echo $data['nama_siswa'];?>" > 
    <br></div>
     <div class="w3-input-grup size">  
      Jenis Kelamin<select class="w3-input" name="jurusan">
     <?php
        if($data['jk']=="P"){ ?>
      <option>P</option>
          <option>L</option>
   <?php     } elseif ($data['jk']=="L") { ?>
          <option>L</option>
   <option>P</option>
   <?php } else{ ?>
   <option>Pilih</option>
<option>L</option>
   <option>P</option>
    <?php }
     ?>
           </select>
    <br></div><br>
<div class="w3-input-grup size">	
	Alamat <input name="user" type="text" required="required" class="w3-input " value="<?php echo $data['alamat'];?>" > 
	<br></div> <div class="w3-input-grup size">	
	Nama Ortu <input name="pass" type="text" required="required" class="w3-input " value="<?php echo $data['nama_ortu'];?>" > 
	<br></div>
    <div class="w3-input-grup size">  
 No Telepon <input name="no" type="text" required="required" class="w3-input " value="<?php echo $data['no_hp'];?>" > 
    <br></div>
      <div class="w3-input-grup size">  
      Id Kelas<input type="text" value="<?php echo $data['id_kelas'];?>" class="w3-input" style="display: none" name="idkel"><input type="text" value="<?php echo $data['id_kelas'];?>" class="w3-input" disabled>
    <br></div>
    <input name="submit" type="submit" value="Simpan" class="w3-input btn btn-primary size">
    <input name="reset" type="reset" value="Batal" class="w3-input btn btn-warning size">
</form>

<br/><br/>
</div>
</center>
<!-- Footer -->
<footer class="w3-container w3-padding-16">
    <h4></h4>
    <p><p>
  </footer>

  <!-- End page content -->
</div>

<!-- JS -->
    <script  src="assets/js/index.js"></script>
<!-- END JS -->

</body>
</html>
  