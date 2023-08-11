<?php
session_start();
include 'koneksi.php';

if (isset($_POST['add_to_order'])) {
    $menuId = $_POST['menu_id'];
    $quantity = $_POST['quantity'];

    // Ambil detail menu berdasarkan ID menu
    $menuQuery = mysqli_query($koneksi, "SELECT * FROM tbl_menu WHERE id = $menuId");
    $menu = mysqli_fetch_assoc($menuQuery);

    // Periksa apakah pesanan sudah ada dalam session
    if (!isset($_SESSION['order'])) {
        $_SESSION['order'] = [];
    }

    // Cek apakah menu sudah ada dalam pesanan
    $itemExists = false;
    foreach ($_SESSION['order'] as $key => $orderItem) {
        if ($orderItem['menu_id'] == $menuId) {
            // Update jumlah jika menu sudah ada dalam pesanan
            $_SESSION['order'][$key]['quantity'] += $quantity;
            $itemExists = true;
            break;
        }
    }

    // Tambahkan menu baru ke pesanan jika belum ada
    if (!$itemExists && $menu) {
        $orderItem = [
            'menu_id' => $menuId,
            'nama' => $menu['nama'],
            'harga' => $menu['harga'],
            'quantity' => $quantity
        ];

        $_SESSION['order'][] = $orderItem;
    }
}

// Alihkan kembali ke halaman menu
header("Location: PesananBaru.php");
exit();
?>
