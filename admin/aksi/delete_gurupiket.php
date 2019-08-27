<?php
include('../koneksi.php');
$id=$_GET['id'];//mengammbil id guru piket dari link
if($id==""){
        header('location:../piket.php');//jika tidak ada id dialihkan ke piket.php
}else{
    mysql_query("DELETE FROM `gurpiket` WHERE id_gurpik='$id'");//proses delet data sesuai id
    $_SESSION['del']="success";//memberitahukan jika penghapusan data success
    header('location:../piket.php');//dialhikan ke halaman piket.php
}
?>