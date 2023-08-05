<?php
include 'koneksi.php';
// update Status menjadi Terisi
$id = $_GET['id_meja'];
mysqli_query($koneksi, "UPDATE meja SET Status='Tersedia' WHERE id_meja='$id'");

header("location:KetersediaanMeja.php");
