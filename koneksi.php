<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "bukutamudb";

// buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
