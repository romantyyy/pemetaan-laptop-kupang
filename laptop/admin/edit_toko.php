<?php
// Sambungkan ke database
include 'koneksi.php';

// Periksa apakah parameter id tersedia
if (!isset($_GET['id'])) {
    echo "ID Toko tidak ditemukan.";
    exit;
}

$id_toko = $_GET['id'];

// Ambil data toko berdasarkan ID
$query = "SELECT * FROM toko WHERE id_toko = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_toko);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Data toko tidak ditemukan.";
    exit;
}

$row = $result->fetch_assoc();

// Periksa apakah formulir telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_lokasi = $_POST['id_lokasi'];
    $id_galeri = $_POST['id_galeri'];
    $nama_toko = $_POST['nama_toko'];
    $alamat = $_POST['alamat'];
    $no_telpon = $_POST['no_telpon'];
    $jam_operasional = $_POST['jam_operasional'];
    $kategori_produk = $_POST['kategori_produk'];
    $mark_tersedia = $_POST['mark_tersedia'];
    $rating = $_POST['rating'];
    $layanan_ekstra = $_POST['layanan_ekstra'];
    $status_aktif = $_POST['status_aktif'];

    // Update data toko
    $update_query = "UPDATE toko SET 
    id_lokasi = ?,
    id_galeri = ?,
        nama_toko = ?, 
        alamat = ?, 
        no_telpon = ?, 
        jam_operasional = ?, 
        kategori_produk = ?, 
        mark_tersedia = ?, 
        rating = ?, 
        layanan_ekstra = ?, 
        status_aktif = ? 
        WHERE id_toko = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param(
        "sssssssssssi",
        $id_lokasi,
        $id_galeri,
        $nama_toko,
        $alamat,
        $no_telpon,
        $jam_operasional,
        $kategori_produk,
        $mark_tersedia,
        $rating,
        $layanan_ekstra,
        $status_aktif,
        $id_toko
    );

    if ($update_stmt->execute()) {
        echo "<script>alert('Data toko berhasil diperbarui!'); window.location.href = 'data_toko.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data toko.');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Toko</title>
    <!-- AdminLTE CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
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
                        <a href="data_admin.php" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>Data Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="data_laptop.php" class="nav-link">
                            <i class="nav-icon fas fa-images"></i>
                            <p>Data Laptop</p>
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
    <h1 class="text-center">Edit Toko</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="nama_toko">Nama Toko</label>
            <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="<?= htmlspecialchars($row['nama_toko']) ?>" required>
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
        while ($row1 = $result->fetch_assoc()) {
            echo "<option value='{$row1['id_lokasi']}'>{$row1['nama']}</option>";
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
        while ($row2 = $result->fetch_assoc()) {
            echo "<option value='{$row2['id_galeri']}'>{$row2['nama_foto']}</option>";
        }
        ?>
    </select>
                    </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required><?= htmlspecialchars($row['alamat']) ?></textarea>
        </div>
        <div class="form-group">
            <label for="no_telpon">No Telepon</label>
            <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="<?= htmlspecialchars($row['no_telpon']) ?>" required>
        </div>
        <div class="form-group">
            <label for="jam_operasional">Jam Operasional</label>
            <input type="text" class="form-control" id="jam_operasional" name="jam_operasional" value="<?= htmlspecialchars($row['jam_operasional']) ?>" required>
        </div>
        <div class="form-group">
            <label for="kategori_produk">Kategori Produk</label>
            <input type="text" class="form-control" id="kategori_produk" name="kategori_produk" value="<?= htmlspecialchars($row['kategori_produk']) ?>" required>
        </div>
        <div class="form-group">
            <label for="mark_tersedia">Mark Tersedia</label>
            <input type="text" class="form-control" id="mark_tersedia" name="mark_tersedia" value="<?= htmlspecialchars($row['mark_tersedia']) ?>" required>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" step="0.1" class="form-control" id="rating" name="rating" value="<?= htmlspecialchars($row['rating']) ?>" required>
        </div>
        <div class="form-group">
            <label for="layanan_ekstra">Layanan Ekstra</label>
            <input type="text" class="form-control" id="layanan_ekstra" name="layanan_ekstra" value="<?= htmlspecialchars($row['layanan_ekstra']) ?>" required>
        </div>
        <div class="form-group">
            <label for="status_aktif">Status Aktif</label>
            <select class="form-control" id="status_aktif" name="status_aktif" required>
                <option value="1" <?= $row['status_aktif'] == '1' ? 'selected' : '' ?>>Aktif</option>
                <option value="0" <?= $row['status_aktif'] == '0' ? 'selected' : '' ?>>Tidak Aktif</option>
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
</body>
</html>