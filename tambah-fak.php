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

// Variabel untuk menampilkan pesan error atau sukses
$msg = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_fak = $_POST['id_fak'];
    $nama_fak = $_POST['nama_fak'];
    $id_univ = $_POST['id_univ'];

    // Query untuk menyimpan data fakultas
    $sql = "INSERT INTO fakultas (id_fak, nama_fak, id_univ)
            VALUES ('$id_fak', '$nama_fak', '$id_univ')";

    if ($conn->query($sql) === TRUE) {
        $msg = "Data fakultas berhasil disimpan!";
    } else {
        $msg = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Fakultas</title>
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
    <h1>Tambah Fakultas</h1>
</header>

<nav>
    <a href="index.php">Beranda</a>
    <a href="tambah-fak.php">Tambah Fakultas</a>
</nav>

<div class="container">
    <h2>Formulir Tambah Fakultas</h2>

    <?php if ($msg): ?>
        <p><?php echo $msg; ?></p>
    <?php endif; ?>

    <form method="POST" action="tambah-fak.php">
        <!-- ID Fakultas -->
        <label for="id_fak">ID Fakultas:</label><br>
        <input type="text" id="id_fak" name="id_fak" required><br><br>

        <!-- Nama Fakultas -->
        <label for="nama_fak">Nama Fakultas:</label><br>
        <input type="text" id="nama_fak" name="nama_fak" required><br><br>

        <!-- ID Universitas -->
        <label for="id_univ">ID Universitas:</label><br>
        <input type="text" id="id_univ" name="id_univ" required><br><br>

        <!-- Submit Button -->
        <button type="submit">Tambah Fakultas</button>
    </form>
</div>

<footer>
    <p>&copy; 2025 Sistem Akreditasi. Semua Hak Dilindungi.</p>
</footer>

</body>
</html>
