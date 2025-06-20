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
    <title>Dashboard Admin</title>
    <!-- AdminLTE 3 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <style>
        .brand-link {
            background-color: #343a40;
            color: #ffffff;
        }

        .nav-sidebar .nav-item .nav-link.active {
            background-color: #007bff !important;
            color: #ffffff;
            font-weight: bold;
        }

        .nav-sidebar .nav-item .nav-link:hover {
            background-color: #0056b3 !important;
            color: #ffffff;
        }

        .nav-sidebar .nav-item i {
            color: #007bff;
        }

        .nav-sidebar .nav-item .nav-link {
            transition: all 0.3s ease-in-out;
            border-radius: 5px;
        }

        .content-wrapper {
            background: linear-gradient(to bottom right, #f7f8fa, #e9ecef);
        }

        h1 {
            font-size: 2rem;
            font-weight: bold;
            color: #343a40;
        }

        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        }

        .nav-link .nav-icon {
            font-size: 1.2rem;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark bg-primary">
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
        <a href="dashboard.php" class="brand-link text-center">
            <i class="fas fa-laptop-code"></i> <span class="brand-text font-weight-light">Admin Dashboard</span>
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
                            <i class="nav-icon fas fa-laptop"></i>
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
        <!-- Main Content -->
        <section class="content pt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h1>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h1>
                        <p>Ini adalah dashboard admin. Gunakan menu di samping untuk mengelola data.</p>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-info text-white">
                                    <div class="card-body">
                                        <h5>Data Toko</h5>
                                        <p>Kelola data toko yang tersedia</p>
                                        <a href="data_toko.php" class="btn btn-light btn-sm">Kelola</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5>Data Lokasi</h5>
                                        <p>Kelola lokasi toko</p>
                                        <a href="data_lokasi.php" class="btn btn-light btn-sm">Kelola</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-warning text-white">
                                    <div class="card-body">
                                        <h5>Data Galeri</h5>
                                        <p>Kelola galeri toko</p>
                                        <a href="data_galeri.php" class="btn btn-light btn-sm">Kelola</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card bg-danger text-white">
                                    <div class="card-body">
                                        <h5>Data Laptop</h5>
                                        <p>Kelola data laptop</p>
                                        <a href="data_laptop.php" class="btn btn-light btn-sm">Kelola</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
