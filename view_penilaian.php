<?php
// Koneksi ke database
$host = 'localhost';
$username = 'root'; // Ganti dengan username MySQL Anda
$password = '';     // Ganti dengan password MySQL Anda
$database = 'lembaga_pencatat_akreditasi'; // Ganti dengan nama database Anda

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query untuk mengambil semua data penilaian
$sql = "SELECT p.kode_dik, p.nama_prodi, p.jenjang, p.nmr_sk_pendirian, p.tgl_mulai, p.tgl_akhir, p.status, f.nama_fakultas 
        FROM prodi p
        JOIN fakultas f ON p.id_fak = f.id_fak";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penilaian Program Studi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Data Penilaian Program Studi</h1>
        
        <?php
        // Cek apakah ada data yang ditemukan
        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Dik</th>
                            <th>Nama Prodi</th>
                            <th>Jenjang</th>
                            <th>Nomor SK Pendirian</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                            <th>Status</th>
                            <th>Fakultas</th>
                        </tr>
                    </thead>
                    <tbody>';
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td>' . $no++ . '</td>
                        <td>' . $row['kode_dik'] . '</td>
                        <td>' . $row['nama_prodi'] . '</td>
                        <td>' . $row['jenjang'] . '</td>
                        <td>' . $row['nmr_sk_pendirian'] . '</td>
                        <td>' . $row['tgl_mulai'] . '</td>
                        <td>' . $row['tgl_akhir'] . '</td>
                        <td>' . $row['status'] . '</td>
                        <td>' . $row['nama_fakultas'] . '</td>
                      </tr>';
            }
            echo '</tbody></table>';
        } else {
            echo "<p>Tidak ada data penilaian yang tersedia.</p>";
        }

        // Tutup koneksi database
        $conn->close();
        ?>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
