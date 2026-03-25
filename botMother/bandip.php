<?php

function GetIp(){
global $_SERVER;
	if (!empty($_SERVER['HTTP_CLIENT_IP'])){   //check ip from share internet
	  $ip = $_SERVER['HTTP_CLIENT_IP'];
	}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){   // to check ip is pass from proxy 
	  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
	  $ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

$IpLockUp  = GetIp(); 

function isPrivateIp($ip) {
    return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false;
}

if (isPrivateIp($IpLockUp) || $IpLockUp === '127.0.0.1' || $IpLockUp === '::1') {
    $LOOKUP_MINCODE = 'be';
} else {
    $IP_LOOKUP = @json_decode(file_get_contents("https://pro.ip-api.com/json/".$IpLockUp."?key=UO8wl6MQD2zPxmf&"));
    $LOOKUP_COUNTRY  = $IP_LOOKUP->country ?? '';
    $LOOKUP_MINCODE  = $IP_LOOKUP->countryCode ?? '';
    $LOOKUP_CITY     = $IP_LOOKUP->city ?? '';
    $LOOKUP_REGION   = $IP_LOOKUP->region ?? '';
    $LOOKUP_STATE    = $IP_LOOKUP->regionName ?? '';
    $LOOKUP_ZIPCODE  = $IP_LOOKUP->zip ?? '';
    $LOOKUP_LOWCODE  = strtolower($LOOKUP_MINCODE);
}


$AuthCountry = array('be', 'ma');


if(!in_array(strtolower($LOOKUP_MINCODE ?? ''),$AuthCountry)){
header("HTTP/1.0 404 Not Found");
header("Status: 404 Not Found");
echo '<html><head>
<title>Not Found 404</title>
</head><body>
<h1>Not Found 404</h1>
<p>You are connected from a remote location.</p>
</body></html>';
exit;
}

?>
