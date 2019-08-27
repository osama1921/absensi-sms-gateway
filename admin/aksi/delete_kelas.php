<?php
include('../koneksi.php');
$id=$_GET['id'];
if($id==""){
        header('location:../kelas.php');
}else{
    mysql_query("DELETE FROM `kelas` WHERE id_kelas='$id'");
    $_SESSION['del']="success";
    header('location:../kelas.php');
}
?>