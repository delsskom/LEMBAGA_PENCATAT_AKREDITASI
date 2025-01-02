<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - Sistem Akreditasi</title>
    <link rel="stylesheet" href="styles.css"> <!-- Tambahkan file CSS eksternal jika diperlukan -->
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
            cursor: pointer;
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
            padding: 20px 0;
            background-color: #333;
            color: white;
        }
        .tab-content {
            display: none;
        }
        .active-tab {
            display: block;
        }
        .login-form input {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            max-width: 300px;
        }
        .login-form button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            width: 100%;
            max-width: 300px;
        }
    </style>
</head>
<body>

<header>
    <h1>Selamat Datang di Sistem Akreditasi</h1>
    <p>Meningkatkan Mutu dan Standar Pendidikan</p>
</header>

<nav>
    <a onclick="openTab('home')">Beranda</a>
    <a href="masuk.php">Masuk</a>
    <a href="penilaian.php">Penilaian</a> <!-- Mengarahkan ke penilaian.php -->
    <a href="data-akreditasi.php">Data Akreditasi</a> <!-- Mengarahkan ke data-akreditasi.php -->
</nav>

<div class="container">
    <div id="home" class="tab-content active-tab">
        <section id="tentang">
            <div class="card">
                <h2>Tentang Sistem Akreditasi</h2>
                <p>Sistem ini dirancang untuk memfasilitasi lembaga pendidikan dalam proses akreditasi secara efektif dan efisien.</p>
            </div>
        </section>

        <section id="fitur">
            <div class="card">
                <h2>Fitur Unggulan</h2>
                <ul style="list-style: none; padding: 0;">
                    <li>✅ Pengelolaan Data Lembaga</li>
                    <li>✅ Evaluasi Berdasarkan Indikator</li>
                    <li>✅ Laporan Akreditasi</li>
                    <li>✅ Dashboard untuk Semua Pengguna</li>
                </ul>
            </div>
        </section>
    </div>

    <div id="penilaian" class="tab-content">
        <section>
            <h2>Penilaian</h2>
            <!-- Konten Penilaian -->
        </section>
    </div>

    <div id="data-akreditasi" class="tab-content">
        <section>
            <h2>Data Akreditasi</h2>
            <!-- Konten Data Akreditasi -->
        </section>
    </div>

    <div id="kontak" class="tab-content">
        <section>
            <h2>Kontak</h2>
            <!-- Konten Kontak -->
        </section>
    </div>
</div>

<footer>
    <p>&copy; 2025 Sistem Akreditasi. Semua Hak Dilindungi.</p>
</footer>

<script>
    function openTab(tabName) {
        const tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach(tab => tab.classList.remove('active-tab'));

        const activeTab = document.getElementById(tabName);
        activeTab.classList.add('active-tab');
    }
</script>

</body>
</html>
