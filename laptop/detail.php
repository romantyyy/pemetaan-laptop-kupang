<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - Pemetaan Lokasi Penjualan Laptop di Kota Kupang</title>
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa;
            color: #333;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(45deg, #007BFF, #0056b3);
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            transition: background 0.3s, color 0.3s;
            font-size: 16px;
        }

        .navbar a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        .content {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .content h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #0056b3;
            font-size: 28px;
            text-transform: uppercase;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .gallery-item {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .gallery-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .gallery-item h3 {
            margin: 10px 15px 5px;
            font-size: 18px;
            color: #333;
        }

        .gallery-item p {
            margin: 0 15px 15px;
            font-size: 14px;
            color: #666;
        }

        .gallery-item a {
            display: inline-block;
            margin: 10px 15px;
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
            font-size: 14px;
        }

        .gallery-item a:hover {
            background: #0056b3;
        }

        footer {
            text-align: center;
            padding: 15px 20px;
            background-color: #333;
            color: white;
            margin-top: 40px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="nav-left">
            <a href="index.php">Home</a>
            <a href="tentang.php">Tentang</a>
            <a href="galeri.php">Galeri</a>
            <a href="contact.php">Contact</a>
        </div>
        <div class="nav-right">
            <a href="login.php">Login</a>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <h1>Galeri Foto Laptop</h1>

        <!-- Galeri Grid -->
        <div class="gallery">
            <?php
                try {
                    $conn = new PDO('mysql:host=localhost;dbname=laptop', 'root', '');
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id = $_GET['id_toko'];
                    // Fetch gallery items
                    $query = "SELECT * FROM laptop INNER JOIN toko ON laptop.id_toko = toko.id_toko where laptop.id_toko = '$id'";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<div class="gallery-item">';
                            echo '<img src="admin/' . htmlspecialchars($row['foto1']) . '" alt="' . htmlspecialchars($row['nama_toko']) . '">';
                            echo '<h3>' . htmlspecialchars($row['nama']) . '</h3>';
                            echo '<p>' . htmlspecialchars($row['deskripsi']) . '</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>Tidak ada foto yang tersedia.</p>';
                    }
                } catch (PDOException $e) {
                    echo '<p>Koneksi gagal: ' . $e->getMessage() . '</p>';
                }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2025 Pemetaan Lokasi Penjualan Laptop di Kota Kupang. All Rights Reserved.
    </footer>
</body>
</html>
