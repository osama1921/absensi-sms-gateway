<?php
include('../koneksi.php');
$id=$_GET['id'];
if($id==""){
        header('location:../walikel.php');
}else{
    mysql_query("DELETE FROM `walikel` WHERE `id_wali`='$id'");
    $_SESSION['del']="success";
    header('location:../walikel.php');
}
?>