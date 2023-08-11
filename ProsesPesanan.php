<?php
session_start();
include 'koneksi.php';

// Ambil data yang diperlukan dari sesi atau formulir
// ... Anda perlu mengambil data seperti nomor meja, jumlah tamu, dll.

// Simpan pesanan ke dalam database
if (isset($_SESSION['order']) && count($_SESSION['order']) > 0) {
    foreach ($_SESSION['order'] as $orderItem) {
        $menuId = $orderItem['menu_id'];
        $quantity = $orderItem['quantity'];
        
        // Lakukan operasi INSERT ke tabel pesanan atau tabel yang sesuai
        $insertQuery = "INSERT INTO tbl_temp_pesanan (menu_id, quantity) VALUES ('$menuId', '$quantity')";
        mysqli_query($koneksi, $insertQuery);
    }
}

// Bersihkan sesi pesanan
unset($_SESSION['order']);

// Alihkan ke halaman konfirmasi atau terima kasih
header("Location: KonfirmasiPesanan.php");
exit();
?>
