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
    <h5><b><i class="fa fa-calendar"></i> Data Kehadiran</b></h5>
  </header>
<div class="w3-container">
<div class="w3-container panel panel-default">
<form method="post" enctype="multipart/form-data" action="" class="panel-body">
<div>
 <p style="font-weight: bold;margin:0 auto;display: flex;">Tanggal Awal</p><input type="date" name="awal" class="w3-input">
</div>
<div>
 <p style="font-weight: bold;margin:0 auto;display: flex;">Tanggal Akhir</p><input type="date" name="akhir" class="w3-input">
</div>
  <div style="clear: both;padding-top: 25px;">
  <input name="submit" type="submit" value="Cari" class="btn btn-primary " style="margin-top: 8px;margin-left: 10px; width: 100px; float: right;">
  <div style="clear: both;"></div>
</form>
</div>
</div>
<!-- start Pagination -->
<?php

                        $page = (isset($_GET['page']))? $_GET['page'] : 1;
                        $per_page = 10; // Batas data per halaman
                        $jumlah_number = 3;

                        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number        
                        $end_number = ($page < ($per_page - $jumlah_number))? $page + $jumlah_number : $per_page;

    
                        if($page <= 1) {
                        $st = 0;
                        }else{
                        $st = ($page - 1) * $per_page;
                        }

                        $prev = $page - 1;
                        $next = $page + 1;

                        $st = $st;
                        $nd = $per_page;

                        $limit = "limit $st,$nd";
                        
if (isset($_POST['submit'])) { 
$awal=$_POST['awal'];
$akhir=$_POST['akhir'];
$cekd=mysql_num_rows(mysql_query("SELECT * FROM `kehadiran` WHERE `tgl` BETWEEN '$awal' AND '$akhir' ORDER BY id_kelas ASC"));
if ($cekd>0) {
  
  ?>
<div class="w3-container w3-padding">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="table" > 
        <thead>
      <tr>
        <td>NIS</td>
        <td>Nama Siswa</td>
        <td>Kelas</td>
        <td>Tanggal</td>
        <td>Keterangan</td>
        <td>Status Pengiriman</td>
</tr>
</thead>
<tbody>
  <?php
 
  $q1=mysql_query("SELECT * FROM `kehadiran` WHERE `tgl` BETWEEN '$awal' AND '$akhir' LIMIT $st, $per_page");
 $q2=mysql_query("SELECT * FROM `kehadiran` WHERE `tgl` BETWEEN '$awal' AND '$akhir'"); 
  
while($data=mysql_fetch_array($q1)){ 
  $id_kelas=$data['id_kelas'];
$kelas=mysql_fetch_array(mysql_query("SELECT * FROM `kelas` WHERE id_kelas='$id_kelas'"));
  ?>

    <tr>
    <td><?php echo $data['NIS'];?></td>
    <td><?php echo $data['nama_siswa'];?></td>
    <td><?php echo $kelas['nama_kelas'];?></td>
    <td><?php echo $data['tgl'];?></td>
    <td><?php if($data['Hadir']==1){
      echo "Hadir";
    }elseif ($data['Izin']==1) {
     echo "Izin";
    } elseif ($data['Alfa']==1) {
      echo "Alpa";
    } elseif ($data['Sakit']==1) {
      echo "Sakit";
    } ?></td>
    <td><?php echo $data['status']?></td>
</tr>

<?php
}


?>
</tbody>
</table>
<?php
                              $hitung_data = mysql_num_rows($q2);
                              $hitung_data2 = ceil($hitung_data/$per_page);
?> <center><div class="pagination"> <?php
                                // ini buat sebelumnya
                                if($prev < 1) { ?>
                                    <li><a class='disabled'>Prev</a></li>
<?php                                  }else{  ?>
                                    <li><a href='?page=<?php echo $prev;?>' class=''>Prev</a></li>
                                 <?php } ?>
                                   <li><a class='aktif'>Hal <?php echo $page ?> Dari <?php echo $hitung_data2 ?></a></li> 
                            <?php
                              
                              if($next > $hitung_data2) { ?>
                                    <li><a class="disabled">Next</a></li>
                      <?php            } else{  ?> 
                          <li><a  href="?page=<?php echo $next;?>">Next</a></li>
                                  <?php } 
                        ?>
    </div>
</div>
<?php
}else{
  echo "<p class='alert alert-info'> <b>Data Tidak Ditemukan!!!</b></p>";
}
} ?>
  <div class="w3-container">

 </div>
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
  
  




