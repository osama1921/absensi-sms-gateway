<?php
include('koneksi.php');
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
 <style>
#myProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar {
  width: 1%;
  height: 30px;
  background-color: #4CAF50;
  margin-top: 10px;
}
</style>
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
    <center><h5><b><i class="panel-heading"></i></b></h5></center>
  </header>
  <?php
if(!empty($_SESSION['success'])){
  echo "<p class='alert alert-success'>".$_SESSION['success']."</p>";
  unset($_SESSION['success']);
}

  ?>
  <?php
if(!empty($_SESSION['hapus'])){ ?>
<div class="w3-container">
<form method="post" enctype="multipart/form-data" action="aksi/reastore.php">
  Pilih File: 
<div class="w3-input-grup"> 
  <input name="backup_file" type="file" required="required" class="w3-input btn btn-default" > 
  <br></div><br>
  <input name="upload" type="submit" value="Restore Database" class="w3-input btn btn-primary">
</form>

<br/><br/>
</div>
<?php } else { ?>

  <div class="w3-container ">
<button onclick="move()"  class="btn btn-primary btn-sm w3-padding ">Backup </button> <br>
<div id="myProgress">
  <div id="myBar"></div>
</div>

</div>
<div class="w3-container">
<p class="text_down" style="display: none;" id="text">Backup Database Sedang Berjalan, Dimohon Tunggu Sampai Muncul Tombol <b style="font-style: italic;">Download</b>...</p>
<div id="download" style="margin-top: 10px;display: none;" >
  <a href="aksi/aksi_backup.php"><button id="down" onclick="del()" class="btn btn-info">Download</button></a>
</div>
<div class="w3-container">
  <a href="aksi/hapus.php" onclick="javascript: return confirm('Tindakan Yang Anda Lakukan Ini Akan Mengakibatkan Semua Data Akan Dihapus, Anda Akan Tetap Melanjutkannya?')" style="margin-top: 10px;display: none; width: 100px" id="del" class="btn btn-danger">Hapus</a>
</div>
<?php }
  ?>
<script type="text/javascript" src="assets/js/jquery-1.10.2.js"></script>
<script>
 var x = document.getElementById("download");
function move() {
  var elem = document.getElementById("myBar");  
  var text = document.getElementById("text");
  text.style.display ="block"
  var width = 10;
 var x = document.getElementById("download");
  var id = setInterval(frame, 50);
  function frame() {
    if (width >= 100) {
  
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%';
       setTimeout(function(){ 
   x.style.display="block";
   text.style.display ="none";
  },6000); 
  }
}

}
</script>
<script type="text/javascript">
function del(){
  var del = document.getElementById('del');
  var x = document.getElementById("download");
  del.style.display = "block";
  x.style.display="none";
}
</script>
<!-- JS -->
    <script  src="assets/js/index.js"></script>
<!-- END JS -->
</body>
</html>
  