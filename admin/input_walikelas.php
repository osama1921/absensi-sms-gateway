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
    <center><h5><b><i class="panel-heading"></i> Input Data Wali Kelas</b></h5></center>
  </header>
<center>
<div class="w3-container panel panel-default">
<form method="post" enctype="multipart/form-data" action="aksi/aksi_input_walikelas.php" class="panel-body">
<div class="w3-input-grup size">	
	<input name="id" type="text" required="required" class="w3-input " placeholder="Id walikel" > 
    <br></div>
    <div class="w3-input-grup size">	
	<input name="nama" type="text" required="required" class="w3-input " placeholder="Nama Guru" > 
    <br></div>
    <div class="w3-input-grup size">	
	<select name="jk" required="required" class="w3-select" style="margin-bottom: 10px">
  <option>-- Jenis Kelamin --</option>
   <option>Laki-Laki</option>
   <option>Perempuan</option> 
  </select> 
	<br></div> 
  <div class="w3-input-grup size">	
	<input name="user" type="text" required="required" class="w3-input " placeholder="Username" > 
	<br></div> <div class="w3-input-grup size">	
	<input name="pass" type="text" required="required" class="w3-input " placeholder="Password" > 
	<br></div>
  <div class="w3-input-grup size">  
  <select name="idkel" required="required" class="w3-select " style="margin-bottom: 10px;">
  <option>--Id Kelas---</option>
  <?php
  include('koneksi.php');
  $qk=mysql_query("SELECT * FROM kelas");
  while ($datakel=mysql_fetch_array($qk)) {
    echo "<option>".$datakel['id_kelas']."</option>";
  }
  ?>
  </select> 
    <br></div>
    <input name="submit" type="submit" value="Simpan" class="w3-input btn btn-primary size">
    <input name="reset" type="reset" value="Batal" class="w3-input btn btn-warning size w3-padding">
</form>
<?php
if (!empty($_SESSION['not'])) {
  echo "<p class='alert alert-info'>Silahkan Pilih Jenis Kelamin Dan Atau Id Kelas</p>";
  unset($_SESSION['not']);
} elseif (!empty($_SESSION['ada'])){
  echo "<p class='alert alert-info'>Wali Kelas Dengan Id Yang Dipilih Sudah ada</p>";
  unset($_SESSION['ada']);
}

?>
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