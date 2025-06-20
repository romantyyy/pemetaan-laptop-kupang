<?php
 include '../config.php'; // Include the database configuration file
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tgl_upload = $_POST['id_toko'];
    $nama_foto = $_POST['nama'];
    $keterangan = $_POST['deskripsi'];
    $uploadDir = 'laptop/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadedFiles = [];

    // Periksa dan unggah semua file
    if (isset($_FILES['foto1'])) {
        $files = $_FILES['foto1'];
        for ($i = 0; $i < count($files['name']); $i++) {
            if ($files['error'][$i] === UPLOAD_ERR_OK) {
                $tmpName = $files['tmp_name'][$i];
                $fileName = uniqid('foto_', true) . '.' . pathinfo($files['name'][$i], PATHINFO_EXTENSION);
                $filePath = $uploadDir . $fileName;

                if (move_uploaded_file($tmpName, $filePath)) {
                    $uploadedFiles[] = $filePath;
                }
            }
        }
    }

    // Update database
    if (!empty($uploadedFiles)) {
        // Jika menyimpan string foto yang dipisahkan koma
        $fotoPaths = implode(',', $uploadedFiles);

        $update_query = "UPDATE laptop SET
        id_toko = ?, 
            nama = ?, 
            deskripsi = ?, 
            foto1 = ? 
            WHERE id_laptop = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param(
            "ssssi",
            $tgl_upload,
            $nama_foto,
            $keterangan,
            $fotoPaths,
            $id_toko
        );
    } else {
        // Update tanpa mengubah foto
        $update_query = "UPDATE laptop SET 
        id_toko = ?,
            nama = ?, 
            deskripsi = ? 
            WHERE id_laptop = ?";
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
        echo "<script>alert('Data laptop berhasil diperbarui!'); window.location.href = 'data_laptop.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data laptop.');</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Galeri Laptop</title>
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
    <h1 class="text-center">Edit Galeri Laptop</h1>
    <form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
    <label for="id_toko">Nama Toko Laptop</label>
    <select class="form-control" id="id_toko" name="id_toko" required>
    <option value="">-- Pilih Toko Laptop --</option>
    <?php
    include '../config.php'; // Include the database configuration file
    
    // Fetch the currently stored value from the database
    $current_id_galeri = null;
    if (isset($_GET['id'])) { // Assuming the current record ID is passed via GET
        $record_id = $_GET['id'];
        $current_query = "SELECT id_toko FROM laptop WHERE id_toko = '$record_id'";
        $current_result = mysqli_query($conn, $current_query);
        if ($current_result && mysqli_num_rows($current_result) > 0) {
            $current_data = mysqli_fetch_assoc($current_result);
            $current_id_galeri = $current_data['id_toko'];
        }
    }

    // Query to fetch data from the `galeri` table
    $query = "SELECT id_toko, nama_toko FROM toko";
    $result = mysqli_query($conn, $query);

    // Check if query was successful
    if ($result) {
        // Loop through the results and create an option for each row
        while ($row1 = mysqli_fetch_assoc($result)) {
            $selected = ($row1['id_toko'] == $current_id_galeri) ? 'selected' : '';
            echo "<option value='" . $row1['id_toko'] . "' $selected>" . htmlspecialchars($row1['nama_toko']) . "</option>";
        }
    } else {
        echo "<option value=''>Toko tidak ditemukan</option>";
    }
    ?>
</select>

</div>
<?php
include '../config.php'; // Include database configuration

// Ensure the record ID is provided via GET
if (isset($_GET['id'])) {
    $record_id = $_GET['id'];

    // Fetch the current record data
    $query = "SELECT * FROM laptop WHERE id_laptop = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $record_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fotos = explode(',', $row['foto1']); // Assuming 'foto1' contains comma-separated file paths
    } else {
        die("Error: Record not found.");
    }
} else {
    die("Error: No record ID provided.");
}
?>
        <div class="form-group">
            <label for="nama">Nama Laptop</label>
           <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
           <textarea name="deskripsi" id="deskripsi" class="form-control" required><?= htmlspecialchars($row['deskripsi']) ?></textarea>
        </div>
        <?php
// Fetch existing photos for the laptop
$fotos = []; // Initialize as an empty array
if (isset($_GET['id'])) { // Assuming the current record ID is passed via GET
    $record_id = $_GET['id'];
    $query = "SELECT foto1 FROM laptop WHERE id_laptop = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $record_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Explode the photo paths into an array
        if (!empty($row['foto1'])) {
            $fotos = explode(',', $row['foto1']);
        }
    }
}
?>
        <?php foreach ($fotos as $index => $foto): ?>
        <div class="form-group">
            <label for="foto<?php echo $index; ?>">Foto <?php echo $index + 1; ?></label>
            <img src="<?php echo htmlspecialchars($foto); ?>" alt="Preview Foto <?php echo $index + 1; ?>" style="width: 300px; height: 300px; object-fit: cover;">
            <input type="file" class="form-control" id="foto<?php echo $index; ?>" name="foto<?php echo $index; ?>">
        </div>
    <?php endforeach; ?>
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