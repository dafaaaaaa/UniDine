<?php
session_start(); // Start a session

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit(); // Stop further execution of the page
}

include 'koneksi.php';

if (isset($_POST['submit'])) {
  $pesanan_id = $_POST['pesanan_id'];

  // Update pesanan status to 'Selesai'
  $update_query = "UPDATE pesanan SET status = 'Selesai' WHERE id = '$pesanan_id'";
  mysqli_query($koneksi, $update_query);

  header("Location: index.php");
  exit();
} else {
  header("Location: index.php");
  exit();
}
