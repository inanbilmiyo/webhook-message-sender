<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $webhook_url = 'https://api.teamly.one/api/v1/webhooks/e85425dfa59f23dd/nsq8lw595oe2put7vnvls71kd34k6blfvhykvenfn1so';

    $payload = json_encode([
        "content" => $_POST['message'],
        "username" => "PHP Webhook Bot",
        "avatar_url" => "https://i.imgur.com/AfFp7pu.png" // İsteğe bağlı
    ]);

    $ch = curl_init($webhook_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code === 200) {
        header('Location: index.php?sent=true');
        exit;
    } else {
        echo "❌ Mesaj gönderilemedi: HTTP $http_code<br>";
        echo "Yanıt: $response";
    }
} else {
    echo "❌ Geçersiz istek.";
}
?>
