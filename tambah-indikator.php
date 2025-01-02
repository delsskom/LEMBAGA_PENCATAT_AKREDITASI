<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lembaga_pencatat_akreditasi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses ketika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_elemen = isset($_POST['id_elemen']) ? intval($_POST['id_elemen']) : null;
    $deskripsi = $conn->real_escape_string($_POST['deskripsi']);
    $rumus = $conn->real_escape_string($_POST['rumus']);
    $unit = $conn->real_escape_string($_POST['unit']);

    if ($id_elemen === null || $id_elemen === 0) {
        echo "<p>Peringatan: ID Elemen tidak boleh kosong atau invalid.</p>";
    } else {
        // Validasi apakah id_elemen ada di tabel elemen
        $cek_elemen = $conn->query("SELECT * FROM elemen WHERE id_elemen = $id_elemen");

        if ($cek_elemen->num_rows == 0) {
            echo "<p>Error: ID Elemen tidak valid. Pastikan ID Elemen sudah ada di tabel elemen.</p>";
        } else {
            // Query untuk menyimpan data indikator
            $sql = "INSERT INTO indikator (id_elemen, deskripsi, rumus, unit) 
                    VALUES ('$id_elemen', '$deskripsi', '$rumus', '$unit')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Indikator berhasil ditambahkan!</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
        }
    }
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Indikator</title>
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
        form input, form textarea, form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<header>
    <h1>Tambah Indikator</h1>
</header>
<nav>
    <a href="index.php">Beranda</a>
    <a href="indikator.php">Daftar Indikator</a>
</nav>
<div class="container">
    <div class="card">
        <h2>Formulir Tambah Indikator</h2>
        <form method="POST" action="">
            <label for="id_elemen">ID Elemen:</label>
            <input type="text" id="id_elemen" name="id_elemen" required><br>

            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea><br>

            <label for="rumus">Rumus:</label>
            <input type="text" id="rumus" name="rumus" required><br>

            <label for="unit">Unit:</label>
            <input type="text" id="unit" name="unit" required><br>

            <button type="submit">Tambah Indikator</button>
        </form>
    </div>
</div>
<footer>
    <p>&copy; 2025 Sistem Akreditasi. Semua Hak Dilindungi.</p>
</footer>
</body>
</html>
