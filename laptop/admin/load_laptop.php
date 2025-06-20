<?php
// Koneksi ke database
$host = "localhost"; // Sesuaikan dengan konfigurasi server Anda
$username = "root"; // Nama pengguna database Anda
$password = ""; // Kata sandi database Anda
$database = "laptop"; // Nama database Anda

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari tabel toko
$query = "SELECT *
          FROM laptop INNER JOIN toko ON laptop.id_toko=toko.id_toko";

$result = $conn->query($query);

// Periksa apakah ada data
if ($result->num_rows > 0) {
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$no}</td>
                <td>{$row['nama_toko']}</td>
                <td>{$row['nama']}</td>
                <td>
        <img src='{$row['foto1']}' alt='Gambar Laptop' width='100'></td>
         <td>{$row['deskripsi']}</td>
                <td>
                    <a href='edit_laptop.php?id={$row['id_laptop']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='hapus_laptop.php?id={$row['id_laptop']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                </td>
              </tr>";
        $no++;
    }
} else {
    echo "<tr><td colspan='12' class='text-center'>Tidak ada data ditemukan</td></tr>";
}

$conn->close();
?>
