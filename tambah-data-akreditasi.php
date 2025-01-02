<?php
// Konfigurasi koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lembaga_pencatat_akreditasi";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_la = $_POST['id_la'];
    $id_univ = $_POST['id_univ'];
    $kode_dik = $_POST['kode_dik'];
    $tgl_mulai_akreditasi = $_POST['tgl_mulai_akreditasi'];
    $status_akreditasi = $_POST['status_akreditasi'];
    $tgl_akhir_akreditasi = $_POST['tgl_akhir_akreditasi'];

    // Query untuk menyimpan data ke dalam tabel akreditasi
    $sql = "INSERT INTO akreditasi (id_la, id_univ, kode_dik, tgl_mulai_akreditasi, status_akreditasi, tgl_akhir_akreditasi) 
            VALUES ('$id_la', '$id_univ', '$kode_dik', '$tgl_mulai_akreditasi', '$status_akreditasi', '$tgl_akhir_akreditasi')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='data-akreditasi.php';</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
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
    <title>Tambah Data Akreditasi</title>
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

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
<header>
    <h1>Tambah Data Akreditasi</h1>
</header>

<nav>
    <a href="index.php">Beranda</a>
    <a href="data-akreditasi.php">Data Akreditasi</a>
</nav>

<div class="container">
    <form method="POST" action="tambah-data-akreditasi.php">
        <div class="form-group">
            <label for="id_la">ID LA:</label>
            <input type="number" id="id_la" name="id_la" required>
        </div>
        <div class="form-group">
            <label for="id_univ">ID Universitas:</label>
            <input type="number" id="id_univ" name="id_univ" required>
        </div>
        <div class="form-group">
            <label for="kode_dik">Kode DIK:</label>
            <input type="text" id="kode_dik" name="kode_dik" required>
        </div>
        <div class="form-group">
            <label for="tgl_mulai_akreditasi">Tanggal Mulai Akreditasi:</label>
            <input type="date" id="tgl_mulai_akreditasi" name="tgl_mulai_akreditasi" required>
        </div>
        <div class="form-group">
            <label for="status_akreditasi">Status Akreditasi:</label>
            <select id="status_akreditasi" name="status_akreditasi" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="TIDAK TERAKREDITASI">TIDAK TERAKREDITASI</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tgl_akhir_akreditasi">Tanggal Akhir Akreditasi:</label>
            <input type="date" id="tgl_akhir_akreditasi" name="tgl_akhir_akreditasi">
        </div>
        <button type="submit">Tambah</button>
    </form>
</div>

<footer>
    <p>&copy; 2025 Sistem Akreditasi. Semua Hak Dilindungi.</p>
</footer>
</body>
</html>
