<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Input Buku Tamu</title>
</head>
<body>
  <h2 align="center">Form Input Buku Tamu</h2>
  <form action="proses_input.php" method="post" align="center">
    <table align="center" cellpadding="8">
      <tr><td>Nama</td><td><input type="text" name="nama" required></td></tr>
      <tr><td>Tempat Lahir</td><td><input type="text" name="tempat_lahir" required></td></tr>
      <tr><td>Tanggal Lahir</td><td><input type="date" name="tanggal_lahir" required></td></tr>
      <tr><td>Alamat</td><td><input type="text" name="alamat"></td></tr>
      <tr><td>No. Telp</td><td><input type="text" name="no_telp"></td></tr>
      <tr><td>Status</td>
        <td>
          <select name="state">
            <option value="Mahasiswa">Mahasiswa</option>
            <option value="Dosen">Dosen</option>
            <option value="Umum">Umum</option>
          </select>
        </td>
      </tr>
      <tr><td>Jenis Kelamin</td>
        <td>
          <input type="radio" name="jk" value="Laki-laki">Laki-laki
          <input type="radio" name="jk" value="Perempuan">Perempuan
        </td>
      </tr>
      <tr><td>Komentar</td><td><textarea name="komentar" rows="4" cols="30"></textarea></td></tr>
      <tr><td colspan="2" align="center"><button type="submit">Simpan</button></td></tr>
    </table>
  </form>
  <div align="center" style="margin-top:10px;">
    <a href="index.php">⬅️ Kembali ke Menu</a>
  </div>
</body>
</html>
