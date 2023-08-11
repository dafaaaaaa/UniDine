<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mejaDipilih = $_POST["nmeja"];
    $jumlahTamu = $_POST["jumlahtamu"];

    // Simpan data pesanan ke dalam tabel tbl_pesanan
    $query = "INSERT INTO pesanan (no_meja, jumlah_tamu, tanggal_pesan, total, status) VALUES ('$mejaDipilih', '$jumlahTamu', NOW(), 0, 'Pending')";
    mysqli_query($koneksi, $query);

    $pesanan_id = mysqli_insert_id($koneksi); // Dapatkan ID pesanan yang baru saja disimpan

    // Loop melalui item pesanan di sesi dan simpan ke dalam tabel tbl_detil_pesanan
    foreach ($_SESSION['order'] as $orderItem) {
        $menu_id = $orderItem['menu_id'];
        $quantity = $orderItem['quantity'];
        $query = "INSERT INTO tbl_temp_pesanan (id_pesanan, id_menu, qt) VALUES ('$pesanan_id', '$menu_id', '$quantity')";
        mysqli_query($koneksi, $query);
    }

    // Hitung total harga pesanan berdasarkan detil pesanan
    $totalharga = 0;
    foreach ($_SESSION['order'] as $orderItem) {
        $menu_id = $orderItem['menu_id'];
        $quantity = $orderItem['quantity'];

        $menu_query = "SELECT harga FROM tbl_menu WHERE id = '$menu_id'";
        $menu_result = mysqli_query($koneksi, $menu_query);
        $menu_data = mysqli_fetch_assoc($menu_result);

        $harga = $menu_data['harga'];
        $totalharga += $harga * $quantity;
    }

    // Update total harga pesanan dalam tabel tbl_pesanan
    $update_query = "UPDATE pesanan SET total = '$totalharga' WHERE id = '$pesanan_id'";
    mysqli_query($koneksi, $update_query);
    $total = mysqli_query($koneksi, $update_query);

    // Simpan total harga dalam sesi
    $_SESSION['total_harga'] = $totalharga;

    // Redirect ke halaman sukses atau halaman lain yang sesuai
    header("Location: PesananSukses.php");
    exit();
} else {
    // Jika tidak ada data POST, redirect ke halaman sebelumnya atau halaman lain yang sesuai
    header("Location: Pesanan.php");
    exit();
}
