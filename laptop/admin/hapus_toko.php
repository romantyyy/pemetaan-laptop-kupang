<?php
// Sambungkan ke database
include 'koneksi.php';

// Periksa apakah parameter id tersedia
if (!isset($_GET['id'])) {
    echo "<script>alert('ID Toko tidak ditemukan!'); window.location.href = 'data_toko.php';</script>";
    exit;
}

$id_toko = $_GET['id'];

// Hapus data toko berdasarkan ID
$query = "DELETE FROM toko WHERE id_toko = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_toko);

if ($stmt->execute()) {
    echo "<script>alert('Data toko berhasil dihapus!'); window.location.href = 'data_toko.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data toko.'); window.location.href = 'data_toko.php';</script>";
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
