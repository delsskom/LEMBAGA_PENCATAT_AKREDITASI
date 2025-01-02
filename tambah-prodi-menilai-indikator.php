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

// Variabel untuk menyimpan pesan error dan sukses
$message = "";

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_dik = $_POST['kode_dik'];
    $id_indikator = $_POST['id_indikator'];
    $nilai = $_POST['nilai'];

    // Validasi input
    if (empty($kode_dik) || empty($id_indikator) || empty($nilai)) {
        $message = "Semua kolom harus diisi!";
    } else {
        // Query untuk memasukkan data ke tabel prodi_menilai_indikator
        $sql = "INSERT INTO prodi_menilai_indikator (kode_dik, id_indikator, nilai) VALUES ('$kode_dik', '$id_indikator', '$nilai')";

        if ($conn->query($sql) === TRUE) {
            $message = "Data berhasil ditambahkan!";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Tambah Penilaian Indikator</title>
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

        .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 0 auto;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: white;
        }

        input[type="text"], input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }

        .success {
            background-color: #4CAF50;
            color: white;
        }

        .error {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>

<header>
    <h1>Tambah Penilaian Indikator</h1>
</header>

<nav>
    <a href="index.php">Beranda</a>
    <a href="prodi-menilai-indikator.php">Daftar Penilaian Indikator</a>
</nav>

<div class="container">
    <h2>Form Tambah Penilaian Indikator</h2>

    <?php if ($message): ?>
        <div class="message <?php echo strpos($message, 'berhasil') !== false ? 'success' : 'error'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <div class="form-container">
        <form method="POST" action="tambah-prodi-menilai-indikator.php">
            <label for="kode_dik">Kode DIK:</label>
            <input type="text" id="kode_dik" name="kode_dik" required>

            <label for="id_indikator">ID Indikator:</label>
            <input type="number" id="id_indikator" name="id_indikator" required>

            <label for="nilai">Nilai:</label>
            <input type="number" id="nilai" name="nilai" step="0.01" required>

            <input type="submit" value="Tambah Penilaian">
        </form>
    </div>
</div>

<footer>
    <p>&copy; 2025 Sistem Akreditasi. Semua Hak Dilindungi.</p>
</footer>

</body>
</html>
