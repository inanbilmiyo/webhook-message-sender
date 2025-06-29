<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Teamly Webhook Paneli</title>
  <style>
    body { font-family: sans-serif; padding: 30px; background: #f5f5f5; }
    form { background: white; padding: 20px; border-radius: 10px; max-width: 500px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    textarea { width: 100%; height: 100px; resize: none; }
    button { margin-top: 10px; padding: 10px 20px; font-size: 16px; }
    .success { color: green; margin-bottom: 10px; }
  </style>
</head>
<body>

  <form action="send.php" method="POST">
    <?php if (isset($_GET['sent']) && $_GET['sent'] === 'true'): ?>
      <div class="success">✅ Mesaj başarıyla gönderildi!</div>
    <?php endif; ?>
    <label for="message">Mesaj:</label><br>
    <textarea name="message" id="message" required></textarea><br>
    <button type="submit">Gönder</button>
  </form>

</body>
</html>
