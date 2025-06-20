<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Redirect jika bukan admin
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin</title>
    <!-- AdminLTE 3 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
        <a href="dashboard.php" class="brand-link">
            <span class="brand-text font-weight-light">Admin Dashboard</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="data_toko.php" class="nav-link active">
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

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h1>Data Admin</h1>
                        <a href='tambah_admin.php' class='btn btn-primary btn-sm'>Tambah Data</a>

                        <!-- Tabel Data Toko -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php include 'load_admin.php'; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
