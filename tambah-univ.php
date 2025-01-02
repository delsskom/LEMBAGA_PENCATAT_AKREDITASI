<?php
include 'koneksi.php'; // Pastikan file ini berisi koneksi ke database

// Variabel untuk menyimpan pesan
$message = '';

// Proses saat form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_univ = $_POST['nama_univ'];

    // Pastikan nama universitas tidak kosong
    if (empty($nama_univ)) {
        $message = "Nama Universitas harus diisi!";
    } else {
        // Query untuk menambahkan universitas ke tabel
        $query = "INSERT INTO universitas (nama_univ) VALUES ('$nama_univ')";
        if (mysqli_query($conn, $query)) {
            $message = "Universitas berhasil ditambahkan!";
        } else {
            $message = "Terjadi kesalahan: " . mysqli_error($conn);
        }
    }
}

// Menutup koneksi database setelah operasi
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Universitas - Sistem Akreditasi</title>
    <link rel="stylesheet" href="../styles.css">
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

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            margin-top: 20px;
        }

        input[type="text"], button {
            width: 250px;
            padding: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            padding: 12px;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            color:rgb(248, 244, 244);
        }
    </style>
</head>
<body>

<header>
    <h1>Tambah Universitas - Sistem Akreditasi</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Beranda</a>
    <a href="universitas1.php">Kembali ke Daftar Universitas</a>
</nav>

<div class="container">
    <h2>Form Tambah Universitas</h2>

    <!-- Tampilkan pesan jika ada -->
    <?php if ($message) { echo "<p>$message</p>"; } ?>

    <!-- Form tambah universitas -->
    <form method="POST" action="tambah-univ.php">
        <div>
            <label for="nama_univ">Nama Universitas:</label>
            <input type="text" id="nama_univ" name="nama_univ" required>
        </div>

        <button type="submit">Tambah Universitas</button>
    </form>
</div>

<footer>
    <p>&copy; 2025 Sistem Akreditasi. Semua Hak Dilindungi.</p>
</footer>

</body>
</html>
