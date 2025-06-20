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
    $idGaleri = $_POST['id_galeri'];
    $namaToko = $_POST['nama_toko'];
    $idLokasi = $_POST['id_lokasi'];
    $alamatToko = $_POST['alamat'];
    $noTelpon = $_POST['no_telpon'];
    $jamOperasional = $_POST['jam_operasional'];
    $kategoriProduk = $_POST['kategori_produk'];
    $markTersedia = $_POST['mark_tersedia'];
    $rating = $_POST['rating'];
    $layananEkstra = $_POST['layanan_ekstra'];
    $statusAktif = $_POST['status_aktif'];

    // Query untuk memasukkan data ke tabel toko
    $query = "INSERT INTO toko (id_lokasi, id_galeri, nama_toko, alamat, no_telpon, jam_operasional, kategori_produk, 
                                mark_tersedia, rating, layanan_ekstra, status_aktif)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare($query);

    // Cek apakah query berhasil dipersiapkan
    if (!$stmt) {
        die("Error pada prepare statement: " . $conn->error);
    }

    // Pastikan bind_param sesuai dengan tipe data
    $stmt->bind_param(
        "iisssssssss", // Perbaiki tipe data sesuai kebutuhan
        $idLokasi,
        $idGaleri,
        $namaToko,
        $alamatToko,
        $noTelpon,
        $jamOperasional,
        $kategoriProduk,
        $markTersedia,
        $rating,
        $layananEkstra,
        $statusAktif
    );

    // Eksekusi query
    if ($stmt->execute()) {
        echo "Data toko berhasil ditambahkan!";
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Toko</title>
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
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="logout.php" class="nav-link text-danger">Keluar</a>
            </li>
        </ul>
    </nav>

    <!-- Main Sidebar -->
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
                        <a href="data_lokasi.php" class="nav-link">
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

    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
    <h1 class="text-center">Tambah Toko</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="nama_toko">Nama Toko</label>
            <input type="text" class="form-control" id="nama_toko" name="nama_toko" required>
        </div>
        <div class="form-group">
                        <label for="id_lokasi">Nama Lokasi</label>
                        <?php
// Koneksi ke database
$host = "localhost"; // Sesuaikan dengan konfigurasi server Anda
$username = "root"; // Nama pengguna database Anda
$password = ""; // Kata sandi database Anda
$database = "laptop"; // Nama database Anda

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data lokasi dari tabel lokasi
$query = "SELECT id_lokasi, nama FROM lokasi";
$result = $conn->query($query);

// Periksa apakah ada data
if (!$result) {
    echo "Query gagal: " . $conn->error;
    exit;
}
?>
                       <select name="id_lokasi" id="id_lokasi" class="form-control">
        <option value="">-- Pilih Lokasi --</option>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id_lokasi']}'>{$row['nama']}</option>";
        }
        ?>
    </select>
                    </div>
                    <div class="form-group">
                        <label for="id_galeri">Nama Galeri</label>
                        <?php
// Koneksi ke database
$host = "localhost"; // Sesuaikan dengan konfigurasi server Anda
$username = "root"; // Nama pengguna database Anda
$password = ""; // Kata sandi database Anda
$database = "laptop"; // Nama database Anda

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data lokasi dari tabel lokasi
$query = "SELECT id_galeri, nama_foto FROM galeri";
$result = $conn->query($query);

// Periksa apakah ada data
if (!$result) {
    echo "Query gagal: " . $conn->error;
    exit;
}
?>
                       <select name="id_galeri" id="id_galeri" class="form-control">
        <option value="">-- Pilih Nama Galeri --</option>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id_galeri']}'>{$row['nama_foto']}</option>";
        }
        ?>
    </select>
                    </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
        </div>
        <div class="form-group">
            <label for="no_telpon">No Telepon</label>
            <input type="text" class="form-control" id="no_telpon" name="no_telpon" required>
        </div>
        <div class="form-group">
            <label for="jam_operasional">Jam Operasional</label>
            <input type="text" class="form-control" id="jam_operasional" name="jam_operasional" required>
        </div>
        <div class="form-group">
            <label for="kategori_produk">Kategori Produk</label>
            <input type="text" class="form-control" id="kategori_produk" name="kategori_produk" required>
        </div>
        <div class="form-group">
            <label for="mark_tersedia">Mark Tersedia</label>
            <input type="text" class="form-control" id="mark_tersedia" name="mark_tersedia" required>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="text" class="form-control" id="rating" name="rating" required>
        </div>
        <div class="form-group">
            <label for="layanan_ekstra">Layanan Ekstra</label>
            <input type="text" class="form-control" id="layanan_ekstra" name="layanan_ekstra" required>
        </div>
        <div class="form-group">
            <label for="status_aktif">Status Aktif</label>
            <select class="form-control" id="status_aktif" name="status_aktif" required>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="data_toko.php" class="btn btn-secondary">Batal</a>
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