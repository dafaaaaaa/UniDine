<?php
include 'koneksi.php';
// update Status menjadi Terisi
$id = $_GET['id_meja'];
mysqli_query($koneksi, "UPDATE meja SET Status='Terisi' WHERE id_meja='$id'");

header("location:KetersediaanMeja.php");
