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

// Query untuk mengambil data dari tabel akreditasi
$sql = "SELECT id_akreditasi, id_la, id_univ, kode_dik, tgl_mulai_akreditasi, status_akreditasi, tgl_akhir_akreditasi FROM akreditasi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Akreditasi</title>
    <style>
        /* Reset dan pengaturan dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        /* Flexbox untuk tata letak halaman */
        body {
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
        }

        nav a:hover {
            background-color: #575757;
        }

        .container {
            flex: 1; /* Mengisi ruang sisa antara header dan footer */
            padding: 20px;
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
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto; /* Memaksa footer berada di bawah */
        }

        h1, h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<header>
    <h1>Data Akreditasi</h1>
</header>

<nav>
    <a href="index.php">Beranda</a>
    <a href="tambah-data-akreditasi.php">Tambah Data Akreditasi</a>
</nav>

<div class="container">
    <h2>Daftar Akreditasi</h2>
    <table>
        <thead>
            <tr>
                <th>ID Akreditasi</th>
                <th>ID LA</th>
                <th>ID Universitas</th>
                <th>Kode DIK</th>
                <th>Tanggal Mulai</th>
                <th>Status Akreditasi</th>
                <th>Tanggal Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Menampilkan data setiap baris
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["id_akreditasi"] . "</td>
                        <td>" . $row["id_la"] . "</td>
                        <td>" . $row["id_univ"] . "</td>
                        <td>" . $row["kode_dik"] . "</td>
                        <td>" . $row["tgl_mulai_akreditasi"] . "</td>
                        <td>" . $row["status_akreditasi"] . "</td>
                        <td>" . $row["tgl_akhir_akreditasi"] . "</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<footer>
    <p>&copy; 2025 Sistem Akreditasi. Semua Hak Dilindungi.</p>
</footer>

<?php
// Menutup koneksi
$conn->close();
?>
</body>
</html>
