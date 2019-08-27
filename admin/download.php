<?php
include('koneksi.php');
$files= scandir('import/format');
header("location: import/format/".$files[2]);

?>