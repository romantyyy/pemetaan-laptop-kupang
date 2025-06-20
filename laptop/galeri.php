<!DOCTYPE html>
<html>
<head>
    <title>Galeri - PEMETAAN LOKASI PENJUALAN LAPTOP DI KOTA KUPANG</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
        }
        .navbar a:hover {
            background-color: #575757;
            border-radius: 5px;
        }
        .content {
            padding: 20px;
        }
        .content h1 {
            color: #333;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 20px;
        }
        .gallery-item {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            background-color: #f4f4f4;
        }
        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }
        .gallery-item h3 {
            margin: 10px 0 5px;
            font-size: 16px;
        }
        .gallery-item p {
            font-size: 14px;
            color: #555;
        }
        .gallery-item a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .gallery-item a:hover {
            background-color: #0056b3;
        }
        /* Reset */
.navbar a {
    text-decoration: none;
}

/* Navbar Styling */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: linear-gradient(90deg, #007bff, #0056b3); /* Gradien biru */
    padding: 15px 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Efek bayangan */
}

/* Tombol Navbar */
.nav-button {
    color: white;
    font-size: 1rem;
    font-weight: bold;
    padding: 10px 15px;
    border-radius: 25px;
    transition: all 0.3s ease-in-out;
    background: rgba(255, 255, 255, 0.1); /* Warna transparan default */
}

/* Hover Effect */
.nav-button:hover {
    background: rgba(255, 255, 255, 0.3); /* Warna hover lebih terang */
    box-shadow: 0 4px 10px rgba(255, 255, 255, 0.3); /* Bayangan hover */
    transform: scale(1.1); /* Sedikit membesar */
}

/* Active Effect */
.nav-button:active {
    background: rgba(255, 255, 255, 0.5); /* Warna lebih terang saat klik */
    transform: scale(0.95); /* Sedikit mengecilkan tombol */
}

    </style>
</head>
<body>
    <!-- Navbar -->
  <!-- Navbar -->
<div class="navbar">
    <div class="nav-left">
        <a href="index.php" class="nav-button">Home</a>
        <a href="tentang.php" class="nav-button">Tentang</a>
        <a href="galeri.php" class="nav-button">Galeri</a>
        <a href="contact.php" class="nav-button">Contact</a>
    </div>
    <div class="nav-right">
        <a href="login.php" class="nav-button">Login</a>
    </div>
</div>


    <!-- Content -->
    <div class="content">
        <h1>Galeri Foto</h1>

        <!-- Galeri Grid -->
        <div class="gallery">
            <?php
            // Koneksi ke database menggunakan PDO
            try {
                $conn = new PDO('mysql:host=localhost;dbname=laptop', 'root', '');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Query untuk mengambil data galeri
                $query = "SELECT id_galeri, nama_foto, keterangan, foto FROM galeri";
                $stmt = $conn->prepare($query);
                $stmt->execute();

                // Menampilkan data galeri dalam grid 4x4
                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '
                        <div class="gallery-item">
                            <img src="admin/' . htmlspecialchars($row['foto']) . '" alt="' . htmlspecialchars($row['nama_foto']) . '">
                            <h3>' . htmlspecialchars($row['nama_foto']) . '</h3>
                            <p>' . htmlspecialchars($row['keterangan']) . '</p>
                           
                        </div>';
                    }
                } else {
                    echo '<p>Belum ada foto dalam galeri.</p>';
                }

            } catch (PDOException $e) {
                echo 'Koneksi gagal: ' . $e->getMessage();
            }
            ?>
        </div>
    </div>
</body>
</html>
