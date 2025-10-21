<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Cari Data Buku Tamu</title>
<style>
body{font-family:Arial;background:#f8f9fa}
.wrap{width:90%;max-width:1000px;margin:20px auto}
form{text-align:center;margin-bottom:12px}
input[type=text]{padding:8px;width:60%;max-width:500px}
button{padding:8px 12px;background:#007bff;color:#fff;border:none;border-radius:4px;cursor:pointer}
table{width:100%;border-collapse:collapse;background:#fff}
th,td{border:1px solid #ddd;padding:8px;text-align:left}
th{background:#007bff;color:#fff}
a.action{display:inline-block;padding:4px 8px;border-radius:4px;color:#fff;text-decoration:none}
.edit{background:#28a745}
.del{background:#dc3545}
</style>
</head>
<body>
<div class="wrap">
<h2 style="text-align:center">🔍 Cari Data Buku Tamu</h2>

<form method="get" action="form_cari.php">
    <input type="text" name="keyword" placeholder="Cari nama / tempat / alamat / komentar..." value="<?php echo isset($_GET['keyword'])?htmlspecialchars($_GET['keyword']):''; ?>" required>
    <button type="submit">Cari</button>
    <a href="index.php" style="margin-left:10px;text-decoration:none;">⬅️ Kembali</a>
</form>

<?php
if (isset($_GET['keyword'])) {
    $kw = mysqli_real_escape_string($conn, trim($_GET['keyword']));

    $sql = "SELECT nama, tempat_lahir, tanggal_lahir, alamat, no_telp, state, jk, komentar
            FROM bukutamutb
            WHERE nama LIKE '%$kw%'
               OR tempat_lahir LIKE '%$kw%'
               OR alamat LIKE '%$kw%'
               OR komentar LIKE '%$kw%'
            ORDER BY nama ASC";

    $res = mysqli_query($conn, $sql);

    if (!$res) {
        echo "<p style='color:red'>Query error: ".mysqli_error($conn)."</p>";
    } else {
        if (mysqli_num_rows($res) == 0) {
            echo "<p style='text-align:center'>Data tidak ditemukan untuk: <b>".htmlspecialchars($kw)."</b></p>";
        } else {
            echo "<table>";
            echo "<tr><th>Nama</th><th>Tempat Lahir</th><th>Tanggal Lahir</th><th>Alamat</th><th>No. Telp</th><th>Status</th><th>JK</th><th>Komentar</th><th>Aksi</th></tr>";
            while ($r = mysqli_fetch_assoc($res)) {
                $nama_enc = rawurlencode($r['nama']); // pake rawurlencode supaya aman di URL
                echo "<tr>";
                echo "<td>".htmlspecialchars($r['nama'])."</td>";
                echo "<td>".htmlspecialchars($r['tempat_lahir'])."</td>";
                echo "<td>".htmlspecialchars($r['tanggal_lahir'])."</td>";
                echo "<td>".htmlspecialchars($r['alamat'])."</td>";
                echo "<td>".htmlspecialchars($r['no_telp'])."</td>";
                echo "<td>".htmlspecialchars($r['state'])."</td>";
                echo "<td>".htmlspecialchars($r['jk'])."</td>";
                echo "<td>".nl2br(htmlspecialchars($r['komentar']))."</td>";
                echo "<td>
                        <a class='action edit' href='form_edit.php?nama={$nama_enc}'>Edit</a> 
                        <a class='action del' href='form_hapus.php?hapus={$nama_enc}' onclick=\"return confirm('Hapus data ".htmlspecialchars(addslashes($r['nama']))."?')\">Hapus</a>
                      </td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_free_result($res);
    }
}
?>
</div>
</body>
</html>
