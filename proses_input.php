<?php
include 'koneksi.php';

$nama          = $_POST['nama'];
$tempat_lahir  = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat        = $_POST['alamat'];
$no_telp       = $_POST['no_telp'];
$state         = $_POST['state'];
$jk            = $_POST['jk'];
$komentar      = $_POST['komentar'];

$sql = "INSERT INTO bukutamutb (nama, tempat_lahir, tanggal_lahir, alamat, no_telp, state, jk, komentar)
        VALUES ('$nama','$tempat_lahir','$tanggal_lahir','$alamat','$no_telp','$state','$jk','$komentar')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Data berhasil disimpan'); window.location='form_lihat.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
