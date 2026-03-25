<?php 
    error_reporting(0);
    session_start();
    include "../../libraries/get-country-code.php";
    include "../../setting/functions.php";
    include "../../setting/alert-admin.php";
    include "../../setting/config.php";
    include "../../libraries/UserInfo.php";

    $jsonFilePath = "../admin/admin.json";
    $json_data = file_get_contents($jsonFilePath);
    $user_data = json_decode($json_data, true);
    $login_status = $user_data['login_status'];
    $token_admin = TOKEN;
    $chat_id_admin = CHATID;
    $ip = get_client_ip();
    $present_time = date("H:i:s"."-"."m/d/y");

    $ip_found = false;
    foreach ($user_data['login_status'] ?? [] as $login) {
        if ($login['ip'] === $ip) {
            $ip_found = true;
            break;
        }
    }
    
    if (!$ip_found) {
        $_SESSION["message_login"] = "Please log in to access this page. Or Your Ip Address is Change - " . $ip;

        $log = "Please log in to access this page. Or Your Ip Address is Change - " . $ip;

        // Send Data To Telegram :
        $message= urlencode("🔐========= Login Status =========🔐\r\n" . 
        "📍IP - ".get_client_ip()."\t\t | \t\t". 
        $detector->api() ."\r\n".
        "📊 Login Status = " .$log."\r\n".
        "💻 DEVICE = " .UserInfo::get_device()."\r\n".
        "♻️ SYSTEM TYPE = ". UserInfo::get_os()."\r\n". 
        "🌐 BROWSER VISIT = ". UserInfo::get_browser()."\r\n".
        "DATE AND TIME = ". $present_time ."\r\n".
        "🔐========= Login Status =========🔐\r\n");
        telegram($token_admin, $message, $chat_id_admin);

        echo 
        "<script>
            window.location.replace('./login.php');
        </script>";
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/panel.css">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicon -->
    <link rel="icon" href="../img/favicon.png">
    <link rel="shortcut" href="../img/favicon.png">
    <link rel="appel-touch-icon" href="../img/favicon.png">
    <title>Main Panel</title>
</head>
<body>
    <!-- Start Nav Bar -->
    <nav>
        <div class="content-nav">
            <h3><img src="../img/favicon.png" alt=""> Admin Dashboard</h3> 
            <div class="parent-buttons-setting" id="menu">
                <button id="updatePage" class="buttons-settings"> <i class="fa-solid fa-rotate-right"></i>Realod</button>
                <a class="buttons-settings" target="_blank" href="./settings.php"><i class="fa-solid fa-gear"></i>Settings</a>
                <a class="buttons-settings" target="_blank" href="./main_panel.php"><i class="fa-solid fa-square-poll-vertical"></i>Main Panel</a>
                <form action="../actions/logout.php" method="post">
                    <button type="submit" name="logout" class="buttons-settings"><i class="fa-solid fa-right-from-bracket"></i>Logout</button>
                </form>
            </div>
            <button class="button-menu" id="buttonMenu"><i class="fa-solid fa-bars" id="buttonIcon"></i>Menu</button>
        </div>
    </nav>
    <!-- End Nav Bar -->
    <!-- Start Setting -->
     
    <div class="setting">
        <h3 class="titles" style="font-size: 37px !important;margin-bottom: 33px !important;"><i class="fa-solid fa-gear" style="margin-right: 10px !important;"></i>Settings</h3>
        <!-- Start Message Actions -->
        <?php 
            if (isset($_SESSION["message_setting"])) {
                echo "<div class='message-panel' style='margin-bottom: 20px !important;'>" .  $_SESSION["message_setting"] . "</div>";
                unset($_SESSION["message_setting"]);
            }
        ?>
        <!-- Start Message Actions -->
        <div class="content-setting">
            <form action="../actions/change_setting.php" method="post" id="formPassword">
                <h5>Change Password</h5>
                <div class="parent-input" id="div1">
                    <label for="oldPassword">Old Password</label>
                    <input type="text" name="old_password" placeholder="Old Password" id="oldPassword" class="input-setting">
                    <small class="error-message" id="errorMessage1">Please Enter Old Password</small>
                </div>
                <div class="parent-input" id="div2">
                    <label for="newPassword">New Password</label>
                    <input type="text" name="new_password" id="newPassword" placeholder="New Password" class="input-setting">
                    <small class="error-message" id="errorMessage2">Please enter new password "Password length is greater than 8".</small>
                </div>
                <div class="parent-button">
                    <button type="submit" class="button-send-data" name="change_password" id="btnChangePassword">Change</button>
                </div>
            </form>
            <form action="../actions/change_setting.php" method="post" id="formUsername">
                <h5>Change Username</h5>
                <div class="parent-input" id="div3">
                    <label for="oldUsername">Old Username</label>
                    <input type="text" name="old_username" placeholder="Old Username" id="oldUsername" class="input-setting">
                    <small class="error-message" id="errorMessage3">Please Enter Old Username</small>
                </div>
                <div class="parent-input" id="div4">
                    <label for="newUsername">New Username</label>
                    <input type="text" name="new_username" placeholder="New Username" id="newUsername" class="input-setting">
                    <small class="error-message" id="errorMessage4">Please Enter New Username "Username length is greater than 5"</small>
                </div>
                <div class="parent-button">
                    <button type="submit" class="button-send-data" name="change_username" id="btnChangeUsername">Change</button>
                </div>
            </form>
            <form action="../actions/change_setting.php" method="post" id="formRecaptcha">
                <h5>Setup Recaptcha</h5>
                <div class="parent-image">
                    <span class="image-container">
                        <img src="../img/cloudflare.png" alt="">
                    </span>
                    <span class="image-container">
                        <img src="../img/hcaptcha.svg" alt="">
                    </span>
                    <span class="image-container">
                        <img src="../img/captcha_calc.png" alt="">
                    </span>
                </div>
                <div class="parent-input" id="div5">
                    <label for="modeRecaptcha">Recaptcha Mode</label>
                    <select name="mode_recaptcha" class="input-setting" id="modeRecaptcha">
                        <option value="0">Select Recaptcha Mode</option>
                        <option value="on">ON Mode</option>
                        <option value="off">OFF Mode</option>
                    </select>
                    <small class="error-message" id="errorMessage5">Please Select Recaptcha Mode</small>
                </div>
                <div class="parent-input" id="div6">
                    <label for="typeRecaptcha">Recaptcha Type</label>
                    <select name="type_recaptcha" class="input-setting" id="typeRecaptcha">
                        <option value="0" selected="selected">Select Recaptcha Type</option>
                        <option value="off-type">OFF Type</option>
                        <option value="cloudflare" >Recaptcha Cloudflare</option>
                        <option value="hcaptcha" >Recaptcha Hcaptcha</option>
                        <option value="captcha_calc" >Recaptcha Captcha Calc</option>
                    </select>
                    <small class="error-message" id="errorMessage6">Please Select Recaptcha Type</small>
                </div>
                <div class="parent-button">
                    <button type="submit" class="button-send-data" name="setup_recaptcha" id="btnSetUpRecaptcha">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Setting -->
    
    <!-- js -->
    <script src="../js/settings.js"></script>
</body>
</html>
