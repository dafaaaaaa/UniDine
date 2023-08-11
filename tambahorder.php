<?php
session_start();
include 'koneksi.php';

if (isset($_POST['add_to_order'])) {
    $menuId = $_POST['menu_id'];
    $quantity = $_POST['quantity'];

    // Ambil detail menu berdasarkan ID menu
    $menuQuery = mysqli_query($koneksi, "SELECT * FROM tbl_menu WHERE id = $menuId");
    $menu = mysqli_fetch_assoc($menuQuery);

    // Tambahkan menu yang dipilih ke pesanan pengguna
    if ($menu) {
        if (!isset($_SESSION['order'])) {
            $_SESSION['order'] = [];
        }

        // Buat item baru dalam array pesanan
        $orderItem = [
            'menu_id' => $menuId,
            'nama' => $menu['nama'],
            'harga' => $menu['harga'],
            'quantity' => $quantity
        ];

        // Tambahkan item ke array pesanan
        $_SESSION['order'][] = $orderItem;
    }
}

// Alihkan kembali ke halaman menu
header("Location: PesananBaru.php");
exit();
