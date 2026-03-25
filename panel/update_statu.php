<?php 

if(isset($_POST['update'])){
require 'panel.class.php';
$pnl = new Panel;
$pnl->updateStatu($_POST['ip']);
}


?>