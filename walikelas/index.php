<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])){
header("Location:../index.html");
}
$id=$_SESSION['id'];
include('../koneksi.php');
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>SiABSis</title>
  
  
  
      <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

  <html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="../admin/assets/css/font-awesome.css">
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
    <a href="?halaman"><h5>Dashboard</h5></a>
  </div>
  <a href="?halaman=laporan" class="w3-padding"><i class="fa fa-paperclip fa-fw"></i>  Laporan</a>
  <a href="logout.php" class="w3-padding"><i class="fa fa-sign-out fa-fw"></i>  Log Out</a>
</nav>


<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <?php 
  if ($_GET['halaman']=="laporan"){
   include('conten/laporan.php');
  }else {
    ?>
<header class="w3-container" style="padding-top:22px">
 <h2 style="text-align: left;"><b><i class="fa fa-dashboard "></i> Dashboard</b></h2>
<h3><b><i class="fa fa-users"></i> Selamat Datang Wali Kelas</b></h3>
  </header>
  <?php }
?>   
</div>
  <!-- Footer -->
  <footer class="w3-container w3-padding-16">
    <h4></h4>
   
  </footer>

<!-- JS -->
    <script  src="../assets/js/index.js"></script>
</script>

</body>
</html>
  
  




