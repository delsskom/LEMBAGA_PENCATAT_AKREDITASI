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

// Menyimpan data elemen ke dalam database setelah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_elemen = $_POST['nama_elemen'];
    $id_indikator = $_POST['id_indikator'];

    // Query untuk menyimpan data elemen
    $sql = "INSERT INTO elemen (nama_elemen, id_indikator) VALUES ('$nama_elemen', '$id_indikator')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Data elemen berhasil disimpan!</p>";
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
    <title>Tambah Elemen</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Flexbox untuk memastikan footer berada di bawah */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Mengisi seluruh tinggi tampilan */
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
            flex: 1; /* Membiarkan container mengisi ruang yang tersisa */
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
            margin-top: auto; /* Footer berada di bawah */
        }

        form {
            text-align: left;
            margin-top: 20px;
        }

        label {
            font-size: 16px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<header>
    <h1>Tambah Elemen</h1>
</header>

<nav>
    <a href="index.php">Beranda</a>
    <a href="elemen.php">Daftar Elemen</a>
</nav>

<div class="container">
    <div class="card">
        <h2>Form Tambah Elemen</h2>
        <form method="POST" action="tambah-elemen.php">
            <!-- Nama Elemen -->
            <label for="nama_elemen">Nama Elemen:</label>
            <input type="text" id="nama_elemen" name="nama_elemen" required><br><br>

            <!-- ID Indikator -->
            <label for="id_indikator">ID Indikator:</label>
            <select id="id_indikator" name="id_indikator" required>
                <?php
                // Koneksi ulang untuk mengambil data indikator
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql_indikator = "SELECT id_indikator, deskripsi FROM indikator";
                $result_indikator = $conn->query($sql_indikator);

                if ($result_indikator->num_rows > 0) {
                    while ($row = $result_indikator->fetch_assoc()) {
                        echo "<option value='" . $row['id_indikator'] . "'>" . $row['deskripsi'] . "</option>";
                    }
                } else {
                    echo "<option value=''>Tidak ada indikator</option>";
                }

                // Menutup koneksi
                $conn->close();
                ?>
            </select><br><br>

            <button type="submit">Simpan Elemen</button>
        </form>
    </div>
</div>

<footer>
    <p>&copy; 2025 Sistem Akreditasi. Semua Hak Dilindungi.</p>
</footer>

</body>
</html>
