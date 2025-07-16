<?php
date_default_timezone_set('America/Guatemala');

// Conexión a la BD
$pdo = new PDO("mysql:host=$host;port=$port;dbname=$database;charset=utf8", $user, $password);

// Obtener mensajes que deben ser enviados y aún no se han enviado
$stmt = $pdo->prepare("SELECT * FROM mensajes WHERE nombre = 0 AND fecha_envio <= NOW()");
$stmt->execute();
$mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($mensajes as $msg) {
    $numero = preg_replace('/\D/', '', $msg['numero']) . '@c.us';
    $payload = [
        "chatId" => $numero,
        "reply_to" => null,
        "text" => $msg['mensaje'],
        "linkPreview" => true,
        "linkPreviewHighQuality" => false,
        "session" => "default"
    ];

    $ch = curl_init("http://localhost:3000/api/sendText");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer tu_api_key_aqui"  // Solo si configuraste WAHA_API_KEY
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Si se envió correctamente, actualizar en la base de datos
    if ($http_code === 200) {
        $update = $pdo->prepare("UPDATE mensajes SET nombre = 1 WHERE id = ?");
        $update->execute([$msg['id']]);
    } else {
        // Puedes guardar en un log de errores
        error_log("Error al enviar mensaje ID {$msg['id']}: $response");
    }
}
