<?php
// Koneksi ke database
include 'koneksi.php'; // Pastikan file ini berisi koneksi ke database

// Query untuk mengambil data universitas
$sql = "SELECT id_univ, nama_univ FROM universitas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universitas - Sistem Akreditasi</title>
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        body {
            display: flex;
            flex-direction: column;
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
            flex: 1; /* Allows the container to take up remaining space */
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
            margin-top: auto; /* Pushes footer to the bottom */
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
    </style>
</head>
<body>

<header>
    <h1>Data Universitas</h1>
</header>

<nav>
    <a href="masuk.php">Kembali ke Masuk</a>
    <a href="tambah-univ.php">Tambah Universitas</a>
</nav>

<div class="container">
    <h2>Daftar Universitas</h2>

    <?php
    if ($result->num_rows > 0) {
        // Tampilkan data universitas dalam tabel
        echo "<table>";
        echo "<tr><th>ID Universitas</th><th>Nama Universitas</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['id_univ'] . "</td><td>" . $row['nama_univ'] . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Tidak ada data universitas yang ditemukan.</p>";
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
