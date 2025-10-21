<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Buku Tamu</title>
</head>
<body>
  <h2 align="center">📘 Data Buku Tamu</h2>
  <table border="1" align="center" cellpadding="8">
    <tr>
      <th>Nama</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Alamat</th>
      <th>No Telp</th>
      <th>Status</th>
      <th>Jenis Kelamin</th>
      <th>Komentar</th>
      <th>Aksi</th>
    </tr>
    <?php
    $data = mysqli_query($conn, "SELECT * FROM bukutamutb");
    while ($row = mysqli_fetch_assoc($data)) {
        echo "<tr>
          <td>{$row['nama']}</td>
          <td>{$row['tempat_lahir']}</td>
          <td>{$row['tanggal_lahir']}</td>
          <td>{$row['alamat']}</td>
          <td>{$row['no_telp']}</td>
          <td>{$row['state']}</td>
          <td>{$row['jk']}</td>
          <td>{$row['komentar']}</td>
          <td>
            <a href='form_edit.php?nama={$row['nama']}'>Edit</a> |
            <a href='form_hapus.php?hapus={$row['nama']}'
               onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
          </td>
        </tr>";
    }
    ?>
  </table>
  <div align="center" style="margin-top:10px;">
    <a href="index.php">⬅️ Kembali ke Menu</a>
  </div>
</body>
</html>
