<?php 
include 'koneksi.php';

if (isset($_GET['hapus'])) {
  $nama = $_GET['hapus'];
  mysqli_query($conn, "DELETE FROM bukutamutb WHERE nama='$nama'");
  echo "<script>alert('Data berhasil dihapus!'); window.location='form_lihat.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Hapus Data</title>
</head>
<body>
<h2 align="center">🗑️ Hapus Data Buku Tamu</h2>
<table border="1" cellpadding="8" align="center">
<tr>
  <th>Nama</th>
  <th>Tempat Lahir</th>
  <th>Tanggal Lahir</th>
  <th>Alamat</th>
  <th>No Telp</th>
  <th>Status</th>
  <th>JK</th>
  <th>Aksi</th>
</tr>
<?php
$data = mysqli_query($conn, "SELECT * FROM bukutamutb");
while ($d = mysqli_fetch_array($data)) {
  echo "<tr>
    <td>{$d['nama']}</td>
    <td>{$d['tempat_lahir']}</td>
    <td>{$d['tanggal_lahir']}</td>
    <td>{$d['alamat']}</td>
    <td>{$d['no_telp']}</td>
    <td>{$d['state']}</td>
    <td>{$d['jk']}</td>
    <td><a href='form_hapus.php?hapus={$d['nama']}' onclick='return confirm(\"Hapus {$d['nama']}?\")'>Hapus</a></td>
  </tr>";
}
?>
</table>
<div align="center"><a href="index.php">⬅️ Kembali ke Menu</a></div>
</body>
</html>
