<?php
// Sambungkan ke database
include 'koneksi.php';

// Periksa apakah parameter id tersedia
if (!isset($_GET['id'])) {
    echo "<script>alert('ID Galeri Laptop tidak ditemukan!'); window.location.href = 'data_laptop.php';</script>";
    exit;
}

$id_toko = $_GET['id'];

// Hapus data toko berdasarkan ID
$query = "DELETE FROM laptop WHERE id_laptop = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_toko);

if ($stmt->execute()) {
    echo "<script>alert('Data Galeri Laptop berhasil dihapus!'); window.location.href = 'data_laptop.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data galeri laptop.'); window.location.href = 'data_laptop.php';</script>";
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
