<?php


ob_start();

system('ipconfig /all'); 

$mycom=ob_get_contents(); // Capture the output into a variable

ob_clean(); 

$findme = "Physical";

$pos = strpos($mycom, $findme);

$macp=substr($mycom,($pos+36),17);
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
echo "mac address laptop : ".$macp."<br>";
echo "hostname Laptop : ".$hostname."<br>";
// date_default_timezone_set('Asia/Jakarta');
// $jam=date('H:i');
// echo $jam;
?>