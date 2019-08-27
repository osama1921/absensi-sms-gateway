<?php
include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SiABSis</title>
      <link rel="stylesheet" href="assets/css/style.css"> <!-- memanggil CSS -->
</head>
<body>
  <html>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"> <!-- memanggil font -->
<link rel="stylesheet" href="assets/css/font-awesome.css"> <!-- memanggil font Awesome -->
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
<!-- end menu -->

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>
  <!-- end header -->
  <!-- Kontent -->
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-cyan w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $siswa;?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Siswa</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-cyan w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $wali;?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Wali Kelas</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-cyan w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $piket?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Guru Piket</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-cyan w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-building w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $kelas;?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Kelas</h4>
      </div>
    </div>
  </div>
  <div class="w3-row-padding w3-margin-bottom">
  <div class="w3-half">
      <div class="w3-container w3-cyan w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-calendar w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $kehadiran?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Kehadiran</h4>
      </div>
    </div>
    <div class="w3-half">
      <div class="w3-container w3-cyan w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-desktop w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $hostname?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Hostname</h4>
      </div>
    </div>
  </div>
  <!-- end content -->
  <!-- Footer -->
  <footer class="w3-container w3-padding-16 foot" style="float: right;position: fixed;">
    <p>Copyright 2019 © Created by SiABSis<p>
  </footer>

  <!-- End page content -->
</div>

<!-- JS -->
    <script  src="assets/js/index.js"></script><!-- memanggil javascript -->
<!-- END JS -->

</body>
</html>
  
  




