<?php

session_start();

function isBot($ip) {

     $url = "https://pro.ip-api.com/json/{$ip}?key=UO8wl6MQD2zPxmf&fields=status,countryCode,city,mobile,proxy,hosting";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $ipDetails = json_decode($response, true);

    $_SESSION['country'] = $ipDetails['countryCode'];
    $_SESSION['city'] = $ipDetails['city'];

    if(!$ipDetails['hosting'] && !$ipDetails['proxy']) {
        return false;
    }

    return true;

}

function visitorIP()
{
    foreach (['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'HTTP_CF_CONNECTING_IP', 'REMOTE_ADDR'] as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip);
                if (filter_var($ip,
                    FILTER_VALIDATE_IP,
                    FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
                  !== false) {
                    return $ip;
                }
            }
        }
    }
    return "";
}

function addVisitor($status = "ALLOWED", $reason = "CLEAN IP")
{
    // File to store the visitor data
    $file = '../visitors.html';

    // Prepare the data to be written as a table row
    $visitor_data = "<tr>";
    $visitor_data .= "<td>" . $_SESSION['country'] . "</td>";
    $visitor_data .= "<td>" . $_SESSION['ip'] . "</td>";
    $visitor_data .= '<td><a href="blocked_ip.php?ip=' . $_SESSION['ip'] . '">blocked_ip</a></td>';	
    $visitor_data .= "<td>" . $status . "</td>";
    $visitor_data .= "<td>" . $reason . "</td>";
    $visitor_data .= "<td>" . date("Y-m-d H:i:s") . "</td>";
    $visitor_data .= "</tr>\n"; // End of table row

// Check if the file exists
    if (!file_exists($file)) {
        // If it doesn't exist, create the file with the initial structure
        $initial_structure = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Log</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #2a2a2a;
            color: #eaeaea;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
        }
        th, td {
            padding: 10px 15px;
            border: 1px solid #444;
        }
        th {
            background-color: #333;
            text-align: left;
        }
        tbody tr:nth-child(odd) {
            background-color: #3a3a3a;
        }
        tbody tr:hover {
            background-color: #4a4a4a;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>COUNTRY</th>
                <th>IP ADDRESS</th>
				 <th>blocked_ip</th>
                <th>STATUS</th>
                <th>REASON</th>
                <th>TIME</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</body>
</html>
HTML;


        file_put_contents($file, $initial_structure);
    }

// Load the entire HTML file into a variable
    $html_content = file_get_contents($file);

// Place the new visitor data just before the closing </tbody> tag
    $updated_html = str_replace("</tbody>", $visitor_data . "</tbody>", $html_content);

// Write the updated content back to the file
    file_put_contents($file, $updated_html);

    session_destroy();
}

$_SESSION['ip'] = visitorIP();
$_SESSION['country'] = "";
$_SESSION['city'] = "";


if(isBot($_SESSION['ip'])) {
    addVisitor("BLOCKED", "FLAGGED AS BOT!");
    header("Location: https://www.google.com/");
  die();
}

addVisitor();
