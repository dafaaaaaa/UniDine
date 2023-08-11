<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $pesanan_id = $_GET['id'];

    // Update status pesanan menjadi "Dibatalkan" berdasarkan ID pesanan
    $update_status_query = "UPDATE pesanan SET status = 'Dibatalkan' WHERE id = '$pesanan_id'";
    mysqli_query($koneksi, $update_status_query);

    // Redirect kembali ke halaman Daftar Pesanan
    header("Location: index.php");
    exit;
}
