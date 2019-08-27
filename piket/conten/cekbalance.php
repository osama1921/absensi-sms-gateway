<?php
$userkey="nstovl";
$passkey="cxmz8flgbq";
$url="https://reguler.zenziva.net/apps/smsapibalance.php";
$curlHandle=curl_init();
curl_setopt($curlHandle, CURLOPT_URL, 'userkey='.$userkey.'&passkey='.$passkey);
curl_setopt($curlHandle, CURLOPT_HEADER, 0);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
curl_setopt($curlHandle, CURLOPT_POST, 1);
$result=
curl_exec($curlHandle);
curl_close($curlHandle);echo $result;
?>