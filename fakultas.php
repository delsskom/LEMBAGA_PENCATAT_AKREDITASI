<?php
// Koneksi ke database
$servername = "localhost";  // Atau bisa menggunakan '127.0.0.1'
$username = "root";         // Default username pada XAMPP atau Laragon adalah 'root'
$password = "";             // Default password pada XAMPP atau Laragon adalah kosong
$dbname = "lembaga_pencatat_akreditasi";  // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data fakultas
$sql = "SELECT id_fak, nama_fak, id_univ FROM fakultas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Fakultas</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            height: 100vh; /* Membuat body memenuhi seluruh tinggi layar */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #333;
        }

        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }

        nav a:hover {
            background-color: #575757;
        }

        .container {
            padding: 20px;
            text-align: center;
            flex: 1; /* Membuat container utama mengisi ruang yang tersisa */
        }

        .card {
            background: white;
            margin: 20px auto;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 80%;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: white;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table td {
            background-color: #f9f9f9;
        }

        h1, h2 {
            font-size: 24px;
            color: #333;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .container p {
            font-size: 16px;
            color: #d9534f;
        }
    </style>
</head>
<body>

<header>
    <h1>Daftar Fakultas</h1>
</header>

<nav>
    <a href="masuk.php">Beranda</a>
    <a href="tambah-fak.php">Tambah Fakultas</a>
</nav>

<div class="container">
    <h2>Daftar Fakultas yang Tersedia</h2>

    <?php
    if ($result->num_rows > 0) {
        // Menampilkan data fakultas dalam bentuk tabel
        echo "<table>";
        echo "<tr><th>ID Fakultas</th><th>Nama Fakultas</th><th>ID Universitas</th></tr>";

        // Mengambil dan menampilkan setiap baris data
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['id_fak'] . "</td><td>" . $row['nama_fak'] . "</td><td>" . $row['id_univ'] . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Tidak ada data fakultas yang ditemukan.</p>";
    }

    // Menutup koneksi
    $conn->close();
    ?>
</div>

<footer>
    <p>&copy; 2025 Sistem Akreditasi. Semua Hak Dilindungi.</p>
</footer>

</body>
</html>
