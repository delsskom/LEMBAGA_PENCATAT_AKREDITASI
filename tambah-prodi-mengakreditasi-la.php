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

// Proses form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_dik = $_POST['kode_dik'];
    $id_la = $_POST['id_la'];

    // Query untuk menyimpan data ke dalam tabel prodi_mengakreditasi_la
    $sql = "INSERT INTO prodi_mengakreditasi_la (kode_dik, id_la) 
            VALUES ('$kode_dik', '$id_la')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='prodi-mengakreditasi-la.php';</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Prodi Mengakreditasi LA</title>
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
    </style>
</head>
<body>

<header>
    <h1>Tambah Data Prodi Mengakreditasi LA</h1>
</header>

<nav>
    <a href="index.php">Beranda</a>
    <a href="prodi-mengakreditasi-la.php">Daftar Prodi Mengakreditasi LA</a>
</nav>

<div class="container">
    <form method="POST" action="tambah-prodi-mengakreditasi-la.php">
        <label for="kode_dik">Kode DIK:</label><br>
        <input type="text" id="kode_dik" name="kode_dik" required><br><br>

        <label for="id_la">ID LA:</label><br>
        <input type="number" id="id_la" name="id_la" required><br><br>

        <button type="submit">Tambah</button>
    </form>
</div>

<footer>
    <p>&copy; 2025 Sistem Akreditasi. Semua Hak Dilindungi.</p>
</footer>

</body>
</html>
