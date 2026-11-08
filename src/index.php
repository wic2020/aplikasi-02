<?php
$host = getenv('MYSQL_HOST') ?: 'core-db';
$user = getenv('MYSQL_USER');
$pass = getenv('MYSQL_PASSWORD');
$name = getenv('MYSQL_DATABASE');

try {
    $db = new mysqli($host, $user, $pass, $name);
    if ($db->connect_error) {
        throw new Exception($db->connect_error);
    }
    $status = "[OK] Berhasil terhubung ke MySQL core-db (" . htmlspecialchars($name) . ")";
} catch (Throwable $e) {
    $status = "[FAIL] Koneksi DB gagal: " . htmlspecialchars($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Aplikasi 02 - Diskominfo Kab. Jombang</title>
  <style>
    body { font-family: sans-serif; padding: 40px; background: #f8fafc; color: #0f172a; }
    .card { background: white; border: 1px solid #e2e8f0; padding: 24px; border-radius: 8px; max-width: 600px; margin: 0 auto; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
    .badge { background: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 4px; font-weight: bold; }
  </style>
</head>
<body>
  <div class="card">
    <h2>Aplikasi 02 Diskominfo Jombang</h2>
    <p>Status Container: <strong>Running (Portless di diskominfo-net)</strong></p>
    <p>Versi PHP: <strong><?= phpversion(); ?></strong></p>
    <p>Database Server: <span class="badge"><?= $status; ?></span></p>
  </div>
</body>
</html>
