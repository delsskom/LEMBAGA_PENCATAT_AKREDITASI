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

// Query untuk mengambil data elemen
$sql = "SELECT e.id_elemen, e.nama_elemen, e.id_indikator, i.deskripsi AS indikator
        FROM elemen e
        JOIN indikator i ON e.id_indikator = i.id_indikator";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Elemen</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Set flexbox on body to ensure footer is at the bottom */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure body takes full height of the viewport */
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
            flex: 1; /* Allow container to take up remaining space */
            padding: 20px;
            text-align: center;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: white;
            margin-top: auto; /* Ensure footer is pushed to the bottom */
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
    <h1>Daftar Elemen</h1>
</header>

<nav>
    <a href="index.php">Beranda</a>
    <a href="tambah-elemen.php">Tambah Elemen</a>
</nav>

<div class="container">
    <h2>Daftar Elemen</h2>

    <?php
    if ($result->num_rows > 0) {
        // Tampilkan data elemen dalam tabel
        echo "<table>";
        echo "<tr><th>ID Elemen</th><th>Nama Elemen</th><th>Indikator</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['id_elemen'] . "</td><td>" . $row['nama_elemen'] . "</td><td>" . $row['indikator'] . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Tidak ada elemen yang ditemukan.</p>";
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
