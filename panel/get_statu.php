<?php 

if(isset($_POST['get'])){
require 'panel.class.php';
$pnl = new Panel;
$time = $pnl->getStatu($_POST['ip']);
if($time >= time() - 5){
    echo '<span style="color:green;">online</span>';
}else{
    echo '<span style="color:red;">offline</span>';
}
}


?>