<?php
// Koneksi ke database
$host = "localhost"; // Sesuaikan dengan konfigurasi server Anda
$username = "root"; // Nama pengguna database Anda
$password = ""; // Kata sandi database Anda
$database = "laptop"; // Nama database Anda

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah data dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data dari form
    $namaToko = $_POST['nama'] ?? null;
    $idLokasi = $_POST['deskripsi'] ?? null;
    $alamatToko = $_POST['kecamatan'] ?? null;
    $jamOperasional = $_POST['lat'] ?? null;
    $kategoriProduk = $_POST['lng'] ?? null;

    // Validasi data
    if ($namaToko && $idLokasi && $alamatToko && $jamOperasional && $kategoriProduk) {
        // Query untuk memasukkan data ke tabel lokasi
        $query = "INSERT INTO lokasi (nama, deskripsi, kecamatan, lat, lng)
                  VALUES (?, ?, ?, ?, ?)";

        // Gunakan prepared statement untuk keamanan
        $stmt = $conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param(
                "sssss",
                $namaToko,
                $idLokasi,
                $alamatToko,
                $jamOperasional,
                $kategoriProduk
            );

            // Eksekusi query
            if ($stmt->execute()) {
                echo "Data lokasi berhasil ditambahkan!";
            } else {
                echo "Terjadi kesalahan: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Terjadi kesalahan saat mempersiapkan query: " . $conn->error;
        }
    } else {
        echo "Semua data harus diisi!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lokasi Toko</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="logout.php" class="nav-link text-danger">Keluar</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="dashboard.php" class="brand-link">
            <span class="brand-text font-weight-light">Admin Dashboard</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="data_toko.php" class="nav-link">
                            <i class="nav-icon fas fa-store"></i>
                            <p>Data Toko</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="data_lokasi.php" class="nav-link active">
                            <i class="nav-icon fas fa-map-marker-alt"></i>
                            <p>Data Lokasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="data_galeri.php" class="nav-link">
                            <i class="nav-icon fas fa-images"></i>
                            <p>Data Galeri</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="data_laptop.php" class="nav-link">
                            <i class="nav-icon fas fa-images"></i>
                            <p>Data Laptop</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="data_admin.php" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>Data Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                            <p>Keluar</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah Lokasi Toko</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Lokasi Toko</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Lokasi</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="nama">Nama Lokasi Toko</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Lokasi Toko</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <textarea class="form-control" id="kecamatan" name="kecamatan" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="lat">Latitude</label>
                                <input type="text" class="form-control" id="lat" name="lat" required>
                            </div>
                            <div class="form-group">
                                <label for="lng">Longitude</label>
                                <input type="text" class="form-control" id="lng" name="lng" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="data_lokasi.php" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>