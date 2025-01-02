<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Sistem Akreditasi</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            margin: 0 5px;
            display: inline-block;
        }

        nav a:hover {
            background-color: #575757;
        }

        .container {
            flex: 1; /* Ensures this takes up the remaining space */
            width: 80%;
            margin: 20px auto;
            padding: 20px;
        }

        .tabs {
            display: flex;
            justify-content: space-around;
            background-color: #333;
            margin-bottom: 20px;
        }

        .tabs a {
            padding: 14px 20px;
            color: white;
            text-decoration: none;
            text-align: center;
            width: 100%;
            text-transform: uppercase;
        }

        .tabs a:hover {
            background-color: #575757;
        }

        .tab-content {
            display: none;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .active-tab {
            display: block;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto; /* Pushes footer to the bottom if there's not enough content */
            width: 100%;
        }

        footer p {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<header>
    <h1>Masuk ke Sistem Akreditasi</h1>
</header>

<nav>
    <a href="index.php">Kembali ke Beranda</a>
</nav>

<div class="container">
    <!-- Tab navigation -->
    <div class="tabs">
        <a href="universitas1.php">Universitas</a>
        <a href="fakultas.php">Fakultas</a>
        <a href="prodi.php">Prodi</a>
        <a href="indikator.php">Indikator</a>
        <a href="elemen.php">Elemen</a>
        <a href="LA.php">LA</a>
    </div>

    <!-- Tab content -->
    <div id="universitas" class="tab-content active-tab">
        <h2>Universitas</h2>
        <!-- Add your content for Universitas here -->
    </div>

    <div id="elemen" class="tab-content">
        <h2>Elemen</h2>
        <!-- Add your content for Elemen here -->
    </div>

    <div id="fakultas" class="tab-content">
        <h2>Fakultas</h2>
        <!-- Add your content for Fakultas here -->
    </div>

    <div id="prodi" class="tab-content">
        <h2>Prodi</h2>
        <!-- Add your content for Prodi here -->
    </div>

    <div id="la" class="tab-content">
        <h2>LA</h2>
        <!-- Add your content for LA here -->
    </div>

    <div id="indikator" class="tab-content">
        <h2>Indikator</h2>
        <!-- Add your content for Indikator here -->
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
