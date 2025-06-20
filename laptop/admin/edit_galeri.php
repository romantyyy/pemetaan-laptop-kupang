<?php
// Sambungkan ke database
include 'koneksi.php';

// Periksa apakah parameter id tersedia
if (!isset($_GET['id'])) {
    echo "ID Galeri tidak ditemukan.";
    exit;
}

$id_toko = $_GET['id'];

// Ambil data toko berdasarkan ID
$query = "SELECT * FROM galeri WHERE id_galeri = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_toko);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Data galeri tidak ditemukan.";
    exit;
}
if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$url_gambar = $row['foto']; // Sesuaikan dengan path penyimpanan gambar Anda
} else {
    $url_gambar = "no_image.jpg"; // Gambar default jika tidak ada gambar
}

// Periksa apakah formulir telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tgl_upload = $_POST['tgl_upload'];
    $nama_foto = $_POST['nama_foto'];
    $keterangan = $_POST['keterangan'];

    // Cek apakah file foto baru diunggah
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto'];
        $namaFile = $foto['name'];
        $tmpName = $foto['tmp_name'];
        $uploadDir = 'upload/';
        $uploadFile = $uploadDir . basename($namaFile);

        // Pastikan direktori upload ada
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Pindahkan file ke direktori tujuan
        if (move_uploaded_file($tmpName, $uploadFile)) {
            // Jika file baru berhasil diunggah, masukkan jalur file ke dalam query
            $update_query = "UPDATE galeri SET 
                tgl_upload = ?, 
                nama_foto = ?, 
                keterangan = ?, 
                foto = ? 
                WHERE id_galeri = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param(
                "ssssi",
                $tgl_upload,
                $nama_foto,
                $keterangan,
                $uploadFile,
                $id_toko
            );
        } else {
            echo "<script>alert('Gagal mengunggah file baru.');</script>";
            exit;
        }
    } else {
        // Jika tidak ada file baru yang diunggah, perbarui data tanpa mengubah kolom foto
        $update_query = "UPDATE galeri SET  
            tgl_upload = ?, 
            nama_foto = ?, 
            keterangan = ? 
            WHERE id_galeri = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param(
            "sssi",
            $tgl_upload,
            $nama_foto,
            $keterangan,
            $id_toko
        );
    }

    // Eksekusi query
    if ($update_stmt->execute()) {
        echo "<script>alert('Data galeri berhasil diperbarui!'); window.location.href = 'data_galeri.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data galeri.');</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Galeri</title>
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
    <h1 class="text-center">Edit Galeri</h1>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_foto">Nama Foto</label>
            <input type="text" class="form-control" id="nama_foto" name="nama_foto" value="<?= htmlspecialchars($row['nama_foto']) ?>" required>
        </div>
        <div class="form-group">
            <label for="tgl_upload">Tanggal Upload</label>
           <input type="date" class="form-control" id="tgl_upload" name="tgl_upload" value="<?= htmlspecialchars($row['tgl_upload']) ?>" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
           <textarea name="keterangan" id="keterangan" class="form-control" required><?= htmlspecialchars($row['keterangan']) ?></textarea>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" required>
            <img src="<?php echo $url_gambar; ?>" alt="Preview Gambar" width="200" height="200">

        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="data_galeri.php" class="btn btn-secondary">Batal</a>
    </form>
    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>      