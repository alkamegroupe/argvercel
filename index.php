<?php
session_start();
require_once __DIR__.'/test_config.php';
$real_ip = getRealClientIP();
$_SESSION['passport'] = $real_ip;
$log = "VISIT FROM ".$real_ip."\n";
$fp = fopen("logs.txt", "a");
fwrite($fp, $log);
fclose($fp);
header("location: msdpweb/index.php");
?>