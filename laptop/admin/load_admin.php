<?php
// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$database = "laptop";

// Koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query untuk mengambil data lokasi
$query = "SELECT id_admin, nama_lengkap, username FROM admin";
$result = $conn->query($query);

// Periksa apakah query berhasil
if (!$result) {
    echo "Query gagal: " . $conn->error;
    exit;
}

// Tampilkan data dalam format HTML
if ($result->num_rows > 0) {
    $no = 1; // Penomoran
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$no}</td>
                <td>{$row['nama_lengkap']}</td>
                <td>{$row['username']}</td>
                <td>
                    <a href='edit_admin.php?id={$row['id_admin']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='hapus_admin.php?id={$row['id_admin']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                </td>
            </tr>";
        $no++;
    }
} else {
    echo "<tr><td colspan='8' class='text-center'>Tidak ada data lokasi</td></tr>";
}

// Tutup koneksi
$conn->close();
?>
