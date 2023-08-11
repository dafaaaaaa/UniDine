<?php
include 'koneksi.php';

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui POST
    $no_meja = $_POST['no_meja'];
    $kapasitas = $_POST['kapasitas'];
    $deskripsi = $_POST['deskripsi'];

    // Perintah SQL INSERT
    $sql = "INSERT INTO meja (no_meja, kapasitas, deskripsi) VALUES ('$no_meja', '$kapasitas', '$deskripsi')";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Meja berhasil ditambah!');</script>";
        include("Meja.php");
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
