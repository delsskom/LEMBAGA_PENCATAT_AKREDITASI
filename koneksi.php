<?php
// Koneksi ke database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "lembaga_pencatat_akreditasi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Koneksi berhasil, tetapi tidak ada pesan yang ditampilkan
?>
