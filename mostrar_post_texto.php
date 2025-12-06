<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");

// Recibir texto plano enviado por Roblox
$text = file_get_contents("php://input");

// Si no hay texto, poner un mensaje por defecto
if (!$text || trim($text) === "") {
    $text = "No se recibió texto";
}

// Mostrarlo gigante
echo "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Mensaje recibido</title>
</head>
<body style='background: #111; color: white; display:flex; justify-content:center; align-items:center; height:100vh;'>
    <div style='font-size:90px; text-align:center; font-family:Arial, sans-serif;'>
        $text
    </div>
</body>
</html>";
