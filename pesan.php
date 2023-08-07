<?php
include 'koneksi.php';
// update Status menjadi Terisi
$jumlahtamu = $_POST['jumlahtamu'];
$nmeja = $_POST['nmeja'];
$tglpesan = $_POST['tglpesan'];
$status = $_POST['status'];
$query = "INSERT INTO pesanan (jumlah_tamu, no_meja, tanggal_pesan, status) VALUES ('$jumlahtamu', '$nmeja', '$tglpesan', '$status')";
mysqli_query($koneksi,$query);

header("location:PesananBaru.php");
