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

// Query untuk mengambil data dari tabel penilaian
$sql = "SELECT kode_dik, id_fak, id_univ, id_indikator, nilai FROM penilaian";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penilaian</title>
    <link rel="stylesheet" href="styles.css"> <!-- Menggunakan file styles.css jika ada -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            min-height: 100vh; /* Memastikan halaman memiliki tinggi minimum 100% dari tinggi layar */
            display: flex;
            flex-direction: column;
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
            flex-grow: 1; /* Membuat container mengambil ruang yang tersisa */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: white;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 12px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: white;
            margin-top: auto; /* Footer dipaksa untuk selalu berada di bawah */
        }
    </style>
</head>
<body>
<header>
    <h1>Data Penilaian</h1>
</header>

<nav>
    <a href="index.php">Beranda</a>
    <a href="tambah-penilaian.php">Tambah Penilaian</a>
</nav>

<div class="container">
    <h2>Daftar Penilaian</h2>
    <table>
        <thead>
            <tr>
                <th>Kode DIK</th>
                <th>ID Fakultas</th>
                <th>ID Universitas</th>
                <th>ID Indikator</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Menampilkan data setiap baris
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["kode_dik"] . "</td>
                        <td>" . $row["id_fak"] . "</td>
                        <td>" . $row["id_univ"] . "</td>
                        <td>" . $row["id_indikator"] . "</td>
                        <td>" . $row["nilai"] . "</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data penilaian</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<footer>
    <p>&copy; 2025 Sistem Penilaian. Semua Hak Dilindungi.</p>
</footer>

<?php
// Menutup koneksi
$conn->close();
?>
</body>
</html>
