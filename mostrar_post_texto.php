<?php
$text = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['text'])) {
        $text = $_POST['text'];
    } else {
        $raw = file_get_contents('php://input');
        $ct = strtolower($_SERVER['CONTENT_TYPE'] ?? '');

        if (strpos($ct, 'application/json') !== false) {
            $data = json_decode($raw, true);
            $text = $data['text'] ?? $raw;
        } else {
            $text = $raw;
        }
    }
}

function esc($s) {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>The Bloxy Wall</title>
<style>
  body { 
    background:#111; color:white; font-family:sans-serif;
    display:flex; justify-content:center; align-items:center;
    height:100vh; padding:20px; text-align:center;
  }
  .big {
    font-size: clamp(2rem, 12vw, 12rem);
    white-space: pre-wrap;
    word-wrap: break-word;
    line-height: 0.9;
  }
</style>
</head>
<body>
  <?php if ($text): ?>
    <div class="big"><?= nl2br(esc($text)) ?></div>
  <?php else: ?>
    <h1>Send text here lol</h1>
  <?php endif; ?>
</body>
</html>
