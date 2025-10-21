<?php
$koneksi = new mysqli("localhost", "root", "", "bukutamudb");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$data = null;
$message = "";

// Jika tombol cari ditekan
if (isset($_POST['cari'])) {
    $nama_cari = trim($_POST['nama_cari']);
    if ($nama_cari != "") {
        $query = "SELECT * FROM bukutamutb WHERE nama = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("s", $nama_cari);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        if (!$data) {
            $message = "❌ Data dengan nama '$nama_cari' tidak ditemukan.";
        }
    } else {
        $message = "⚠️ Silakan masukkan nama terlebih dahulu.";
    }
}

// Jika tombol update ditekan
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $state = $_POST['state'];
    $jk = $_POST['jk'];
    $komentar = $_POST['komentar'];

    $query = "UPDATE bukutamutb SET tempat_lahir=?, tanggal_lahir=?, alamat=?, no_telp=?, state=?, jk=?, komentar=? WHERE nama=?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ssssssss", $tempat_lahir, $tanggal_lahir, $alamat, $no_telp, $state, $jk, $komentar, $nama);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Data berhasil diperbarui!'); window.location='form_lihat.php';</script>";
    } else {
        echo "<script>alert('❌ Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Data Buku Tamu</title>
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(to right, #dbeeff, #f4f7f9);
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 550px;
        background: white;
        margin: 50px auto;
        padding: 30px 40px;
        border-radius: 15px;
        box-shadow: 0px 8px 20px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    p {
        text-align: center;
        color: #666;
        margin-bottom: 25px;
    }

    input[type="text"],
    input[type="date"],
    textarea,
    select {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
    }

    textarea {
        resize: none;
        height: 70px;
    }

    button {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background-color: #2c82c9;
    }

    .btn-kembali {
        display: block;
        text-align: center;
        background-color: #95a5a6;
        margin-top: 15px;
        text-decoration: none;
        color: white;
        padding: 10px;
        border-radius: 8px;
    }

    .btn-kembali:hover {
        background-color: #7f8c8d;
    }

    .msg {
        text-align: center;
        color: red;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .form-cari {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-cari input {
        width: 75%;
        padding: 8px;
        border-radius: 8px;
        border: 1px solid #ccc;
    }

    .form-cari button {
        margin-left: 5px;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Edit Data Buku Tamu</h2>
    <p>Masukkan <b>nama tamu</b> yang ingin diedit, lalu ubah datanya di form di bawah.</p>

    <form method="POST" class="form-cari">
        <input type="text" name="nama_cari" placeholder="Masukkan nama yang ingin diedit" value="<?= isset($_POST['nama_cari']) ? htmlspecialchars($_POST['nama_cari']) : '' ?>">
        <button type="submit" name="cari">Cari Data</button>
    </form>

    <?php if ($message): ?>
        <div class="msg"><?= $message; ?></div>
    <?php endif; ?>

    <?php if ($data): ?>
    <form method="POST">
        <input type="hidden" name="nama" value="<?= htmlspecialchars($data['nama']); ?>">

        <label>Nama</label>
        <input type="text" value="<?= htmlspecialchars($data['nama']); ?>" disabled>

        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" value="<?= htmlspecialchars($data['tempat_lahir']); ?>">

        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="<?= htmlspecialchars($data['tanggal_lahir']); ?>">

        <label>Alamat</label>
        <input type="text" name="alamat" value="<?= htmlspecialchars($data['alamat']); ?>">

        <label>No. Telepon</label>
        <input type="text" name="no_telp" value="<?= htmlspecialchars($data['no_telp']); ?>">

        <label>Status</label>
        <select name="state">
            <option value="">-- Pilih Status --</option>
            <option value="Siswa" <?= ($data['state']=="Siswa"?"selected":"") ?>>Siswa</option>
            <option value="Guru" <?= ($data['state']=="Guru"?"selected":"") ?>>Guru</option>
            <option value="Umum" <?= ($data['state']=="Umum"?"selected":"") ?>>Umum</option>
        </select>

        <label>Jenis Kelamin</label>
        <select name="jk">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki" <?= ($data['jk']=="Laki-laki"?"selected":"") ?>>Laki-laki</option>
            <option value="Perempuan" <?= ($data['jk']=="Perempuan"?"selected":"") ?>>Perempuan</option>
        </select>

        <label>Komentar</label>
        <textarea name="komentar"><?= htmlspecialchars($data['komentar']); ?></textarea>

        <button type="submit" name="update">💾 Simpan Perubahan</button>
    </form>
    <?php endif; ?>

    <a href="form_lihat.php" class="btn-kembali">⬅ Kembali ke Data</a>
</div>

</body>
</html>