<!DOCTYPE html>
<html>
<head>
    <title>Kontak Kami - PEMETAAN LOKASI PENJUALAN LAPTOP DI KOTA KUPANG</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
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
        .content p {
            margin-bottom: 10px;
        }
        .social-icons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .social-icons a {
            text-decoration: none;
            color: white;
            background-color: #333;
            padding: 10px;
            border-radius: 50%;
            display: inline-block;
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 20px;
        }
        .social-icons a:hover {
            background-color: #575757;
        }
        #map {
            height: 400px;
            margin-top: 20px;
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
        <h1>Kontak Kami</h1>
        <p>
            Jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut, silakan hubungi kami melalui:
        </p>
        <p><strong>Alamat:</strong> Jl. Soekarno Hatta No. 123, Kota Kupang, NTT</p>
        <p><strong>Email:</strong> pemetaanlaptop@kupang.com</p>
        <p><strong>Telepon:</strong> +62 812 3456 7890</p>

        <h2>Ikuti Kami di Media Sosial</h2>
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank">F</a>
            <a href="https://twitter.com" target="_blank">T</a>
            <a href="https://instagram.com" target="_blank">I</a>
            <a href="https://linkedin.com" target="_blank">L</a>
        </div>

        <h2>Lokasi Kami</h2>
        <div id="map"></div>
    </div>

    <script>
        // Inisialisasi peta
        const map = L.map('map').setView([-10.1749407, 123.5323165], 15);

        // Tambahkan tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Tambahkan marker untuk lokasi
        L.marker([-10.1749407, 123.5323165]).addTo(map)
            .bindPopup("Lokasi Penjual Laptop di Kota Kupang")
            .openPopup();
    </script>
</body>
</html>