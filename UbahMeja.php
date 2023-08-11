<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Edit'])) {
  $no_meja = $_POST['no_meja'];
  $kapasitas = $_POST['kapasitas'];
  $deskripsi = $_POST['deskripsi'];

  // Perform the update operation
  $update_query = "UPDATE meja SET kapasitas = '$kapasitas', deskripsi = '$deskripsi' WHERE no_meja = '$no_meja'";
  if (mysqli_query($koneksi, $update_query)) {
    // Redirect back to the Meja.php page after successful update
    header('Location: Meja.php');
    exit;
  } else {
    echo "Error updating record: " . mysqli_error($koneksi);
  }
} else {
  echo "Invalid request.";
}
