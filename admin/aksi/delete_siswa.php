<?php
include('../koneksi.php');
$id=$_GET['id'];
if($id==""){
        header('location:../siswa.php');
}else{
    mysql_query("DELETE FROM `siswa` WHERE `NIS`='$id'");
    $_SESSION['del']="success";
    header('location:../siswa.php');

}
?>