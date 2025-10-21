<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Menu Utama - Buku Tamu</title>
  <style>
    body { font-family: Arial; text-align: center; background: #b1f593ff; }
    h1 { color: #333; margin-top: 40px; }
    .menu a {
      display: inline-block; background: #09ff00ff; color: #fff;
      padding: 12px 25px; margin: 10px; border-radius: 8px;
      text-decoration: none; font-weight: bold; transition: 0.3s;
    }
    .menu a:hover { background: #00ff04ff; transform: scale(1.05); }
  </style>
</head>
<body>
  <h1>SISTEM BUKUTAMU</h1>
  <div class="menu">
    <a href="form_input.php">➕ Tambah Data</a>
    <a href="form_lihat.php">👀 Lihat Data</a>
    <a href="form_cari.php">🔍 Cari Data</a>
    <a href="form_edit.php">✏️ Edit Data</a>
    <a href="form_hapus.php">🗑️ Hapus Data</a>
  </div>
</body>
</html>
