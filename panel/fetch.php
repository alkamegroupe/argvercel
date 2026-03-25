<?php 

require 'panel.class.php';
$pnl = new Panel();

if($_SERVER['REMOTE_ADDR']=="::1"){
    $ipp = "127.0.0.1";
}else{
$ipp = $_SERVER['REMOTE_ADDR'];
}


if(isset($_POST['update'])){
    echo $pnl->getData();
    $pnl->editVicFile("0", $ipp);
}


?>