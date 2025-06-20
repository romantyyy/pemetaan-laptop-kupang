<?php
// Aktifkan error reporting untuk debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Konfigurasi database
$host = 'localhost';        // Host database (misalnya: localhost)
$dbname = 'laptop';  // Nama database
$username = 'root';         // Username database
$password = '';             // Password database (sesuaikan dengan pengaturan Anda)

try {
    // Membuat koneksi menggunakan PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Atur mode error PDO ke Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Atur default fetch mode menjadi FETCH_ASSOC
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Pesan sukses (opsional)
    // echo "Koneksi ke database berhasil.";
} catch (PDOException $e) {
    // Tampilkan pesan kesalahan jika koneksi gagal
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>
