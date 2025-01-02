<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lembaga_pencatat_akreditasi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data program studi yang menilai indikator
$sql = "SELECT kode_dik, id_indikator, nilai FROM prodi_menilai_indikator";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penilaian Indikator</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
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
    </style>
</head>
<body>

<header>
    <h1>Daftar Penilaian Indikator</h1>
</header>

<nav>
    <a href="index.php">Beranda</a>
    <a href="tambah-prodi-menilai-indikator.php">Tambah Penilaian Indikator</a>
</nav>

<div class="container">
    <h2>Daftar Penilaian Indikator</h2>

    <?php
    if ($result->num_rows > 0) {
        // Tampilkan data dalam tabel
        echo "<table>";
        echo "<tr><th>Kode DIK</th><th>ID Indikator</th><th>Nilai</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['kode_dik'] . "</td><td>" . $row['id_indikator'] . "</td><td>" . $row['nilai'] . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Tidak ada penilaian indikator yang ditemukan.</p>";
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
