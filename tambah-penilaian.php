<?php
// Koneksi ke database
$servername = "127.0.0.1";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "lembaga_pencatat_akreditasi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proses tambah data penilaian
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_dik = $_POST['kode_dik'];
    $id_fak = $_POST['id_fak'];
    $id_univ = $_POST['id_univ'];
    $id_indikator = $_POST['id_indikator'];
    $nilai = $_POST['nilai'];

    // Validasi foreign key
    $cek_indikator = $conn->query("SELECT id_indikator FROM indikator WHERE id_indikator = $id_indikator");
    if ($cek_indikator->num_rows === 0) {
        echo "<p style='color: red;'>Error: ID Indikator tidak valid. Harap masukkan ID yang sesuai dengan tabel indikator.</p>";
    } else {
        $sql = "INSERT INTO penilaian (kode_dik, id_fak, id_univ, id_indikator, nilai) 
                VALUES ('$kode_dik', $id_fak, $id_univ, $id_indikator, $nilai)";
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>Data penilaian berhasil ditambahkan!</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
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
    <title>Tambah Penilaian</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            height: 100vh; /* Menggunakan full height */
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
            flex-grow: 1; /* Membuat container mengisi ruang yang tersisa */
        }

        table {
            width: 50%;
            margin: 0 auto;
            border-collapse: collapse;
            background: white;
        }

        td {
            padding: 10px;
            vertical-align: middle;
        }

        td:first-child {
            font-weight: bold;
            background-color: #f9f9f9;
        }

        input[type="text"], input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: white;
            margin-top: auto; /* Footer akan berada di bawah */
        }
    </style>
</head>
<body>
<header>
    <h1>Form Tambah Penilaian</h1>
</header>
<nav>
    <a href="index.php">Beranda</a>
    <a href="penilaian.php">Daftar Penilaian</a>
</nav>
<div class="container">
    <h2>Tambah Penilaian Baru</h2>
    <form method="POST" action="">
        <table>
            <tr>
                <td>Kode Dik:</td>
                <td><input type="text" id="kode_dik" name="kode_dik" required></td>
            </tr>
            <tr>
                <td>ID Fakultas:</td>
                <td><input type="number" id="id_fak" name="id_fak" required></td>
            </tr>
            <tr>
                <td>ID Universitas:</td>
                <td><input type="number" id="id_univ" name="id_univ" required></td>
            </tr>
            <tr>
                <td>ID Indikator:</td>
                <td><input type="number" id="id_indikator" name="id_indikator" required></td>
            </tr>
            <tr>
                <td>Nilai:</td>
                <td><input type="number" step="0.01" id="nilai" name="nilai" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Tambah Penilaian">
                </td>
            </tr>
        </table>
    </form>
</div>
<footer>
    <p>&copy; 2025 Sistem Penilaian. Semua Hak Dilindungi.</p>
</footer>
</body>
</html>
