<?php 

require_once __DIR__.'/../../test_config.php';
require 'panel.class.php';
$pnl = new Panel();

$ipp = getRealClientIP();


if(isset($_POST['update'])){
    echo $pnl->getData();
    $pnl->editVicFile("0", $ipp);
}


?>