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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $kode_dik = $_POST['kode_dik'];
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $nmr_sk_pendirian = $_POST['nmr_sk_pendirian'];
    $id_fak = $_POST['id_fak'];

    // Query untuk menambah data
    $sql = "INSERT INTO prodi (kode_dik, nama_prodi, jenjang, nmr_sk_pendirian, id_fak)
            VALUES ('$kode_dik', '$nama_prodi', '$jenjang', '$nmr_sk_pendirian',  '$id_fak')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Data berhasil ditambahkan!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Program Studi</title>
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

        form input, form select, form textarea {
            padding: 10px;
            margin: 10px;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        .container p {
            font-size: 16px;
            color: #d9534f;
        }
    </style>
</head>
<body>

<header>
    <h1>Tambah Program Studi</h1>
</header>

<nav>
    <a href="index.php">Beranda</a>
    <a href="prodi.php">Daftar Program Studi</a>
</nav>

<div class="container">
    <div class="card">
        <h2>Form Tambah Program Studi</h2>
        <form method="POST" action="tambah-prodi.php">
            <label for="kode_dik">Kode Program Studi:</label>
            <input type="text" id="kode_dik" name="kode_dik" required>

            <label for="nama_prodi">Nama Program Studi:</label>
            <input type="text" id="nama_prodi" name="nama_prodi" required>

            <label for="jenjang">Jenjang:</label>
            <input type="text" id="jenjang" name="jenjang" required>

            <label for="nmr_sk_pendirian">Nomor SK Pendirian:</label>
            <input type="text" id="nmr_sk_pendirian" name="nmr_sk_pendirian" required>

            <label for="id_fak">ID Fakultas:</label>
            <input type="number" id="id_fak" name="id_fak" required>

            <button type="submit">Tambah Program Studi</button>
        </form>
    </div>
</div>

<footer>
    <p>&copy; 2025 Sistem Akreditasi. Semua Hak Dilindungi.</p>
</footer>

</body>
</html>
