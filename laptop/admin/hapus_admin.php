<?php
// Sambungkan ke database
include 'koneksi.php';

// Periksa apakah parameter id tersedia
if (!isset($_GET['id'])) {
    echo "<script>alert('ID Admin tidak ditemukan!'); window.location.href = 'data_admin.php';</script>";
    exit;
}

$id_toko = $_GET['id'];

// Hapus data toko berdasarkan ID
$query = "DELETE FROM admin WHERE id_admin = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_toko);

if ($stmt->execute()) {
    echo "<script>alert('Data Admin berhasil dihapus!'); window.location.href = 'data_admin.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data admin.'); window.location.href = 'data_admin.php';</script>";
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
