<?php
include('../admin/i.php');
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
if($hostname=="osama-PC"&&$macp=="02-BB-AE-16-00-82"){
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>SiABSIs Login</title>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,400italic,700italic,700'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
<div class="title">
 <CENTER><h1>SiABSis</h1></CENTER>
 <center><h3>Sistem Absensi Siswa Dengan SMS Gateway</h3></center>
</div>
  <div class='form animated bounceIn'>
  <h2>Login Admin</h2>
  <?php
  session_start();
if(!empty($_SESSION['msg'])) {
  echo "<p class='alert alert-danger'>".$_SESSION['msg']."</p>";
}
session_destroy();
?>
  <form action="aksi/aksi.php" method="POST">
    <input placeholder='Username' type='text' name="user">
    <input placeholder='Password' type='password' name="pass">
    <button class='animated infinite pulse' name="submit" type="submit">Login</button>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

</body>

</html>
<?php
}else{
  header('location:000.html');
}
?>