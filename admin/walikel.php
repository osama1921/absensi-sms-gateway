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
    <h5><b><i class="fa fa-dashboard"></i> Data Wali Kelas</b></h5>
  </header>
  <div class="w3-container">
    <?php
    if (!empty($_SESSION['msg'])) {
  echo "<p class='alert alert-success'>Data Wali Kelas Berhasil Disimpan</p>";
  unset($_SESSION['msg']);
} elseif (!empty($_SESSION['edit'])) {
  echo "<p class='alert alert-success'>Data Wali Kelas Berhasil Di perbarui</p>";
  unset($_SESSION['edit']);
}elseif (!empty($_SESSION['del'])) {
  echo "<p class='alert alert-success'>Data Berhasil Di Hapus</p>";
  unset($_SESSION['del']);
}
    ?>
  </div>
  <!-- copy -->
       <form class="navbar-form navbar-right" role="search" method="POST" action="">
          <input type="text" class="form-control" placeholder="Cari Berdasarkan ID Wali Kelas" style="display: block; border: none; border-bottom: 1px solid #808080; float: right; outline: none; height: 30px" name="cari">
      </form>
<!-- end -->
<div class="w3-container">
<a href="input_walikelas.php"><button class="btn btn-success fa fa-pencil"> Input Data Walikelas</button></a> <a href="aksi/cetak_walikel.php"><button class="btn btn-success fa fa-lock"> Cetak Password</button></a>
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
                        ?>

<div class="w3-container w3-padding">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="table" > 
        <thead>
      <tr>
        <td>ID Wali Kelas</td>
        <td>Nama Wali Kelas</td>
        <td>Jenis Kelamin</td>
        <td>Username</td>
         <td>ID Kelas</td>
        <td colspan="2">Aksi</td>
</tr>
</thead>
<tbody>
  <?php
  if(!empty($_POST['cari'])){
$cari=$_POST['cari'];
$query=mysql_query("SELECT * FROM `walikel` WHERE id_wali LIKE '%".$cari."%'");
$cek=mysql_num_rows($query);
if($cek==0){
      echo "<p class='alert alert-info'>Data Tidak Ditemukan</p>
<a class='btn btn-default' href=kelas.php>Kembali</a>      ";
      }else{
        $q1=mysql_query("SELECT * FROM `walikel` WHERE id_wali LIKE '%$cari%' LIMIT $st, $per_page");
        $q2=mysql_query("SELECT * FROM `walikel` WHERE id_wali LIKE '%$cari%'");}
      }
else{
  $q1=mysql_query("SELECT * FROM `walikel` LIMIT $st, $per_page");
 $q2=mysql_query("SELECT * FROM `walikel`"); }
  
while($data=mysql_fetch_array($q1)){ ?>
    <tr>
    <td><?php echo $data['id_wali'];?></td>
    <td><?php echo $data['nama_guru'];?></td>
    <td><?php echo $data['jk'];?></td>
    <td><?php echo $data['username'];?></td>
     <td><?php echo $data['id_kelas'];?></td>
    <td><a href="edit_walikel.php?id=<?php echo $data['id_wali'];?>" class="fa fa-edit btn btn-success"></a></td>
    <td><a href="aksi/delete_walikelas.php?id=<?php echo $data['id_wali'];?>" class="fa fa-trash btn btn-warning" name="delete" onclick="javascript: return confirm('Anda yakin hapus Data ini ?')"></a></td>
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

 <!-- Footer -->
<!--   <footer class="w3-container w3-padding-24 foot" style="float: right;position: fixed;">
    <p>Copyright 2019 © Created by SiABSis<p>
  </footer>
 -->
  <!-- End page content -->
  <!-- End page content -->
</div>

<!-- JS -->
    <script  src="assets/js/index.js"></script>
<!-- END JS -->

</body>
</html>
  
  




