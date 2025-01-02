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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_la = $_POST['nama_la'];

    // Query untuk menyimpan data ke tabel la
    $sql = "INSERT INTO la (nama_la) VALUES ('$nama_la')";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman daftar LA setelah berhasil menambah
        header("Location: la.php");
        exit(); // Ensures no further code is executed after the redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Tambah LA</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
            flex: 1;
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
            margin-top: auto;
        }

        h1, h2 {
            font-size: 24px;
            color: #333;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<header>
    <h1>Tambah LA</h1>
</header>

<nav>
    <a href="index.php">Beranda</a>
    <a href="la.php">Daftar LA</a>
</nav>

<div class="container">
    <h2>Form Tambah LA</h2>

    <div class="card">
        <form method="POST" action="">
            <label for="nama_la">Nama LA:</label>
            <input type="text" id="nama_la" name="nama_la" required>

            <input type="submit" value="Tambah LA">
        </form>
    </div>
</div>

<footer>
    <p>&copy; 2025 Sistem Akreditasi. Semua Hak Dilindungi.</p>
</footer>

</body>
</html>
