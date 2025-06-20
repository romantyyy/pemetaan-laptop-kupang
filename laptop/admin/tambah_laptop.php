<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "laptop";

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah data dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data dari form
    $idLokasi = $_POST['nama'];
    $alamatToko = $_POST['id_toko'];
    $noTelpon = $_POST['deskripsi'];

    // Periksa apakah file diunggah
    if (isset($_FILES['foto1']) && count($_FILES['foto1']['name']) > 0) {
        $uploadedFiles = $_FILES['foto1'];

        // Direktori tujuan
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $uploadPaths = []; // Menyimpan path file yang diunggah

        // Proses setiap file
        foreach ($uploadedFiles['name'] as $index => $fileName) {
            $tmpName = $uploadedFiles['tmp_name'][$index];
            $fileError = $uploadedFiles['error'][$index];
            $fileSize = $uploadedFiles['size'][$index];
            $fileType = $uploadedFiles['type'][$index];

            if ($fileError === UPLOAD_ERR_OK) {
                $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                $newFileName = uniqid('foto_', true) . '.' . $fileExt;
                $fileDestination = $uploadDir . $newFileName;

                if (move_uploaded_file($tmpName, $fileDestination)) {
                    $uploadPaths[] = $fileDestination;
                } else {
                    echo "Gagal mengunggah file: $fileName<br>";
                }
            }
        }

        // Simpan data ke database
        foreach ($uploadPaths as $path) {
            $query = "INSERT INTO laptop (id_toko, nama, deskripsi, foto1) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssss", $alamatToko, $idLokasi, $noTelpon, $path);

            if ($stmt->execute()) {
                echo "Data berhasil ditambahkan.";
            } else {
                echo "Terjadi kesalahan: " . $stmt->error . "<br>";
            }

            $stmt->close();
        }
    } else {
        echo "Tidak ada file yang diunggah.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Galeri Laptop</title>
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
    <h1 class="text-center">Tambah Galeri Laptop</h1>
    <form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
    <label for="id_toko">Nama Toko Laptop</label>
    <select class="form-control" id="id_toko" name="id_toko" required>
        <option value="">-- Pilih Toko Laptop --</option>
        <?php
        include '../config.php'; // Include the database configuration file
        
        // Query to fetch data from the `galeri` table
        $query = "SELECT id_toko, nama_toko FROM toko";
        $result = mysqli_query($conn, $query);

        // Check if query was successful
        if ($result) {
            // Loop through the results and create an option for each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id_toko'] . "'>" . htmlspecialchars($row['nama_toko']) . "</option>";
            }
        } else {
            echo "<option value=''>Toko tidak ditemukan</option>";
        }
        ?>
    </select>
</div>
<div class="form-group">
            <label for="nama">Nama Laptop</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Keterangan Laptop</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <div class="form-group">
    <label for="foto1">Foto</label>
    <input type="file" class="form-control" id="foto1" name="foto1[]" multiple required>
</div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="data_laptop.php" class="btn btn-secondary">Batal</a>
    </form>
    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>