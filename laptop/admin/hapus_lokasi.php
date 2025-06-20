<?php
// Sambungkan ke database
include 'koneksi.php';

// Periksa apakah parameter id tersedia
if (!isset($_GET['id'])) {
    echo "<script>alert('ID Lokasi Toko tidak ditemukan!'); window.location.href = 'data_lokasi.php';</script>";
    exit;
}

$id_toko = $_GET['id'];

// Hapus data toko berdasarkan ID
$query = "DELETE FROM lokasi WHERE id_lokasi = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_toko);

if ($stmt->execute()) {
    echo "<script>alert('Data Lokasi toko berhasil dihapus!'); window.location.href = 'data_lokasi.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data lokasi toko.'); window.location.href = 'data_lokasi.php';</script>";
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
