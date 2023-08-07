<?php
include 'koneksi.php';
// update Status menjadi Terisi
$id = $_GET['no_meja'];
mysqli_query($koneksi, "UPDATE meja SET Status='Kosong' WHERE no_meja='$id'");

header("location:KetersediaanMeja.php");
