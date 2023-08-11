<?php 

include 'koneksi.php';
$id = $_POST['id_order'];
$jumlah = $_POST['qt'];


mysqli_query($koneksi, "UPDATE tbl_temp_pesanan SET qt='$jumlah' WHERE id_order='$id' ");

header("location:index.php?");

?>