<?php
session_start();
include 'config.php'; // File konfigurasi database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($password)) {
        echo "<script>alert('Harap isi username dan password!');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
        exit;
    }

    // Debug: Test database connection
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Query untuk mengambil data user berdasarkan username
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    // Periksa apakah user ditemukan
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if ($password === $user['password']) {
            // Debug: Password match
            $_SESSION['username'] = $user['username'];

            // Redirect ke halaman admin
            header('Location: admin/index.php');
            exit;
        } else {
            echo "<script>alert('Password salah!');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }
}
?>
