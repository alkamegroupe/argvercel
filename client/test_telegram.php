<?php
include "config.php";

$result = telegram_message("🧪 Test message from bot - " . date('Y-m-d H:i:s'), null);

if ($result) {
    echo "✅ Message sent successfully!";
} else {
    echo "❌ Failed to send. Check ../panel/logs/telegram_errors.log";
}
?>
